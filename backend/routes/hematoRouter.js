const express = require("express");
const router = express.Router();
const hematoController = require("../Controller/hematoController");




router.get("/:idPaciente", hematoController.getByRegistro);


router.get("/listar/:idExame", hematoController.getById);


router.post("/", hematoController.CreateHemato);


router.put("/:idExame", hematoController.updateHemato);


router.delete("/:idExame", hematoController.deleteHemato);

module.exports = router;


