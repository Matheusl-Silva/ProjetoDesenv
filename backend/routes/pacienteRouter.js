const express = require("express");
const router = express.Router();
const pacienteController = require("../Controller/pacienteController");




router.get("/", pacienteController.getAllPacientes);
router.post("/", pacienteController.createPaciente);


router.get("/:idPaciente", pacienteController.getPacienteById);
router.put("/:idPaciente", pacienteController.updatePaciente);
router.delete("/:idPaciente", pacienteController.deletePaciente);


router.post("/verificar-email", pacienteController.verificarEmail);


router.get("/buscaExames/:idPaciente", pacienteController.BuscarGeralExames);

module.exports = router;


