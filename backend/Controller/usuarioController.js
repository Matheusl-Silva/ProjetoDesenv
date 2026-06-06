const bcrypt = require("bcryptjs");
const usuarioDao = require("../dao/usuarioDao");
const { signToken } = require("../middleware/auth");

const BCRYPT_ROUNDS = 10;

// Remove campo de senha antes de enviar para o cliente
function sanitize(usuario) {
  if (!usuario) return usuario;
  const { csenha, ...rest } = usuario;
  return rest;
}

exports.getAllUsuarios = async (req, res) => {
  try {
    const usuarios = await usuarioDao.findAll();
    res.json(usuarios);
  } catch (err) {
    console.error("Erro ao buscar usuarios:", err);
    res.status(500).json({ error: "Erro ao buscar usuarios" });
  }
};

exports.getUsuariobyId = async (req, res) => {
  const id = req.params.idUsuario;
  try {
    const usuario = await usuarioDao.findById(id);
    if (!usuario || usuario.length === 0) {
      return res.status(404).json({ error: "usuario não encontrado" });
    }
    res.json(usuario[0]);
  } catch (err) {
    console.error("Erro ao buscar usuario:", err);
    res.status(500).json({ error: "Erro ao buscar usuario" });
  }
};

exports.verificarEmail = async (req, res) => {
  const { email } = req.body;
  try {
    const usuario = await usuarioDao.findByEmail(email);
    if (usuario && usuario.length > 0) {
      return res.status(200).json(sanitize(usuario[0]));
    }
    return res.status(404).json({ error: "Usuário não encontrado" });
  } catch (err) {
    return res.status(500).json({ error: "Erro ao verificar email" });
  }
};

exports.login = async (req, res) => {
  const { email, senha } = req.body;
  if (!email || !senha) {
    return res.status(400).json({ error: "Email e senha são obrigatórios" });
  }
  try {
    const result = await usuarioDao.findByEmail(email);
    if (!result || result.length === 0) {
      return res.status(401).json({ error: "Credenciais inválidas" });
    }
    const usuario = result[0];

    let ok = false;
    // Suporta hash bcrypt; fallback p/ comparação plana só se a senha no banco
    // ainda não foi migrada (não começa com $2). Recomenda-se rodar a migração.
    if (typeof usuario.csenha === "string" && usuario.csenha.startsWith("$2")) {
      ok = await bcrypt.compare(senha, usuario.csenha);
    } else {
      ok = usuario.csenha === senha;
      // Auto-migra a senha para bcrypt no primeiro login bem-sucedido
      if (ok) {
        const hash = await bcrypt.hash(senha, BCRYPT_ROUNDS);
        await usuarioDao.updatePasswordByEmail(email, hash);
      }
    }

    if (!ok) {
      return res.status(401).json({ error: "Credenciais inválidas" });
    }

    const token = signToken({
      id: usuario.id,
      email: usuario.cemail,
      admin: usuario.cadmin,
    });

    return res.status(200).json({
      token,
      usuario: sanitize(usuario),
    });
  } catch (err) {
    console.error("Erro no login:", err);
    return res.status(500).json({ error: "Erro ao fazer login" });
  }
};

exports.createUsuario = async (req, res) => {
  const { email, senha } = req.body;
  if (!email || !senha) {
    return res.status(400).json({ error: "Email e senha são obrigatórios" });
  }
  try {
    const usuarioExiste = await usuarioDao.findByEmail(email);
    if (usuarioExiste.length > 0) {
      return res
        .status(409)
        .json({ error: "Já possui um usuario com o mesmo email" });
    }

    const hash = await bcrypt.hash(senha, BCRYPT_ROUNDS);
    const novousuario = await usuarioDao.create({
      ...req.body,
      senha: hash,
    });
    res.status(201).json({
      message: "usuario cadastrado com sucesso!",
      id: novousuario.insertId,
    });
  } catch (err) {
    console.error("Erro ao tentar cadastrar usuario: ", err);
    res.status(500).json({ error: "Erro ao tentar cadastrar o usuario" });
  }
};

exports.updateUsuario = async (req, res) => {
  const id = req.params.idUsuario;
  try {
    const result = await usuarioDao.update(id, req.body);
    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "usuario não encontrado" });
    }
    // Se vier senha no body, atualiza separadamente já com hash
    if (req.body.senha) {
      const hash = await bcrypt.hash(req.body.senha, BCRYPT_ROUNDS);
      await usuarioDao.updatePasswordByEmail(req.body.email, hash);
    }
    res.status(200).json({ message: "usuario atualizado com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar atualizar o usuario: ", err);
    res.status(500).json({ error: "Erro ao tentar atualizar usuario" });
  }
};

exports.deleteUsuario = async (req, res) => {
  const id = req.params.idUsuario;
  try {
    const result = await usuarioDao.delete(id);
    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "usuario não encontrado" });
    }
    res.status(200).json({ message: "Usuario deletado com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar deletar o usuario: ", err);
    res.status(500).json({ error: "Erro ao tentar deletar Usuario" });
  }
};

exports.updatePassword = async (req, res) => {
  const { email, senha } = req.body;
  if (!email || !senha) {
    return res.status(400).json({ error: "Email e senha são obrigatórios" });
  }
  try {
    const usuario = await usuarioDao.findByEmail(email);
    if (!usuario || usuario.length === 0) {
      return res.status(404).json({ error: "Usuário não encontrado" });
    }
    const hash = await bcrypt.hash(senha, BCRYPT_ROUNDS);
    const result = await usuarioDao.updatePasswordByEmail(email, hash);
    if (result.affectedRows === 0) {
      return res.status(500).json({ error: "Erro ao atualizar a senha" });
    }
    res.status(200).json({ message: "Senha atualizada com sucesso" });
  } catch (err) {
    console.error("Erro ao atualizar senha: ", err);
    res.status(500).json({ error: "Erro ao atualizar senha" });
  }
};
