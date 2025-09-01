const express = require("express");
const router = express.Router();
const hematoController = require("../Controller/hematoController");

//listar somente os exames na tabelinha igual antigamente
router.get("/:idPaciente", hematoController.getByRegistro);
// listar em tela o exame de um paciente por completo
router.get("/listar/:idExame", hematoController.getById);
router.post("/", hematoController.CreateHemato);

module.exports = router;
