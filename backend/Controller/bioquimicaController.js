const bioquimicaDao = require("../dao/bioquimicaDao");

exports.getByRegistro = async (req, res) => {
  const idPaciente = req.params.idPaciente;
  try {
    const exames = await bioquimicaDao.findByRegistroPaciente(idPaciente);

    if (exames.length === 0) {
      return res.status(404).json({
        error: "Nenhum ExameBio encontrado para esse paciente",
      });
    }
    res.json(exames);
  } catch (err) {
    console.error("Erro ao buscar ExameBio do paciente:", err);
    res
      .status(500)
      .json({ error: "Erro interno ao buscar ExameBio do paciente" });
  }
};

exports.getById = async (req, res) => {
  const idExame = req.params.idExame;
  try {
    const exames = await bioquimicaDao.findById(idExame);

    if (exames.length === 0) {
      return res
        .status(404)
        .json({ error: "ExameBio não encontrado para listar" });
    }
    res.json(exames[0]);
  } catch (err) {
    console.error("Erro ao listar ExameBio do paciente", err);
    res.status(500).json({ error: "Erro interno ao listar exame do paciente" });
  }
};

exports.CreateBio = async (req, res) => {
  try {
    const novoBio = await bioquimicaDao.create(req.body);

    res.status(201).json({
      message: "ExameBio cadastrado com sucesso!",
      id: novoBio.insertId,
    });
  } catch (err) {
    console.error("Erro ao criar novo ExameBio", err);
    res
      .status(500)
      .json({ error: "Erro interno ao criar ExameBio do paciente" });
  }
}
