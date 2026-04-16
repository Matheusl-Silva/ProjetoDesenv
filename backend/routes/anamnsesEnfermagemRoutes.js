const express = require("express");
const router = express.Router();
const anamneseController = require("../Controller/anamneseEnfermagemController");

router.get("/:id", anamneseController.getById);
router.get("/paciente/:idPaciente", anamneseController.getByPatientId);
router.post("/", anamneseController.create);
router.put("/:id", anamneseController.update);
router.delete("/:id", anamneseController.delete);

module.exports = router;