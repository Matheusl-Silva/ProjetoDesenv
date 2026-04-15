const anamneseDao = require("../dao/anamneseEnfermagemDao");

exports.getByPatientId = async (req, res) => {
  const idPaciente = req.params.idPaciente;
  try{
    const lista = await anamneseDao.findByPacientId(idPaciente);
    res.json(lista);
  }catch(err){
    console.error("Erro ao buscar anamneses: ", err);
    res.status(500).json({error: 'Erro interno ao buscar anamneses'})
  }
}

exports.getById = async (req, res) => {
    const id = req.params.id;
    try{
        const anamnese = await anamneseDao.findById(id);
        if(anamnese.length === 0){
            res.status(404).json({error: "Anamnese não encontrada"});
        }
        res.json(anamnese);
    }catch(err){
        console.error("Erro ao buscar anamnese: ", err);
        res.status(500).json({error: "Erro interno ao buscar anamnese"});
    }
}

exports.create = async (req, res) => {
  const dados = req.body;
  try {
    const novaAnamnese = await anamneseDao.create(dados);

    res
      .status(201)
      .json({
        message: "Anamnese cadastrada com sucesso!",
        id: novaAnamnese.insertId,
      });
  } catch (err) {
    console.error("Erro ao criar anamnese: ", err);
    res.status(500).json({ error: "Erro interno ao criar anamnese" });
  }
};
