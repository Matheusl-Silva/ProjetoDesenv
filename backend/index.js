const express = require("express");
const bodyParser = require("body-parser");
const routerPaciente = require("./routes/pacienteRouter");
const routerUsuario = require("./routes/usuarioRouter");
const routerHemato = require("./routes/hematoRouter");
const routerBio = require("./routes/bioquimicaRouter");
const routerHematoRef = require("./routes/hematoRefRouter");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// rota de pacientes -> vai para PacienteRouter
app.use("/pacientes", routerPaciente);

//rota de usuario -> UsuarioRouter
app.use("/usuarios", routerUsuario);

//rota para exameHemato -> hematoRouter
app.use("/exameHemato", routerHemato);

//rota para exameBioquimica -> bioquimicaRouter
app.use("/exameBio", routerBio);

//rota para referencia Hematológica -> hematoRefRouter
app.use("/hematoRef", routerHematoRef);

app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000.");
});
