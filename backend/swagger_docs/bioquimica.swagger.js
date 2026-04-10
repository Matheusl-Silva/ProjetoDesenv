/**
 * @swagger
 * tags:
 *   name: Bioquímica
 *   description: Endpoints para exames de bioquímica
 */

/**
 * @swagger
 * /exameBio/{idPaciente}:
 *   get:
 *     summary: Lista todos os exames de bioquímica de um paciente
 *     tags: [Bioquímica]
 *     parameters:
 *       - in: path
 *         name: idPaciente
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID do paciente
 *     responses:
 *       200:
 *         description: Lista de exames retornada com sucesso
 *       500:
 *         description: Erro no servidor
 */

/**
 * @swagger
 * /exameBio/listar/{idExame}:
 *   get:
 *     summary: Retorna os detalhes completos de um exame de bioquímica
 *     tags: [Bioquímica]
 *     parameters:
 *       - in: path
 *         name: idExame
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID do exame
 *     responses:
 *       200:
 *         description: Dados do exame retornados
 *       404:
 *         description: Exame não encontrado
 */

/**
 * @swagger
 * /exameBio:
 *   post:
 *     summary: Cria um novo exame de bioquímica
 *     tags: [Bioquímica]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               id_paciente:
 *                 type: integer
 *               id_responsavel:
 *                 type: integer
 *               id_preceptor:
 *                 type: integer
 *               data_exame:
 *                 type: string
 *               glicose:
 *                 type: number
 *               colesterol_total:
 *                 type: number
 *     responses:
 *       201:
 *         description: Exame criado com sucesso
 *       400:
 *         description: Dados inválidos
 */

/**
 * @swagger
 * /exameBio/{idExame}:
 *   put:
 *     summary: Atualiza um exame existente
 *     tags: [Bioquímica]
 *     parameters:
 *       - in: path
 *         name: idExame
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *     responses:
 *       200:
 *         description: Exame atualizado com sucesso
 *       404:
 *         description: Exame não encontrado
 */

/**
 * @swagger
 * /exameBio/{idExame}:
 *   delete:
 *     summary: Exclui um exame de bioquímica
 *     tags: [Bioquímica]
 *     parameters:
 *       - in: path
 *         name: idExame
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Exame excluído com sucesso
 *       404:
 *         description: Exame não encontrado
 */