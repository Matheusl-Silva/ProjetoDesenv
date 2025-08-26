const express = require("express");
const bodyParser = require("body-parser");
const routerPaciente = require("./routes/pacienteRouter");
const routerUsuario = require("./routes/usuarioRouter");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// rota de pacientes -> vai para PacienteRouter
app.use("/pacientes", routerPaciente);
//rota de usuario -> UsuarioRouter
app.use("/usuarios", routerUsuario);

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

// ----------- rotas exames -----------
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
