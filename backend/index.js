const express = require("express");
const bodyParser = require("body-parser");
const routerPaciente = require("./routes/pacienteRouter");
const routerUsuario = require("./routes/usuarioRouter");
const routerHemato = require("./routes/hematoRouter");
const routerBio = require("./routes/bioquimicaRouter");
const routerHematoRef = require("./routes/hematoRefRouter");
const routerBioquimicaRef = require("./routes/bioquimicaRefRouter");
const routerAnamneseEnf = require("./routes/anamnsesEnfermagemRoutes");
const swaggerUi = require("swagger-ui-express");
const swaggerSpec = require("./Swagger/swagger");

const { verifyToken } = require("./middleware/auth");
const usuarioController = require("./Controller/usuarioController");

const app = express();

app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Documentação
app.use("/api-docs", swaggerUi.serve, swaggerUi.setup(swaggerSpec));

// === ROTAS PÚBLICAS (sem JWT) ===
// Login
app.post("/usuarios/login", usuarioController.login);
// Cadastro inicial (libera por ora — se quiser fechar, basta remover essa linha)
app.post("/usuarios", usuarioController.createUsuario);
// Recuperação de senha
app.post("/usuarios/verificar-email", usuarioController.verificarEmail);
app.put("/usuarios/recover-password", usuarioController.updatePassword);

// === A PARTIR DAQUI TUDO EXIGE JWT ===
app.use(verifyToken);

app.use("/pacientes", routerPaciente);
app.use("/usuarios", routerUsuario);
app.use("/exameHemato", routerHemato);
app.use("/exameBio", routerBio);
app.use("/hematoRef", routerHematoRef);
app.use("/bioquimicaRef", routerBioquimicaRef);
app.use("/anamneseEnf", routerAnamneseEnf);

app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000.");
  console.log("Documentação disponível em http://localhost:3000/api-docs");
});
