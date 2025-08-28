const express = require("express");
const router = express.Router();
const usuarioController = require("../Controller/usuarioController");

router.get("/", usuarioController.getAllUsuarios);
router.get("/:idUsuario", usuarioController.getUsuariobyId);
router.post("/", usuarioController.createUsuario);
router.post("/verificar-email", usuarioController.verificarEmail);
router.post("/login", usuarioController.login);
router.put("/:idUsuario", usuarioController.updateUsuario);
router.delete("/:idUsuario", usuarioController.deleteUsuario);

module.exports = router;
