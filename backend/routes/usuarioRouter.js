const express = require("express");
const router = express.Router();
const usuarioController = require("../Controller/usuarioController");

/**
 * @openapi
 * components:
 *   schemas:
 *     Usuario:
 *       type: object
 *       properties:
 *         idUsuario:
 *           type: integer
 *           example: 1
 *         nome:
 *           type: string
 *           example: João Silva
 *         email:
 *           type: string
 *           format: email
 *           example: joao.silva@exemplo.com
 *         senha:
 *           type: string
 *           example: senha123
 *         admin:
 *           type: boolean
 *           example: false
 *
 *     UsuarioLogin:
 *       type: object
 *       required:
 *         - email
 *         - senha
 *       properties:
 *         email:
 *           type: string
 *           format: email
 *           example: joao.silva@exemplo.com
 *         senha:
 *           type: string
 *           example: senha123
 */

/**
 * @openapi
 * /:
 *   get:
 *     summary: Retorna todos os usuários.
 *     tags: [Usuário]
 *     responses:
 *       200:
 *         description: Lista de todos os usuários.
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 $ref: '#/components/schemas/Usuario'
 *       404:
 *         description: Erro ao buscar usuários.
 */
router.get("/", usuarioController.getAllUsuarios);

/**
 * @openapi
 * /{idUsuario}:
 *   get:
 *     summary: Retorna um usuário pelo ID.
 *     tags: [Usuário]
 *     parameters:
 *       - in: path
 *         name: idUsuario
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID único do usuário.
 *     responses:
 *       200:
 *         description: Detalhes do usuário.
 *         content:
 *           application/json:
 *             schema:
 *               $ref: '#/components/schemas/Usuario'
 *       404:
 *         description: Usuário não encontrado.
 *       500:
 *         description: Erro ao buscar usuário.
 */
router.get("/:idUsuario", usuarioController.getUsuariobyId);

/**
 * @openapi
 * /:
 *   post:
 *     summary: Cria um novo usuário.
 *     tags: [Usuário]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/Usuario'
 *           example:
 *             nome: Novo Usuário
 *             email: novo.usuario@exemplo.com
 *             senha: senha123
 *     responses:
 *       201:
 *         description: Usuário cadastrado com sucesso.
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: usuario cadastrado com sucesso!
 *                 id:
 *                   type: integer
 *                   example: 5
 *       409:
 *         description: Já existe um usuário com o mesmo email.
 *       500:
 *         description: Erro ao tentar cadastrar o usuário.
 */
router.post("/", usuarioController.createUsuario);

/**
 * @openapi
 * /verificar-email:
 *   post:
 *     summary: Verifica a existência de um email de usuário.
 *     tags: [Usuário]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - email
 *             properties:
 *               email:
 *                 type: string
 *                 format: email
 *                 example: joao.silva@exemplo.com
 *     responses:
 *       200:
 *         description: Email encontrado. Retorna o objeto do usuário.
 *         content:
 *           application/json:
 *             schema:
 *               $ref: '#/components/schemas/Usuario'
 *       404:
 *         description: Email não encontrado. Retorna `false`.
 *       500:
 *         description: Erro ao buscar usuário por email.
 */
router.post("/verificar-email", usuarioController.verificarEmail);

/**
 * @openapi
 * /login:
 *   post:
 *     summary: Realiza o login do usuário.
 *     tags: [Usuário]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/UsuarioLogin'
 *     responses:
 *       200:
 *         description: Login bem-sucedido. Retorna o objeto do usuário.
 *         content:
 *           application/json:
 *             schema:
 *               $ref: '#/components/schemas/Usuario'
 *       404:
 *         description: Usuário não encontrado (email ou senha incorretos).
 *       500:
 *         description: Erro ao tentar fazer login.
 */
router.post("/login", usuarioController.login);

/**
 * @openapi
 * /{idUsuario}:
 *   put:
 *     summary: Atualiza um usuário existente.
 *     tags: [Usuário]
 *     parameters:
 *       - in: path
 *         name: idUsuario
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID único do usuário a ser atualizado.
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/Usuario'
 *           example:
 *             nome: Nome Atualizado
 *             email: email.atualizado@exemplo.com
 *             senha: NovaSenha456
 *             admin: true
 *     responses:
 *       200:
 *         description: Usuário atualizado com sucesso.
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: usuario atualizado com sucesso
 *       404:
 *         description: Usuário não encontrado.
 *       500:
 *         description: Erro ao tentar atualizar o usuário.
 */
router.put("/:idUsuario", usuarioController.updateUsuario);

/**
 * @openapi
 * /{idUsuario}:
 *   delete:
 *     summary: Deleta um usuário.
 *     tags: [Usuário]
 *     parameters:
 *       - in: path
 *         name: idUsuario
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID único do usuário a ser deletado.
 *     responses:
 *       200:
 *         description: Usuário deletado com sucesso.
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Usuario deletado com sucesso
 *       404:
 *         description: Usuário não encontrado.
 *       500:
 *         description: Erro ao tentar deletar o usuário.
 */
router.delete("/:idUsuario", usuarioController.deleteUsuario);

module.exports = router;
