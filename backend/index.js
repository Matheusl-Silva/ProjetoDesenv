const express = require("express");
const bodyParser = require("body-parser");
const routerPaciente = require("./routes/pacienteRouter");
const routerUsuario = require("./routes/usuarioRouter");
const routerHemato = require("./routes/hematoRouter");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// rota de pacientes -> vai para PacienteRouter
app.use("/pacientes", routerPaciente);

//rota de usuario -> UsuarioRouter
app.use("/usuarios", routerUsuario);

//rota para exameHemato -> hematoRouter
app.use("/exameHemato", routerHemato);

// ----------- rotas exames -----------

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
