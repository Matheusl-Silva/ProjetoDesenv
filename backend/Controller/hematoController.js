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
  const idPaciente = req.params.idPaciente;
  try {
    const exames = await hematoDao.findById(idPaciente);

    if (exames.length === 0) {
      return res.status(404).json({ error: "Exame não encontrado" });
    }
    res.json(exames[0]);
  } catch (err) {
    console.error("Erro ao listar exame do paciente", err);
    res.status.json({ error: "Erro interno ao listar exame do paciente" });
  }
};
