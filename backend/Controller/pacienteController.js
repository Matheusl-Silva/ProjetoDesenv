const pacienteDAO = require("../dao/pacienteDao");

exports.getAllPacientes = async (req, res) => {
  try {
    const pacientes = await pacienteDAO.findAll();
    res.json(pacientes);
  } catch (err) {
    console.error("Erro ao buscar pacientes:", err);
    res.status(404).json({ error: "Erro ao buscar pacientes" });
  }
};

exports.getPacienteById = async (req, res) => {
  const id = req.params.idPaciente;
  try {
    const paciente = await pacienteDAO.findById(id);
    if (paciente.length === 0) {
      return res.status(404).json({ error: "Paciente não encontrado" });
    }
    res.json(paciente[0]);
  } catch (err) {
    console.error("Erro ao buscar paciente:", err);
    res.status(500).json({ error: "Erro ao buscar paciente" });
  }
};

exports.verificarEmail = async (req, res) => {
  const {email} = req.body;
  try{
    const paciente = await pacienteDAO.findByEmail(email);
    if(paciente){
      return res.status(200).json(paciente);
    }
    return res.status(404).json(false);
  }catch(err){
    console.log("Erro ao buscar paciente por email: ", err);
    return res.status(500).json({error: "Erro ao buscar paciente por email"});
  }
}

exports.createPaciente = async (req, res) => {
  const { email } = req.body;
  const pacienteExiste = await pacienteDAO.findByEmail(email);
  try {
    if (pacienteExiste.length > 0) {
      return res
        .status(409)
        .json({ error: "Já possui um paciente com o mesmo email" });
    }

    const novoPaciente = await pacienteDAO.create(req.body);
    res.status(201).json({
      message: "Paciente cadastrado com sucesso!",
      id: novoPaciente.insertId,
    });
  } catch (err) {
    console.error("Erro ao tentar cadastrar paciente: ", err);
    res.status(500).json({ error: "Erro ao tentar cadastrar o paciente" });
  }
};

exports.updatePaciente = async (req, res) => {
  const id = req.params.idPaciente;
  const dadosAtualizar = req.body;
  try {
    const result = await pacienteDAO.update(id, dadosAtualizar);

    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "Paciente não encontrado" });
    }
    res.status(200).json({ message: "Paciente atualizado com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar atualizar o paciente: ", err);
    res.status(500).json({ error: "Erro ao tentar atualizar paciente" });
  }
};
