const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql2");

const app = express();
app.use(express.static(__dirname + "/assets"));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ encoded: true }));

app.set("view engine", "ejs");

const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "login",
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
//rota para deletar os usuarios

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
app.put("/pacientes/:email", (req, res) => {
  const email = req.params.email;
  const {
    nome,
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
    "UPDATE pacientes SET nome = ?, periodo = ?, data_nascimento = ?, telefone = ?, nome_mae = ?, toma_medicamento = ?, medicamento = ?, trata_patologia = ?, patologia = ? WHERE email = ?";

  db.query(
    query,
    [
      nome,
      periodo,
      data_nascimento,
      telefone,
      nome_mae,
      toma_medicamento,
      medicamento,
      trata_patologia,
      patologia,
      email,
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

  const query =
    "INSERT INTO pacientes (nome, email, periodo, data_nascimento, telefone, nome_mae, toma_medicamento, medicamento, trata_patologia, patologia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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

app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000.");
});
