const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql2");

const app = express();
app.use(express.static(__dirname + "/assets"));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({encoded: true}));

app.set("view engine", "ejs");

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "login"
});

db.connect((err) => {
    if(err){
        console.log("Erro de conexão: " + err);
        return;
    }
    console.log("Conexão com banco de dados estabelecida");
});

app.listen(3000, () => {
    console.log("Servidor rodando na porta 3000.");
})

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
});

app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000.");
});