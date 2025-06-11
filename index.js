const express = require("express");
const bodyParser = require("body-parser");
const app = express();

app.use(bodyParser.json());

app.use(bodyParser.urlencoded({ extended: true }));

// Acessar os phps, alterado o caminho pois o padrão vai para o views
app.use(express.static("views"));

// Rotas de Autenticação
app.get("/login", (req, res) => {
  res.sendFile(__dirname + "/views/Auth/login.php");
});

app.post("/login", (req, res) => {
  const { email, senha } = req.body;
  res.redirect("/homeUsuario.php");
});

app.get("/homeUsuario.php", (req, res) => {
  res.sendFile(__dirname + "/public/homeUsuario.php");
});

app.post("/usuario/cadastrar", (req, res) => {
  const { nome, email, senha } = req.body;

  res.send("Usuário cadastrado com sucesso");
});

app.get("/pacientes", (req, res) => {
  res.sendFile(__dirname + "/views/PacienteView.php");
});

app.get("/paciente/cadastrar", (req, res) => {
  res.render("PacienteView/cadastro");
});

app.post("/paciente/cadastrar", (req, res) => {
  const { nome, cpf, dataNascimento, endereco } = req.body;

  res.send("Paciente cadastrado com sucesso");
});

app.get("/paciente/editar/:id", (req, res) => {
  const idPaciente = req.params.id;

  res.sendFile(__dirname + "/views/PacienteView.php");
});

app.put("/paciente/atualizar/:id", (req, res) => {
  const idPaciente = req.params.id;
  const { nome, cpf, dataNascimento, endereco } = req.body;

  res.send("Paciente atualizado com sucesso");
});

app.delete("/paciente/deletar/:id", (req, res) => {
  const idPaciente = req.params.id;

  res.send("Paciente deletado com sucesso");
});

app.get("/", (req, res) => {
  res.redirect("/login");
});

app.listen(3000, () => {
  console.log("Api rodando: 3000");
});
