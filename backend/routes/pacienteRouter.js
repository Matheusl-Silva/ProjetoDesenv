const express = require("express");
const router = express.Router();
const pacienteController = require("../Controller/pacienteController");

router.get("/", pacienteController.getAllPacientes);
router.get("/:idPaciente", pacienteController.getPacienteById);
router.post("/verificar-email", pacienteController.verificarEmail)
router.post("/", pacienteController.createPaciente);
router.put("/:idPaciente", pacienteController.updatePaciente);

module.exports = router;
