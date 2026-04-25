/**
 * @swagger
 * tags:
 *   name: Anamnese de Enfermagem
 *   description: Endpoints para Anamnese de Enfermagem
 */

/**
 * @swagger
 * /anamneseEnf/paciente/{idPaciente}:
 *   get:
 *     summary: Lista todas as anamneses de enfermagem de um paciente
 *     tags: [Anamnese de Enfermagem]
 *     parameters:
 *       - in: path
 *         name: idPaciente
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID do paciente
 *     responses:
 *       200:
 *         description: Lista de anamneses retornada com sucesso
 *       500:
 *         description: Erro no servidor
 */

/**
 * @swagger
 * /anamneseEnf/{id}:
 *   get:
 *     summary: Retorna os detalhes completos de uma anamnese
 *     tags: [Anamnese de Enfermagem]
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID da anamnese
 *     responses:
 *       200:
 *         description: Dados da anamnese retornados
 *       404:
 *         description: Anamnese não encontrada
 */

/**
 * @swagger
 * /anamneseEnf:
 *   post:
 *     summary: Cria uma nova anamnese de enfermagem
 *     tags: [Anamnese de Enfermagem]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               idPaciente:
 *                 type: integer
 *               data:
 *                 type: string
 *                 format: date
 *               queixa:
 *                 type: string
 *               inicioSintomas:
 *                 type: string
 *                 format: date-time
 *               frequencia:
 *                 type: string
 *               localizacaoDaDor:
 *                 type: string
 *               cardiopatia:
 *                 type: integer
 *               hipertensao:
 *                 type: integer
 *               diabetes:
 *                 type: integer
 *               cancer:
 *                 type: integer
 *               cirurgias:
 *                 type: integer
 *               outrasDoencas:
 *                 type: string
 *               alergias:
 *                 type: string
 *               medicamento:
 *                 type: string
 *               refeicoesAoDia:
 *                 type: integer
 *               eliminacaoUrinaria:
 *                 type: string
 *               eliminacaoIntestinal:
 *                 type: string
 *               cicloMenstrual:
 *                 type: string
 *               sonoERepouso:
 *                 type: string
 *               horasDeSono:
 *                 type: integer
 *               frequenciaFumo:
 *                 type: string
 *               frequenciaDrogas:
 *                 type: string
 *               frequenciaAlcool:
 *                 type: string
 *               frequenciaExercicios:
 *                 type: string
 *               lazer:
 *                 type: string
 *               saneamentoBasico:
 *                 type: integer
 *               animaisDomesticos:
 *                 type: string
 *               postoDeSaude:
 *                 type: integer
 *               doencaFamiliar:
 *                 type: string
 *               tratamentoDoencaFamiliar:
 *                 type: string
 *     responses:
 *       201:
 *         description: Anamnese criada com sucesso
 *       400:
 *         description: Dados inválidos
 */

/**
 * @swagger
 * /anamneseEnf/{id}:
 *   put:
 *     summary: Atualiza uma anamnese de enfermagem existente
 *     tags: [Anamnese de Enfermagem]
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               idPaciente:
 *                 type: integer
 *               data:
 *                 type: string
 *                 format: date
 *               queixa:
 *                 type: string
 *               inicioSintomas:
 *                 type: string
 *                 format: date-time
 *               frequencia:
 *                 type: string
 *               localizacaoDaDor:
 *                 type: string
 *               cardiopatia:
 *                 type: integer
 *               hipertensao:
 *                 type: integer
 *               diabetes:
 *                 type: integer
 *               cancer:
 *                 type: integer
 *               cirurgias:
 *                 type: integer
 *               outrasDoencas:
 *                 type: string
 *               alergias:
 *                 type: string
 *               medicamento:
 *                 type: string
 *               refeicoesAoDia:
 *                 type: integer
 *               eliminacaoUrinaria:
 *                 type: string
 *               eliminacaoIntestinal:
 *                 type: string
 *               cicloMenstrual:
 *                 type: string
 *               sonoERepouso:
 *                 type: string
 *               horasDeSono:
 *                 type: integer
 *               frequenciaFumo:
 *                 type: string
 *               frequenciaDrogas:
 *                 type: string
 *               frequenciaAlcool:
 *                 type: string
 *               frequenciaExercicios:
 *                 type: string
 *               lazer:
 *                 type: string
 *               saneamentoBasico:
 *                 type: integer
 *               animaisDomesticos:
 *                 type: string
 *               postoDeSaude:
 *                 type: integer
 *               doencaFamiliar:
 *                 type: string
 *               tratamentoDoencaFamiliar:
 *                 type: string
 *     responses:
 *       200:
 *         description: Anamnese atualizada com sucesso
 *       404:
 *         description: Anamnese não encontrada
 */

/**
 * @swagger
 * /anamneseEnf/{id}:
 *   delete:
 *     summary: Exclui uma anamnese de enfermagem
 *     tags: [Anamnese de Enfermagem]
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Anamnese excluída com sucesso
 *       404:
 *         description: Anamnese não encontrada
 */
