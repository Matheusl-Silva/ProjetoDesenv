const hematoRefDao = require("../dao/hematoRefDao");

exports.getAllHematoRefs = async (req, res) => {
  try {
    const hematoRef = await hematoRefDao.findAll();
    res.json(hematoRef);
  } catch (err) {
    console.error("Erro ao buscar as referencias de Hematologia", err);
    res.status(404).json({ error: "Erro ao buscar referencias hemato" });
  }
};

exports.createHematoRef = async (req, res) => {
  try {
    console.log("req.body:", req.body);
    console.log("req.body é undefined?", req.body === undefined);
    console.log("req.body é null?", req.body === null);
    console.log("Tipo de req.body:", typeof req.body);
    const novoHematoRef = await hematoRefDao.create(req.body);

    res.status(201).json({
      message: "Referencia Hematológica cadastrada com sucesso",
      id: novoHematoRef.insertId,
    });
  } catch (err) {
    console.error("Erro ao criar referencias de Hematologia", err);
    res.status(500).json({ error: "Erro ao criar referencia hematologica" });
  }
};

exports.updateHematoRef = async (req, res) => {
  const id = req.params.idReferenciaHemato;
  const dadosAtualizar = req.body;
  try {
    const result = await hematoRefDao.update(id, dadosAtualizar);

    if (result.affectedRows === 0) {
      return res.status(404).json({ error: "Referencia não encontrada" });
    }
    res.status(200).json({ message: "Referencia Atualizada com sucesso" });
  } catch (err) {
    console.error("Erro ao tentar atualizar Referencia de hematologia: ", err);
    res
      .status(500)
      .json({ error: "Erro ao tentar atualizar Referencia de hematologia" });
  }
};
