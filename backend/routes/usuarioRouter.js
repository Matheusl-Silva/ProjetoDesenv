const express = require("express");
const router = express.Router();
const usuarioController = require("../Controller/usuarioController");

router.get("/", usuarioController.getAllUsuarios);
router.get("/:idUsuario", usuarioController.getUsuariobyId);
router.post("/", usuarioController.createUsuario);
router.put("/:idUsuario", usuarioController.updateUsuario);

module.exports = router;
