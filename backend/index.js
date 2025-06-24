const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql2");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ encoded: true }));

const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "hemato",
});

db.connect((err) => {
  if (err) {
    console.log("Erro de conexão: " + err);
    return;
  }
  console.log("Conexão com banco de dados estabelecida");
});

app.get("/pacientes", (req, res) => {
  const query = "SELECT * FROM pacientes";

  db.query(query, (err, results) => {
    if (err) {
      console.error("Erro ao buscar pacientes:", err);
      return res.status(500).json({ error: "Erro ao buscar pacientes" });
    }
    res.json(results);
  });
  return res.status(200);
});

// Rota para verificar se um email já existe
app.post("/pacientes/verificar-email", (req, res) => {
  const { email } = req.body;

  if (!email) {
    return res.status(400).json({ error: "Email não fornecido" });
  }

  const query = "SELECT id FROM pacientes WHERE email = ?";

  db.query(query, [email], (err, results) => {
    if (err) {
      console.error("Erro ao verificar email:", err);
      return res.status(500).json({ error: "Erro ao verificar email" });
    }

    res.json({ existe: results.length > 0 });
  });
  return res.status(200);
});

//rota para deletar os pacientes

app.delete("/pacientes/:email", (req, res) => {
  const email = req.params.email;
  const query = "DELETE FROM pacientes WHERE email = ?";

  db.query(query, [email], (err, results) => {
    if (err) {
      console.error("Erro ao excluir paciente:", err);
      return res.status(500).json({ error: "Erro ao excluir paciente" });
    }

    if (results.affectedRows === 0) {
      return res.status(404).json({ error: "Paciente não encontrado" });
    }

    res.json({ message: "Paciente excluído com sucesso" });
  });

  return res.status(200);
});

//rota para atualizar o paciente
app.put("/pacientes/:idPaciente", (req, res) => {
  const idPaciente = req.params.idPaciente;
  const {
    id,
    nome,
    email,
    periodo,
    data_nascimento,
    telefone,
    nome_mae,
    toma_medicamento,
    medicamento,
    trata_patologia,
    patologia,
  } = req.body;

  const query =
    "UPDATE pacientes SET nome = ?, email = ?, periodo = ?, data_nascimento = ?, telefone = ?, nome_mae = ?, toma_medicamento = ?, medicamento = ?, trata_patologia = ?, patologia = ? WHERE id = ?";

  db.query(
    query,
    [
      nome,
      email,
      periodo,
      data_nascimento,
      telefone,
      nome_mae,
      toma_medicamento,
      medicamento,
      trata_patologia,
      patologia,
      idPaciente,
    ],
    (err, results) => {
      if (err) {
        console.error("Erro ao atualizar paciente:", err);
        return res.status(500).json({ error: "Erro ao atualizar paciente" });
      }

      if (results.affectedRows === 0) {
        return res.status(404).json({ error: "Paciente não encontrado" });
      }

      res.json({ message: "Paciente atualizado com sucesso" });
    }
  );

  return res.status(200);
});

app.post("/pacientes", (req, res) => {
  console.log("Recebendo requisição POST:", req.body);
  const {
    nome,
    email,
    periodo,
    data_nascimento,
    telefone,
    nome_mae,
    toma_medicamento,
    medicamento,
    trata_patologia,
    patologia,
  } = req.body;

  if (
    !nome ||
    !email ||
    !periodo ||
    !data_nascimento ||
    !telefone ||
    !nome_mae ||
    !toma_medicamento ||
    !trata_patologia
  ) {
    console.error("Dados incompletos:", req.body);
    return res.status(400).json({ error: "Dados incompletos" });
  }

  // Primeiro, verificar se o email já existe
  const checkEmailQuery = "SELECT id FROM pacientes WHERE email = ?";

  db.query(checkEmailQuery, [email], (err, results) => {
    if (err) {
      console.error("Erro ao verificar email:", err);
      return res.status(500).json({ error: "Erro ao verificar email" });
    }

    if (results.length > 0) {
      console.error("Email já cadastrado:", email);
      return res.status(409).json({ error: "Email já cadastrado no sistema" });
    }

    // Se o email não existe, prosseguir com o cadastro
    const insertQuery =
      "INSERT INTO pacientes (nome, email, periodo, data_nascimento, telefone, nome_mae, toma_medicamento, medicamento, trata_patologia, patologia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    db.query(
      insertQuery,
      [
        nome,
        email,
        periodo,
        data_nascimento,
        telefone,
        nome_mae,
        toma_medicamento,
        medicamento,
        trata_patologia,
        patologia,
      ],
      (err, results) => {
        if (err) {
          console.error("Erro ao cadastrar paciente:", err);
          return res
            .status(500)
            .json({ error: "Erro ao cadastrar paciente: " + err.message });
        }

        res.status(201).json({
          message: "Paciente cadastrado com sucesso",
          id: results.insertId,
        });
      }
    );
  });
});

app.get("/exames/:registroPacientes", (req, res) => {
  const registroPaciente = parseInt(req.params.registroPacientes);

  if (isNaN(registroPaciente)) {
    return res.status(400).json({ error: "ID do paciente inválido" });
  }

  const query =
    "SELECT id, data, id_preceptor FROM exames WHERE registro_paciente = ? ORDER BY data DESC";

  db.query(query, [registroPaciente], (err, results) => {
    if (err) {
      console.error("Erro ao buscar exames do paciente:", err);
      return res
        .status(500)
        .json({ error: "Erro ao buscar exames do paciente" });
    }

    if (results.length === 0) {
      return res
        .status(404)
        .json({ error: "Nenhum exame encontrado para este paciente" });
    }

    res.status(200).json(results);
  });
});

app.get("/exames/principal/:idExame", (req, res) => {
  const idExame = parseInt(req.params.idExame);

  if (isNaN(idExame)) {
    return res.status(400).json({ error: "ID do exame inválido" });
  }

  const query = `SELECT 
    e.*, 
    p.nome as nome_paciente, 
    u_resp.nome as nome_responsavel,
    u_prec.nome as nome_preceptor
  FROM exames e
  JOIN pacientes p ON e.registro_paciente = p.id
  JOIN usuarios u_resp ON e.id_responsavel = u_resp.id
  JOIN usuarios u_prec ON e.id_preceptor = u_prec.id
  WHERE e.id = ?`;

  db.query(query, [idExame], (err, results) => {
    if (err) {
      console.error("Erro ao buscar exame:", err);
      return res.status(500).json({ error: "Erro ao buscar exame" });
    }

    if (results.length === 0) {
      return res.status(404).json({ error: "Exame não encontrado" });
    }

    res.status(200).json(results[0]);
  });
});

app.post("/exames/", (req, res) => {
  const {
    id_responsavel,
    id_preceptor,
    registro_paciente,
    dentrada,
    dentrega,
    data,
    hemacia,
    hemoglobina,
    hematocrito,
    vcm,
    hcm,
    chcm,
    rdw,
    leucocitos,
    blastos,
    promielocitos,
    mielocitos,
    metamielocitos,
    bastonetes,
    segmentados,
    eosinofilos,
    basofilos,
    plaquetas,
    plaquetarioMedio,
    neutrofilos,
  } = req.body;

  // Validação dos campos obrigatórios
  if (!id_responsavel || !id_preceptor || !registro_paciente || !data) {
    return res
      .status(400)
      .json({ error: "Campos obrigatórios não preenchidos" });
  }

  const query = `INSERT INTO exames (
    id_responsavel, id_preceptor, registro_paciente, dentrada, dentrega, data,
    hemacia, hemoglobina, hematocrito, vcm, hcm, chcm, rdw, leucocitos,
    blastos, promielocitos, mielocitos, metamielocitos, bastonetes, segmentados,
    eosinofilos, basofilos, plaquetas, volplaquetariomedio, neutrofilos
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

  const values = [
    id_responsavel,
    id_preceptor,
    registro_paciente,
    dentrada ?? null,
    dentrega ?? null,
    data,
    hemacia ?? null,
    hemoglobina ?? null,
    hematocrito ?? null,
    vcm ?? null,
    hcm ?? null,
    chcm ?? null,
    rdw ?? null,
    leucocitos ?? null,
    blastos ?? null,
    promielocitos ?? null,
    mielocitos ?? null,
    metamielocitos ?? null,
    bastonetes ?? null,
    segmentados ?? null,
    eosinofilos ?? null,
    basofilos ?? null,
    plaquetas ?? null,
    plaquetarioMedio ?? null,
    neutrofilos ?? null,
  ];

  db.query(query, values, (err, result) => {
    if (err) {
      console.error("Erro ao inserir exame:", err);
      return res.status(500).json({ error: "Erro ao inserir exame" });
    }

    res.status(201).json({
      message: "Exame inserido com sucesso",
      id: result.insertId,
    });
  });
});

app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000.");
});

/*
app.post("/usuarios/cadastrar", (req, res) => {
  const { nomeUsuario, email, senha, senhaConfirma } = req.body;

  if (!nomeUsuario || !email || !senha || !senhaConfirma) {
    return res.status(400).json({ 
        tipo_alerta: "danger", 
        mensagem: "Todos os campos são obrigatórios." 
    });
  }

  if (senha !== senhaConfirma) {
    return res.status(400).json({ 
        tipo_alerta: "danger", 
        mensagem: "As senhas não conferem! Por favor, digite novamente." 
    });
  }

  //verifica se o e-mail já existe no banco
  const checkEmailQuery = "SELECT id FROM usuarios WHERE email = ?";
  
  db.query(checkEmailQuery, [email], (err, results) => {
    if (err) {
      console.error("Erro ao verificar e-mail:", err);
      return res.status(500).json({ 
          tipo_alerta: "danger", 
          mensagem: "Erro interno no servidor ao verificar o e-mail." 
      });
    }

    //se `results` tiver algum item, o e-mail já existe
    if (results.length > 0) {
      return res.status(409).json({
          tipo_alerta: "warning", 
          mensagem: "Este e-mail já está cadastrado!" 
      });
    }

    const insertQuery = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    
    db.query(insertQuery, [nomeUsuario, email, senha], (err, result) => {
      if (err) {
        console.error("Erro ao cadastrar usuário:", err);
        return res.status(500).json({ 
            tipo_alerta: "danger", 
            mensagem: "Erro ao cadastrar." 
        });
      }

      res.status(201).json({
          tipo_alerta: "success", 
          mensagem: "Usuário cadastrado com sucesso!",
          userId: result.insertId //envia o ID do novo usuário criado
      });
    });
  });
});
*/