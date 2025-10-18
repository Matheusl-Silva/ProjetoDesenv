const express = require("express");
const router = express.Router();
const bioquimicaRefController = require("../Controller/bioquimicaRefController");

//listar os exames

router.get("/", bioquimicaRefController.getAllBioquimicaRef);
router.post("/", bioquimicaRefController.createBioquimicaRef);
router.put("/:idReferenciaHemato", bioquimicaRefController.updateBioquimicaRef);

module.exports = router;
