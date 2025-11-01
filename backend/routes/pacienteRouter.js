const express = require("express");
const router = express.Router();
const pacienteController = require("../Controller/pacienteController");

/**
 * @swagger
 * tags:
 *   name: Paciente
 *   description: Endpoints para gerenciamento de pacientes
 */

/**
 * @swagger
 * /pacientes:
 *   get:
 *     summary: Lista todos os pacientes
 *     tags: [Paciente]
 *     responses:
 *       200:
 *         description: Lista de pacientes retornada com sucesso
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 $ref: '#/components/schemas/Paciente'
 *       500:
 *         description: Erro ao buscar pacientes
 *
 *   post:
 *     summary: Cria um novo paciente
 *     tags: [Paciente]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/PacienteInput'
 *     responses:
 *       201:
 *         description: Paciente criado com sucesso
 *       400:
 *         description: Dados inválidos
 *       500:
 *         description: Erro no servidor
 */
router.get("/", pacienteController.getAllPacientes);
router.post("/", pacienteController.createPaciente);

/**
 * @swagger
 * /paciente/{idPaciente}:
 *   get:
 *     summary: Busca um paciente pelo ID
 *     tags: [Paciente]
 *     parameters:
 *       - name: idPaciente
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Paciente encontrado
 *         content:
 *           application/json:
 *             schema:
 *               $ref: '#/components/schemas/Paciente'
 *       404:
 *         description: Paciente não encontrado
 *       500:
 *         description: Erro no servidor
 *
 *   put:
 *     summary: Atualiza um paciente
 *     tags: [Paciente]
 *     parameters:
 *       - name: idPaciente
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             $ref: '#/components/schemas/PacienteInput'
 *     responses:
 *       200:
 *         description: Paciente atualizado com sucesso
 *       400:
 *         description: Dados inválidos
 *       404:
 *         description: Paciente não encontrado
 *       500:
 *         description: Erro no servidor
 *
 *   delete:
 *     summary: Exclui um paciente
 *     tags: [Paciente]
 *     parameters:
 *       - name: idPaciente
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Paciente excluído com sucesso
 *       404:
 *         description: Paciente não encontrado
 *       500:
 *         description: Erro no servidor
 */
router.get("/:idPaciente", pacienteController.getPacienteById);
router.put("/:idPaciente", pacienteController.updatePaciente);
router.delete("/:idPaciente", pacienteController.deletePaciente);

/**
 * @swagger
 * /paciente/verificar-email:
 *   post:
 *     summary: Verifica se um e-mail já está cadastrado
 *     tags: [Paciente]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               email:
 *                 type: string
 *                 format: email
 *             required:
 *               - email
 *     responses:
 *       200:
 *         description: Resultado da verificação de e-mail
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 existe:
 *                   type: boolean
 *       400:
 *         description: E-mail inválido
 *       500:
 *         description: Erro no servidor
 */
router.post("/verificar-email", pacienteController.verificarEmail);

/**
 * @swagger
 * /paciente/buscaExames/{idPaciente}:
 *   get:
 *     summary: Busca todos os exames (bioquímica e hematologia) de um paciente
 *     tags: [Paciente]
 *     parameters:
 *       - name: idPaciente
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Exames do paciente retornados com sucesso
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 $ref: '#/components/schemas/ExameGeral'
 *       404:
 *         description: Paciente não encontrado
 *       500:
 *         description: Erro no servidor
 */
router.get("/buscaExames/:idPaciente", pacienteController.BuscarGeralExames);

module.exports = router;

/**
 * @swagger
 * components:
 *   schemas:
 *     Paciente:
 *       type: object
 *       properties:
 *         id:
 *           type: integer
 *         nome:
 *           type: string
 *         email:
 *           type: string
 *         periodo:
 *           type: string
 *         data_nascimento:
 *           type: string
 *           format: date
 *         telefone:
 *           type: string
 *         cpf:
 *           type: string
 *         medicamento:
 *           type: string
 *         patologia:
 *           type: string
 *
 *     PacienteInput:
 *       type: object
 *       properties:
 *         nome:
 *           type: string
 *           example: João da Silva
 *         email:
 *           type: string
 *           format: email
 *           example: joao@email.com
 *         periodo:
 *           type: string
 *           example: Noturno
 *         data_nascimento:
 *           type: string
 *           format: date
 *           example: 1995-10-15
 *         telefone:
 *           type: string
 *           example: "(11) 99999-9999"
 *         cpf:
 *           type: string
 *           example: "123.456.789-00"
 *         medicamento:
 *           type: string
 *           example: "Nenhum"
 *         patologia:
 *           type: string
 *           example: "Hipertensão"
 *       required:
 *         - nome
 *         - email
 *         - data_nascimento
 *
 *     ExameGeral:
 *       type: object
 *       description: Exames bioquímicos e hematológicos combinados
 *       properties:
 *         id_paciente:
 *           type: integer
 *         tipo_exame:
 *           type: string
 *         resultados:
 *           type: object
 */
