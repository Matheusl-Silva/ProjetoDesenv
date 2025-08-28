const express = require("express");
const router = express.Router();
const hematoController = require("../Controller/hematoController");

router.get("/:idPaciente", hematoController.getByRegistro);
router.get("/:idPaciente", hematoController.getById);

module.exports = router;
