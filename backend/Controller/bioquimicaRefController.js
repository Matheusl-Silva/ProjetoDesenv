const bioquimicaRefDao = require("../dao/bioquimicaRefDao");

exports.getAllBioquimicaRef = async (req, res) => {
  try {
    const bioquimicaRef = await bioquimicaRefDao.findAll();
    res.json(bioquimicaRef);
  } catch (err) {
    console.error("Erro ao buscar as referencias de Bioquimica", err);
    res.status(404).json({ error: "Erro ao buscar referencias bioquimica" });
  }
};

exports.createBioquimicaRef = async (req, res) => {
  try {
    const novoBioquimicaRef = await bioquimicaRefDao.create(req.body);

    res.status(201).json({
      message: "Referencia Hematológica cadastrada com sucesso",
      id: novoBioquimicaRef.insertId,
    });
  } catch (err) {
    console.error("Erro ao criar referencias de Bioquimica", err);
    res.status(500).json({ error: "Erro ao criar referencia bioquimica" });
  }
};

exports.updateBioquimicaRef = async (req, res) => {
  const id = req.params.idBioquimicaRef;
  const dadosAtualizar = req.body;
  try {
    const result = await bioquimicaRefDao.update(id, dadosAtualizar);

    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "Referencia não encontrada" });
    }
    res.status(200).json({ message: "Referencia Atualizada com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar atualizar Referencia de Bioquimica: ", err);
    res
      .status(500)
      .json({ error: "Erro ao tentar atualizar Referencia de Bioquimica" });
  }
};
