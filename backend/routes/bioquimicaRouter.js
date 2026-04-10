

const express = require("express");
const router = express.Router();
const bioquimicaController = require("../Controller/bioquimicaController");


router.get("/:idPaciente", bioquimicaController.getByRegistro);


router.get("/listar/:idExame", bioquimicaController.getById);


router.post("/", bioquimicaController.CreateBio);


router.put("/:idExame", bioquimicaController.updateBio);


router.delete("/:idExame", bioquimicaController.deleteBio);

module.exports = router;
