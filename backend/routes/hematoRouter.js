const express = require("express");
const router = express.Router();
const hematoController = require("../Controller/hematoController");

/**
 * @swagger
 * tags:
 *   name: Hematologia
 *   description: Endpoints para gerenciamento de exames hematológicos
 */

/**
 * @swagger
 * /exameHemato/{idPaciente}:
 *   get:
 *     summary: Lista os exames hematológicos de um paciente (somente cabeçalhos)
 *     tags: [Hematologia]
 *     parameters:
 *       - name: idPaciente
 *         in: path
 *         required: true
 *         description: ID do paciente
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Lista de exames hematológicos do paciente
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 $ref: '#/components/schemas/HematoResumo'
 *       404:
 *         description: Nenhum exame encontrado
 *       500:
 *         description: Erro ao buscar exames
 */
router.get("/:idPaciente", hematoController.getByRegistro);

/**
 * @swagger
 * /exameHemato/listar/{idExame}:
 *   get:
 *     summary: Retorna os detalhes completos de um exame hematológico
 *     tags: [Hematologia]
 *     parameters:
 *       - name: idExame
 *         in: path
 *         required: true
 *         description: ID do exame hematológico
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Exame retornado com sucesso
 *         content:
 *           application/json:
 *             schema:
 *               $ref: '#/components/schemas/HematoExame'
 *       404:
 *         description: Exame não encontrado
 *       500:
 *         description: Erro no servidor
 */
router.get("/listar/:idExame", hematoController.getById);

/**
 * @swagger
 * /hemato:
 *   post:
 *     summary: Cria um novo exame hematológico
 *     tags: [Hematologia]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/HematoInput'
 *     responses:
 *       201:
 *         description: Exame criado com sucesso
 *       400:
 *         description: Dados inválidos
 *       500:
 *         description: Erro ao criar exame
 */
router.post("/", hematoController.CreateHemato);

/**
 * @swagger
 * /exameHemato/{idExame}:
 *   put:
 *     summary: Atualiza um exame hematológico existente
 *     tags: [Hematologia]
 *     parameters:
 *       - name: idExame
 *         in: path
 *         required: true
 *         description: ID do exame a ser atualizado
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/HematoInput'
 *     responses:
 *       200:
 *         description: Exame atualizado com sucesso
 *       400:
 *         description: Dados inválidos
 *       404:
 *         description: Exame não encontrado
 *       500:
 *         description: Erro ao atualizar exame
 */
router.put("/:idExame", hematoController.updateHemato);

/**
 * @swagger
 * /exameHemato/{idExame}:
 *   delete:
 *     summary: Exclui um exame hematológico
 *     tags: [Hematologia]
 *     parameters:
 *       - name: idExame
 *         in: path
 *         required: true
 *         description: ID do exame a ser excluído
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Exame excluído com sucesso
 *       404:
 *         description: Exame não encontrado
 *       500:
 *         description: Erro ao excluir exame
 */
router.delete("/:idExame", hematoController.deleteHemato);

module.exports = router;

/**
 * @swagger
 * components:
 *   schemas:
 *     HematoResumo:
 *       type: object
 *       properties:
 *         id:
 *           type: integer
 *         ddata_exame:
 *           type: string
 *           format: date
 *         id_preceptor:
 *           type: integer
 *       example:
 *         id: 15
 *         ddata_exame: "2025-10-15"
 *         id_preceptor: 3
 *
 *     HematoExame:
 *       type: object
 *       properties:
 *         id:
 *           type: integer
 *         nome_paciente:
 *           type: string
 *         nome_responsavel:
 *           type: string
 *         nome_preceptor:
 *           type: string
 *         ddata_exame:
 *           type: string
 *           format: date
 *         nhemacia:
 *           type: number
 *         nhemoglobina:
 *           type: number
 *         nhematocrito:
 *           type: number
 *         nvcm:
 *           type: number
 *         nhcm:
 *           type: number
 *         nchcm:
 *           type: number
 *         nrdw:
 *           type: number
 *         nleucocitos:
 *           type: number
 *         nblastos:
 *           type: number
 *         npromielocitos:
 *           type: number
 *         nmielocitos:
 *           type: number
 *         nmetamielocitos:
 *           type: number
 *         nbastonetes:
 *           type: number
 *         nsegmentados:
 *           type: number
 *         neosinofilos:
 *           type: number
 *         nbasofilos:
 *           type: number
 *         nplaquetas:
 *           type: number
 *         nvolume_plaquetario_medio:
 *           type: number
 *         nneutrofilos:
 *           type: number
 *       example:
 *         id: 10
 *         nome_paciente: "João Silva"
 *         nome_responsavel: "Dra. Ana Paula"
 *         nome_preceptor: "Dr. Marcos"
 *         ddata_exame: "2025-09-28"
 *         nhemacia: 4.8
 *         nhemoglobina: 13.5
 *         nhematocrito: 42.1
 *         nvcm: 88
 *         nhcm: 29
 *         nchcm: 33
 *         nrdw: 12.5
 *         nleucocitos: 7000
 *         nblastos: 0
 *         npromielocitos: 0
 *         nmielocitos: 0
 *         nmetamielocitos: 0
 *         nbastonetes: 2
 *         nsegmentados: 60
 *         neosinofilos: 3
 *         nbasofilos: 1
 *         nplaquetas: 250000
 *         nvolume_plaquetario_medio: 10.5
 *         nneutrofilos: 62
 *
 *     HematoInput:
 *       type: object
 *       properties:
 *         idResponsavel:
 *           type: integer
 *         idPreceptor:
 *           type: integer
 *         idPaciente:
 *           type: integer
 *         dataExame:
 *           type: string
 *           format: date
 *         hemacia:
 *           type: number
 *         hemoglobina:
 *           type: number
 *         hematocrito:
 *           type: number
 *         vcm:
 *           type: number
 *         hcm:
 *           type: number
 *         chcm:
 *           type: number
 *         rdw:
 *           type: number
 *         leucocitos:
 *           type: number
 *         blastos:
 *           type: number
 *         promielocitos:
 *           type: number
 *         mielocitos:
 *           type: number
 *         metamielocitos:
 *           type: number
 *         bastonetes:
 *           type: number
 *         segmentados:
 *           type: number
 *         eosinofilos:
 *           type: number
 *         basofilos:
 *           type: number
 *         plaquetas:
 *           type: number
 *         volumePlaquetarioMedio:
 *           type: number
 *         neutrofilos:
 *           type: number
 *       required:
 *         - idPaciente
 *         - idResponsavel
 *         - dataExame
 *       example:
 *         idResponsavel: 2
 *         idPreceptor: 5
 *         idPaciente: 10
 *         dataExame: "2025-10-20"
 *         hemoglobina: 13.2
 *         hematocrito: 41.8
 *         leucocitos: 7100
 *         plaquetas: 260000
 */
