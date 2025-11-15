/**
 * @swagger
 * tags:
 *   name: Referência Bioquímica
 *   description: Endpoints para gerenciar os valores de referência de exames bioquímicos
 */

const express = require("express");
const router = express.Router();
const bioquimicaRefController = require("../Controller/bioquimicaRefController");

/**
 * @swagger
 * /bioquimicaRef:
 *   get:
 *     summary: Lista todas as referências bioquímicas
 *     tags: [Referência Bioquímica]
 *     responses:
 *       200:
 *         description: Lista de referências retornada com sucesso
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id:
 *                     type: integer
 *                     example: 1
 *                   cbilirrubina_total:
 *                     type: string
 *                     example: "0.3 - 1.2 mg/dL"
 *                   cglicose:
 *                     type: string
 *                     example: "70 - 99 mg/dL"
 *       500:
 *         description: Erro no servidor
 */
router.get("/", bioquimicaRefController.getAllBioquimicaRef);

/**
 * @swagger
 * /bioquimicaRef:
 *   post:
 *     summary: Cria um novo registro de referência bioquímica
 *     tags: [Referência Bioquímica]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               id:
 *                 type: integer
 *                 example: 1
 *               bilirrubina_total:
 *                 type: string
 *                 example: "0.3 - 1.2 mg/dL"
 *               bilirrubina_direta:
 *                 type: string
 *                 example: "0.1 - 0.4 mg/dL"
 *               proteina_total:
 *                 type: string
 *                 example: "6.0 - 8.3 g/dL"
 *               albumina:
 *                 type: string
 *                 example: "3.5 - 5.0 g/dL"
 *               glicose:
 *                 type: string
 *                 example: "70 - 99 mg/dL"
 *               colesterol_total:
 *                 type: string
 *                 example: "Menor que 190 mg/dL"
 *               triglicerideos:
 *                 type: string
 *                 example: "Menor que 150 mg/dL"
 *     responses:
 *       201:
 *         description: Registro criado com sucesso
 *       400:
 *         description: Dados inválidos
 *       500:
 *         description: Erro no servidor
 */
router.post("/", bioquimicaRefController.createBioquimicaRef);

/**
 * @swagger
 * /bioquimicaRef:
 *   put:
 *     summary: Atualiza o registro de referência bioquímica (id = 1)
 *     tags: [Referência Bioquímica]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               bilirrubina_total:
 *                 type: string
 *                 example: "0.3 - 1.2 mg/dL"
 *               proteina_total:
 *                 type: string
 *                 example: "6.0 - 8.3 g/dL"
 *               glicose:
 *                 type: string
 *                 example: "70 - 99 mg/dL"
 *               colesterol_total:
 *                 type: string
 *                 example: "Menor que 190 mg/dL"
 *               calcio:
 *                 type: string
 *                 example: "8.5 - 10.5 mg/dL"
 *     responses:
 *       200:
 *         description: Registro atualizado com sucesso
 *       400:
 *         description: Dados inválidos
 *       500:
 *         description: Erro no servidor
 */
router.put("/", bioquimicaRefController.updateBioquimicaRef);

module.exports = router;
