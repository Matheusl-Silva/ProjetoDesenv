<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css" />
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Visualizar Anamnese de Enfermagem</title>
</head>

<body>
    <div class="bg-decoration decoration-1"></div>
    <div class="bg-decoration decoration-2"></div>
    <div class="bg-decoration decoration-3"></div>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="logo-container-nav">
                        <img src="../../assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
                    </div>
                    <a class="navbar-brand">Portal de Saúde Positivo</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="d-flex align-items-center">
                        <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                        <form action="/logout" method="post">
                            <button type="submit" class="btn-logout">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-1">Anamnese de Enfermagem</h2>
                <p class="mb-0">Número: <?php echo htmlspecialchars($anamnese->getId()); ?></p>
            </div>

            <div class="card-body p-4">
                <!-- Dados Gerais -->
                <fieldset disabled id="fieldsetDadosGerais">
                    <legend class="h5 mb-3">Dados Gerais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente ID</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control" style="font-weight: bold;"
                                    value="<?php echo htmlspecialchars($anamnese->getIdPaciente()); ?>">
                            <?php else: ?>
                                <input type="text" class="form-control" value="***********">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Data da Anamnese</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars(date('d/m/Y', strtotime($anamnese->getData()))); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Informações Iniciais -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Informações Iniciais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Início dos Sintomas (Data/Hora)</label>
                            <input type="datetime-local" class="form-control exam-data" name="inicioSintomas"
                                value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($anamnese->getInicioSintomas()))); ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Queixa Principal</label>
                            <input type="text" class="form-control exam-data" name="queixa"
                                value="<?php echo htmlspecialchars($anamnese->getQueixa() ?? 'N/A'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Frequência da Queixa</label>
                            <input type="text" class="form-control exam-data" name="frequencia"
                                value="<?php echo htmlspecialchars($anamnese->getFrequencia() ?? 'N/A'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Localização da Dor</label>
                            <input type="text" class="form-control exam-data" name="localizacaoDaDor"
                                value="<?php echo htmlspecialchars($anamnese->getLocalizacaoDaDor() ?? 'N/A'); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Antecedentes Pessoais -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Antecedentes Pessoais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="cardiopatia" value="1" id="cardiopatia" <?php echo $anamnese->getCardiopatia() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="cardiopatia">Cardiopatia</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="hipertensao" value="1" id="hipertensao" <?php echo $anamnese->getHipertensao() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="hipertensao">Hipertensão</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="diabetes" value="1" id="diabetes" <?php echo $anamnese->getDiabetes() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="diabetes">Diabetes</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="cancer" value="1" id="cancer" <?php echo $anamnese->getCancer() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="cancer">Câncer</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="cirurgias" value="1" id="cirurgias" <?php echo $anamnese->getCirurgias() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="cirurgias">Cirurgias</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Outras Doenças</label>
                            <input type="text" class="form-control exam-data" name="outrasDoencas"
                                value="<?php echo htmlspecialchars($anamnese->getOutrasDoencas() ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alergias</label>
                            <input type="text" class="form-control exam-data" name="alergias"
                                value="<?php echo htmlspecialchars($anamnese->getAlergias() ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Medicamentos</label>
                            <input type="text" class="form-control exam-data" name="medicamento"
                                value="<?php echo htmlspecialchars($anamnese->getMedicamento() ?? ''); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Hábitos de Vida -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Hábitos de Vida e Saúde</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label">Refeições ao Dia</label>
                            <input type="number" class="form-control exam-data" name="refeicoesAoDia"
                                value="<?php echo htmlspecialchars($anamnese->getRefeicoesAoDia() ?? ''); ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Horas de Sono</label>
                            <input type="number" class="form-control exam-data" name="horasDeSono"
                                value="<?php echo htmlspecialchars($anamnese->getHorasDeSono() ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sono e Repouso</label>
                            <input type="text" class="form-control exam-data" name="sonoERepouso"
                                value="<?php echo htmlspecialchars($anamnese->getSonoERepouso() ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Eliminação Urinária</label>
                            <input type="text" class="form-control exam-data" name="eliminacaoUrinaria"
                                value="<?php echo htmlspecialchars($anamnese->getEliminacaoUrinaria() ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Eliminação Intestinal</label>
                            <input type="text" class="form-control exam-data" name="eliminacaoIntestinal"
                                value="<?php echo htmlspecialchars($anamnese->getEliminacaoIntestinal() ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ciclo Menstrual</label>
                            <input type="text" class="form-control exam-data" name="cicloMenstrual"
                                value="<?php echo htmlspecialchars($anamnese->getCicloMenstrual() ?? ''); ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Frequência Fumo</label>
                            <input type="text" class="form-control exam-data" name="frequenciaFumo"
                                value="<?php echo htmlspecialchars($anamnese->getFrequenciaFumo() ?? ''); ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Frequência Álcool</label>
                            <input type="text" class="form-control exam-data" name="frequenciaAlcool"
                                value="<?php echo htmlspecialchars($anamnese->getFrequenciaAlcool() ?? ''); ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Frequência Drogas</label>
                            <input type="text" class="form-control exam-data" name="frequenciaDrogas"
                                value="<?php echo htmlspecialchars($anamnese->getFrequenciaDrogas() ?? ''); ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Frequência Exercícios</label>
                            <input type="text" class="form-control exam-data" name="frequenciaExercicios"
                                value="<?php echo htmlspecialchars($anamnese->getFrequenciaExercicios() ?? ''); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Condições Sociais e Familiares -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Condições Sociais e Antecedentes Familiares</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Lazer</label>
                            <input type="text" class="form-control exam-data" name="lazer"
                                value="<?php echo htmlspecialchars($anamnese->getLazer() ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Animais Domésticos</label>
                            <input type="text" class="form-control exam-data" name="animaisDomesticos"
                                value="<?php echo htmlspecialchars($anamnese->getAnimaisDomesticos() ?? ''); ?>">
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="saneamentoBasico" value="1" id="saneamentoBasico" <?php echo $anamnese->getSaneamentoBasico() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="saneamentoBasico">Saneamento</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input exam-check" type="checkbox" name="postoDeSaude" value="1" id="postoDeSaude" <?php echo $anamnese->getPostoDeSaude() ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="postoDeSaude">Posto Saúde</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Doenças Familiares</label>
                            <input type="text" class="form-control exam-data" name="doencaFamiliar"
                                value="<?php echo htmlspecialchars($anamnese->getDoencaFamiliar() ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tratamento Familiar</label>
                            <input type="text" class="form-control exam-data" name="tratamentoDoencaFamiliar"
                                value="<?php echo htmlspecialchars($anamnese->getTratamentoDoencaFamiliar() ?? ''); ?>">
                        </div>
                    </div>
                </fieldset>

            </div>

            <div class="card-footer bg-light text-center py-3">
                <?php if ($auth->isAdmin()): ?>
                    <div id="botoesPadrao" class="mb-3">
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="mudarParaEdicao()">
                            <i class="bi bi-pencil-square"></i>Editar
                        </button>
                    </div>
                    <div id="botoesEdicao" style="display: none" class="mb-3">
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="location.reload()">
                            <i class="bi bi-x-lg"></i>Cancelar
                        </button>
                        <form action="/anamneseEnf/<?= $anamnese->getId() ?>" method="post" style="display: inline" id="formEdicao">
                            <input type="hidden" name="method" value="PUT">
                            <input type="hidden" name="dadosEdicao" value="" id="dadosEdicao">
                            <button type="submit" class="btn btn-primary me-2 col-2">
                                <i class="bi bi-check"></i>Confirmar
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
                <a href="/exames?paciente=<?= $anamnese->getIdPaciente() ?>"
                    class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar para o Paciente
                </a>
                <a href="/home" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Voltar para Home
                </a>
            </div>
        </div>
    </main>

    <script>
        function habilitarCampos() {
            const fieldsets = Array.from(document.querySelectorAll('fieldset'));
            fieldsets.forEach((item) => {
                item.removeAttribute('disabled');
            });

            document.getElementById('fieldsetDadosGerais').setAttribute('disabled', 'true');
        }

        function mudarParaEdicao() {
            const botoesPadrao = document.getElementById('botoesPadrao');
            const botoesEdicao = document.getElementById('botoesEdicao');

            botoesPadrao.style.display = 'none';
            botoesEdicao.style.display = 'block';

            habilitarCampos();
        }

        const formEdicao = document.getElementById('formEdicao');

        formEdicao.addEventListener('submit', function(e) {
            const idPaciente = <?= json_encode($anamnese->getIdPaciente()) ?>;
            const dataExame = <?= json_encode($anamnese->getData()) ?>;

            let json = {};
            json.idPaciente = idPaciente;
            json.data = dataExame;

            // Pega todos os inputs normais (text, number, datetime-local)
            const inputs = Array.from(document.querySelectorAll('.exam-data'));
            inputs.forEach((input) => {
                json[input.name] = input.value;
            });

            // Pega os checkboxes
            const checkboxes = Array.from(document.querySelectorAll('.exam-check'));
            checkboxes.forEach((check) => {
                json[check.name] = check.checked ? 1 : 0;
            });

            const inputDados = document.getElementById('dadosEdicao');
            inputDados.value = JSON.stringify(json);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
