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
    <title>Resultado do Exame</title>
</head>

<body>
    <!-- Elementos decorativos de fundo -->
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
                <h2 class="mb-1">Resultado do Exame Hematologia</h2>
                <p class="mb-0">Número do Exame: <?php echo htmlspecialchars($exame->getId()); ?></p>
            </div>

            <div class="card-body p-4">
                <!-- Dados Gerais -->
                <fieldset disabled id="fieldsetDadosGerais">
                    <legend class="h5 mb-3">Dados Gerais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->getPaciente()); ?>">
                            <?php else: ?>
                                <input type="text" class="form-control" value="***********">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Exame realizado em</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame->getData()))); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Responsável pelo Exame</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame->getIdResponsavel()); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preceptor Responsável</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame->getPreceptor()); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Eritrograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Eritrograma</legend>
                    <div class="row g-3 mb-4">
                        <?php
$camposEritrograma = [
    'getHemacia'     => 'Hemácias',
    'getHemoglobina' => 'Hemoglobina',
    'getHematocrito' => 'Hematócrito',
    'getVcm'         => 'VCM',
    'getHcm'         => 'HCM',
    'getChcm'        => 'CHCM',
    'getRdw'         => 'RDW',
];
foreach ($camposEritrograma as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Leucograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Leucograma</legend>
                    <div class="row g-3 mb-4">
                        <?php
$camposLeucograma = [
    'getLeucocitos'     => 'Leucócitos',
    'getBlastos'        => 'Blastos (µL)',
    'getPromielocitos'  => 'Prómielócitos (µL)',
    'getMielocitos'     => 'Mielócitos (µL)',
    'getMetamielocitos' => 'Metamielócitos (µL)',
    'getBastonetes'     => 'Bastonetes (µL)',
    'getSegmentados'    => 'Segmentados (µL)',
    'getNeutrofilos'    => 'Neutrófilos (%)',
    'getEosinofilos'    => 'Eosinófilos (%)',
    'getBasofilos'      => 'Basófilos (%)',
];
foreach ($camposLeucograma as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Plaquetograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Plaquetograma</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Plaquetas</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame->getPlaquetas() ?? 'N/A'); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Volume Plaquetário Médio</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame->getVolumePlaquetarioMedio() ?? 'N/A'); ?>">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="card-footer bg-light text-center py-3">
                <?php if ($auth->isAdmin()): ?>
                    <div id="botoesPadrao" class="mb-3">
                        <button onclick="imprimirLaudo(<?php echo $exame->getId(); ?>)" class="btn btn-primary me-2 col-2">
                            <i class="bi bi-printer"></i> Imprimir
                        </button>
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="mudarParaEdicao()">
                            <i class="bi bi-pencil-square"></i>Editar
                        </button>
                    </div>
                    <div id="botoesEdicao" style="display: none" class="mb-3">
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="location.reload()">
                            <i class="bi bi-x-lg"></i>Cancelar
                        </button>
                        <form action="/exameHemato/<?=$exame->getId()?>" method="post" style="display: inline" id="formEdicao">
                            <input type="hidden" name="method" value="PUT">
                            <input type="hidden" name="dadosEdicao" value="" id="dadosEdicao">
                            <button type="submit" class="btn btn-primary me-2 col-2">
                                <i class="bi bi-check"></i>Confirmar
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
                <a href="/exames?paciente=<?=$exame->getPaciente()?>"
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
            //e.preventDefault();

            const nomesValores = [
                // Eritrograma
                "hemacia",
                "hemoglobina",
                "hematocrito",
                "vcm",
                "hcm",
                "chcm",
                "rdw",

                // Leucograma
                "leucocitos",
                "blastos",
                "promielocitos",
                "mielocitos",
                "metamielocitos",
                "bastonetes",
                "segmentados",
                "neutrofilos",
                "eosinofilos",
                "basofilos",

                // Plaquetograma
                "plaquetas",
                "volumePlaquetarioMedio"
            ];

            const inputs = Array.from(document.querySelectorAll('input'));

            const idPaciente = <?=json_encode($exame->getPaciente())?>;
            const dataExame = <?=json_encode($exame->getData())?>;
            const idResponsavel = <?=json_encode($exame->getIdResponsavel())?>;
            const idPreceptor = <?=json_encode($exame->getPreceptor())?>;


            let json = {};

            json.idPaciente = idPaciente;
            json.dataExame = dataExame;
            json.idResponsavel = idResponsavel;
            json.idPreceptor = idPreceptor;

            inputs.forEach((input, index) => {
                if (input.type == 'text' && !input.className.includes('dadosGerais')) {
                    json[nomesValores[index - 4]] = input.value; //4 = Número de inputs não considerados
                }
            })

            const inputDados = document.getElementById('dadosEdicao');
            inputDados.value = JSON.stringify(json);
            console.log(inputDados.value);
        });


        function imprimirLaudo(idExame) {
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = `/views/LaudoView.php?id=${idExame}`;
            console.log(iframe.src);
            document.body.appendChild(iframe);

            iframe.onload = function() {
                try {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                    iframe.contentWindow.onafterprint = function() {
                        document.body.removeChild(iframe);
                    }
                } catch (error) {
                    alert("Não foi possível abrir a janela de impressão.");
                    document.body.removeChild(iframe);
                }
            };
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>