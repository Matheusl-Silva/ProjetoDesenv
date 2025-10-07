<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">
    <link rel="stylesheet" href="../../assets/css/Bioquimica.css">
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Resultado do Exame</title>
</head>

<body>
    <div class="bg-decoration decoration-1"></div>
    <div class="bg-decoration decoration-2"></div>
    <div class="bg-decoration decoration-3"></div>

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

    <main class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-1">
                    <i class="bi bi-clipboard-data me-2"></i>
                    Resultado do Exame - Bioquímica
                </h2>
                <p class="mb-0">Número do Exame: <?php echo htmlspecialchars($exame->getId()); ?></p>
            </div>

            <div class="card-body p-4">
                <!-- Dados Gerais -->
                <fieldset disabled id="fieldsetDadosGerais">
                    <legend class="h5 mb-3">
                        <i class="bi bi-person-badge me-2"></i>
                        Dados Gerais
                    </legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control dadosGerais" value="<?php echo htmlspecialchars($exame->getPaciente()); ?>">
                            <?php else: ?>
                                <input type="text" class="form-control dadosGerais" value="*">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Exame realizado em</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame->getData()))); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Responsável</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars($responsavel->getNome()); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preceptor</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars($preceptor->getNome()); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Função Hepática -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-heart-pulse me-2"></i>
                        Função Hepática
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposHepatico = [
                            'getTgoTransaminaseGlutamicoOxalacetica' => ['label' => 'TGO (AST)', 'ref' => 'F: <31 U/L • M: <35 U/L'],
                            'getTgpTransaminaseGlutamicoPiruvica'    => ['label' => 'TGP (ALT)', 'ref' => 'F: <34 U/L • M: <45 U/L'],
                            'getGamaGtGlutamiltransferase'           => ['label' => 'Gama GT', 'ref' => 'F: <32 U/L • M: <49 U/L'],
                            'getBilirrubinaTotal'                    => ['label' => 'Bilirrubina Total', 'ref' => '0,1 – 1,2 mg/dL'],
                            'getBilirrubinaDireta'                   => ['label' => 'Bilirrubina Direta', 'ref' => '≤ 0,1 – 1,2 mg/dL'],
                        ];
                        foreach ($camposHepatico as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info['label']; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                                <div class="form-text text-muted small"><?php echo $info['ref']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Função Renal -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-funnel me-2"></i>
                        Função Renal
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposRenal = [
                            'getUreia'      => ['label' => 'Ureia', 'ref' => '10-50 mg/dL'],
                            'getCreatinina' => ['label' => 'Creatinina', 'ref' => 'F: 0,5-1,1 • M: 0,7-1,3 mg/dL'],
                        ];
                        foreach ($camposRenal as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info['label']; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                                <div class="form-text text-muted small"><?php echo $info['ref']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Proteínas e Enzimas -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-body-text me-2"></i>
                        Proteínas e Enzimas
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposProteinas = [
                            'getProteinaTotal'     => ['label' => 'Proteína Total', 'ref' => '3,5 – 5,2 g/dL'],
                            'getAlbumina'          => ['label' => 'Albumina', 'ref' => '3,5 – 5,2 g/dL'],
                            'getAmilase'           => ['label' => 'Amilase', 'ref' => '< 100 U/L'],
                            'getLdh'               => ['label' => 'LDH', 'ref' => '< 480 U/L'],
                            'getFosfataseAlcalina' => ['label' => 'Fosfatase Alcalina', 'ref' => 'F: 35–105 • M: 40–130 U/L'],
                            'getReatinaQuinaseCk'  => ['label' => 'CK (Creatina Quinase)', 'ref' => 'F: <145 • M: <171 U/L'],
                        ];
                        foreach ($camposProteinas as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info['label']; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                                <div class="form-text text-muted small"><?php echo $info['ref']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Perfil Lipídico -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-droplet me-2"></i>
                        Perfil Lipídico
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposLipidico = [
                            'getColesterolTotal' => ['label' => 'Colesterol Total', 'ref' => '≤ 200 mg/dL'],
                            'getHdl'             => ['label' => 'HDL', 'ref' => '≥ 40–45 mg/dL'],
                            'getLdl'             => ['label' => 'LDL', 'ref' => 'Alvo por risco'],
                            'getTriglicerideos'  => ['label' => 'Triglicerídeos', 'ref' => '≤ 200 mg/dL'],
                        ];
                        foreach ($camposLipidico as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info['label']; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                                <div class="form-text text-muted small"><?php echo $info['ref']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Metabolismo e Minerais -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-lightning me-2"></i>
                        Metabolismo e Minerais
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposMetabolismo = [
                            'getGlicose'    => ['label' => 'Glicose', 'ref' => '70–99 jejum'],
                            'getFerro'      => ['label' => 'Ferro', 'ref' => 'F: 50-170 • M: 65-175 µg/dL'],
                            'getCalcio'     => ['label' => 'Cálcio', 'ref' => '8,5-10,5 mg/dL'],
                            'getMagnesio'   => ['label' => 'Magnésio', 'ref' => '1,7-2,2 mg/dL'],
                            'getFosforo'    => ['label' => 'Fósforo', 'ref' => '2,5-4,5 mg/dL'],
                            'getAcidoUrico' => ['label' => 'Ácido Úrico', 'ref' => 'F: 2,4-6,0 • M: 3,4-7,0 mg/dL'],
                        ];
                        foreach ($camposMetabolismo as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info['label']; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                                <div class="form-text text-muted small"><?php echo $info['ref']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>
                <!-- Marcadores Inflamatórios -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-fire me-2"></i>
                        Marcadores Inflamatórios
                    </legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label">PCR (Proteína C Reativa)</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame->getPcrProteinaCReativa() ?? 'N/A'); ?>">
                            <div class="form-text text-muted small">Inferior a 1,0 mg/dL</div>
                        </div>
                    </div>
                </fieldset>

                <!-- Observações (Agora sempre visível) -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-journal-text me-2"></i>
                        Observações
                    </legend>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <textarea class="form-control dadosGerais" rows="4"><?php echo htmlspecialchars($exame->getObservacao() ?? ""); ?></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>

            <?php if ($auth->isAdmin()): ?>
                <div class="text-center py-3">
                    <div id="botoesPadrao">
                        <button onclick="imprimirLaudo(<?php echo $exame->getId(); ?>)" class="btn btn-primary me-2 col-2" id="botaoImpressao">
                            <i class="bi bi-printer"></i> Imprimir
                        </button>
                        <button class="btn btn-primary me-2 col-2" onclick="mudarParaEdicao()" id="botaoEditar">
                            <i class="bi bi-pencil-square"></i>Editar
                        </button>
                    </div>
                    <div id="botoesEdicao" style="display: none">
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="location.reload()"><i class="bi bi-x-lg"></i>Cancelar</button>
                        <form action="/exameBio/<?= $exame->getId() ?>" method="post" class="col-12 justify-content-center" style="display: inline" id="formEdicao">
                            <input type="hidden" name="method" value="PUT">
                            <input type="hidden" name="dadosEdicao" value="" id="dadosEdicao">
                            <button type="submit" class="btn btn-primary me-2 col-2">
                                <i class="bi bi-check"></i>Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card-footer bg-light text-center py-3">
                <a href="/exames?paciente=<?= $exame->getPaciente() ?>" class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar para o Paciente
                </a>
                <a href="/home" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Voltar para Home
                </a>
            </div>
        </div>
    </main>

</body>
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
        botoesEdicao.style.display = 'inline';
        
        habilitarCampos();
    }
    
    const formEdicao = document.getElementById('formEdicao');
    
    formEdicao.addEventListener('submit', function() {

        const nomesValores = [
            // Função Hepática
            "tgo",
            "tgp",
            "gamaGt",
            "bilirrubinaTotal",
            "bilirrubinaDireta",

            // Função Renal
            "ureia",
            "creatinina",

            // Proteínas e Enzimas
            "proteinaTotal",
            "albumina",
            "amilase",
            "ldh",
            "fosfataseAlcalina",
            "ckCreatinaQuinase",

            // Perfil Lipídico
            "colesterolTotal",
            "hdl",
            "ldl",
            "triglicerideos",

            // Metabolismo e Minerais
            "glicose",
            "ferro",
            "calcio",
            "magnesio",
            "fosforo",
            "acidoUrico",

            // Marcadores Inflamatórios
            "pcrProteinaCReativa"
        ];


        const inputs = Array.from(document.querySelectorAll('input'));

        const idPaciente = <?= json_encode($exame->getPaciente()) ?>;
        
        const dataExame = "<?= json_encode($exame->getData()) ?>";
        const idResponsavel = <?= json_encode($exame->getResponsavel()) ?>;
        const idPreceptor = <?= json_encode($exame->getPreceptor()) ?>;


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
</script>

</html>