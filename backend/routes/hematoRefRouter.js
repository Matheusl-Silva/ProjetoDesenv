/**
 * @swagger
 * tags:
 *   name: Referência Hematologia
 *   description: Endpoints para gerenciar valores de referência de hematologia
 */

const express = require("express");
const router = express.Router();
const hematoRefController = require("../Controller/hematoRefController");

/**
 * @swagger
 * /hematoRef:
 *   get:
 *     summary: Lista todos os valores de referência de hematologia
 *     tags: [Referência Hematologia]
 *     responses:
 *       200:
 *         description: Lista de referências retornada com sucesso
 *       500:
 *         description: Erro no servidor
 */
router.get("/", hematoRefController.getAllHematoRefs);

/**
 * @swagger
 * /hematoref:
 *   post:
 *     summary: Cria um novo registro de referência de hematologia
 *     tags: [Referência Hematologia]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               hemacia_m:
 *                 type: number
 *                 example: 4.5
 *               hemacia_f:
 *                 type: number
 *                 example: 4.2
 *               hemoglobina_m:
 *                 type: number
 *                 example: 15.0
 *               hemoglobina_f:
 *                 type: number
 *                 example: 13.0
 *               hematocrito_m:
 *                 type: number
 *                 example: 45
 *               hematocrito_f:
 *                 type: number
 *                 example: 40
 *               plaquetas:
 *                 type: number
 *                 example: 250000
 *               volume_plaquetario_medio:
 *                 type: number
 *                 example: 10.5
 *     responses:
 *       201:
 *         description: Referência criada com sucesso
 *       400:
 *         description: Dados inválidos
 *       500:
 *         description: Erro no servidor
 */
router.post("/", hematoRefController.createHematoRef);

/**
 * @swagger
 * /hematoRef/{idReferenciaHemato}:
 *   put:
 *     summary: Atualiza um registro de referência de hematologia existente
 *     tags: [Referência Hematologia]
 *     parameters:
 *       - in: path
 *         name: idReferenciaHemato
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID da referência a ser atualizada
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               hemoglobina_m:
 *                 type: number
 *                 example: 16.0
 *               hemoglobina_f:
 *                 type: number
 *                 example: 13.5
 *               plaquetas:
 *                 type: number
 *                 example: 230000
 *     responses:
 *       200:
 *         description: Referência atualizada com sucesso
 *       404:
 *         description: Referência não encontrada
 *       500:
 *         description: Erro no servidor
 */
router.put("/:idReferenciaHemato", hematoRefController.updateHematoRef);

module.exports = router;
