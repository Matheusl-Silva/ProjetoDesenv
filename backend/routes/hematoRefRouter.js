const express = require("express");
const router = express.Router();
const hematoRefController = require("../Controller/hematoRefController");

//listar os exames

router.get("/", hematoRefController.getAllHematoRefs);
router.post("/", hematoRefController.createHematoRef);
router.put("/", hematoRefController.updateHematoRef);

module.exports = router;
