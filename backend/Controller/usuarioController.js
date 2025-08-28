const usuarioDao = require("../dao/usuarioDao");

exports.getAllUsuarios = async (req, res) => {
  try {
    const usuario = await usuarioDao.findAll();
    res.json(usuario);
  } catch (err) {
    console.error("Erro ao buscar usuarios:", err);
    res.status(404).json({ error: "Erro ao buscar usuarios" });
  }
};

exports.getUsuariobyId = async (req, res) => {
  const id = req.params.idUsuario;
  try {
    const usuario = await usuarioDao.findById(id);
    if (usuario.length === 0) {
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
    if (usuario) {
      return res.status(200).json(usuario);
    }
    return res.status(404).json(false);
  } catch (err) {
    return res.status(500).json({ error: "Erro ao buscar paciente por email" });
  }
};

exports.login = async (req, res) => {
  const { email, senha } = req.body;
  try {
    const usuario = usuarioDao.login(email, senha);

    if (usuario) {
      return res.status(200).json(usuario);
    }
    return res.status(404).json({ error: "Usuário não encontrado" });
  } catch (err) {
    return res.status(500).json({ error: "Erro ao fazer login" });
  }
};

exports.createUsuario = async (req, res) => {
  const { email } = req.body;
  const usuarioExiste = await usuarioDao.findByEmail(email);
  try {
    if (usuarioExiste.length > 0) {
      return res
        .status(409)
        .json({ error: "Já possui um usuario com o mesmo email" });
    }

    const novousuario = await usuarioDao.create(req.body);
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
  const dadosAtualizar = req.body;
  try {
    const result = await usuarioDao.update(id, dadosAtualizar);

    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "usuario não encontrado" });
    }
    res.status(200).json({ message: "usuario atualizado com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar atualizar o usuario: ", err);
    res.status(500).json({ error: "Erro ao tentar atualizar usuario" });
  }
};

exports.deleteUsuario = async (req, res) => {
  const id = req.params.idUsuario;
  const dadosDeletar = req.body;

  try {
    const result = await usuarioDao.delete(id, dadosDeletar);
    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "usuario não encontrado" });
    }

    res.status(200).json({ message: "Usuario deletado com suscesso" });
  } catch (err) {
    console.error("Erro ao tentar deletar o usuario: ", err);
    res.status(500).json({ error: "Erro ao tentar deletar Usuario" });
  }
};
