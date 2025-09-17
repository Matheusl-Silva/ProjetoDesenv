const express = require("express");
const router = express.Router();
const bioquimicaController = require("../Controller/bioquimicaController");

//listar somente os exames na tabelinha igual antigamente
router.get("/:idPaciente", bioquimicaController.getByRegistro);
// listar em tela o exame de um paciente por completo
router.get("/listar/:idExame", bioquimicaController.getById);
router.post("/", bioquimicaController.CreateBio);
router.put("/:idExame", bioquimicaController.updateBio);
router.delete("/:idExame", bioquimicaController.deleteBio);

module.exports = router;
