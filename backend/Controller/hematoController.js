const hematoDao = require("../dao/hematoDao");

exports.getByRegistro = async (req, res) => {
  const idPaciente = req.params.idPaciente;
  try {
    const exames = await hematoDao.findByRegistroPaciente(idPaciente);

    if (exames.length === 0) {
      return res
        .status(404)
        .json({ error: "Nenhum exame encontrado para esse paciente" });
    }
    res.json(exames);
  } catch (err) {
    console.error("Erro ao buscar exame do paciente:", err);
    res
      .status(500)
      .json({ error: "Erro interno ao buscar exames do paciente" });
  }
};

exports.getById = async (req, res) => {
  const idExame = req.params.idExame;
  try {
    const exames = await hematoDao.findById(idExame);

    if (exames.length === 0) {
      return res
        .status(404)
        .json({ error: "Exame não encontrado para listar" });
    }
    res.json(exames[0]);
  } catch (err) {
    console.error("Erro ao listar exame do paciente", err);
    res.status(500).json({ error: "Erro interno ao listar exame do paciente" });
  }
};

exports.CreateHemato = async (req, res) => {
  try {
    const novoHemato = await hematoDao.create(req.body);

    res.status(201).json({
      message: "Exame cadastrado com sucesso!",
      id: novoHemato.insertId,
    });
  } catch (err) {
    console.error("Erro ao criar novo exame", err);
    res.status(500).json({ error: "Erro interno ao criar exame do paciente" });
  }
};
