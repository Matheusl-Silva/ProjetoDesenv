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
    <!-- Elementos decorativos -->
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
                <fieldset disabled>
                    <legend class="h5 mb-3">
                        <i class="bi bi-person-badge me-2"></i>
                        Dados Gerais
                    </legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($exame->getPaciente()); ?>">
                            <?php else: ?>
                                <input type="text" class="form-control" value="*">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Exame realizado em</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame->getData()))); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Responsável</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($responsavel->getNome()); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preceptor</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($preceptor->getNome()); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Painel Hepático -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-heart-pulse me-2"></i>
                        Painel Hepático
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposHepatico = [
                            'getBilirrubinaTotal'                    => 'Bilirrubina Total',
                            'getBilirrubinaDireta'                   => 'Bilirrubina Direta',
                            'getProteinaTotal'                       => 'Proteína Total',
                            'getAlbumina'                            => 'Albumina',
                            'getAmilase'                             => 'Amilase',
                            'getTgoTransaminaseGlutamicoOxalacetica' => 'TGO (AST)',
                            'getTgpTransaminaseGlutamicoPiruvica'    => 'TGP (ALT)',
                            'getGamaGtGlutamiltransferase'           => 'Gama GT',
                            'getFosfataseAlcalina'                   => 'Fosfatase Alcalina',
                            'getReatinaQuinaseCk'                    => 'CK (Creatina Quinase)',
                        ];
                        foreach ($camposHepatico as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Metabólico / Outros -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-activity me-2"></i>
                        Metabólico / Outros
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposMetabolico = [
                            'getGlicose'             => 'Glicose',
                            'getPcrProteinaCReativa' => 'PCR (Proteína C Reativa)',
                            'getLdh'                 => 'LDH',
                        ];
                        foreach ($camposMetabolico as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
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
                            'getColesterolTotal' => 'Colesterol Total',
                            'getHdl'             => 'HDL',
                            'getLdl'             => 'LDL',
                            'getTriglicerideos'  => 'Triglicerídeos',
                        ];
                        foreach ($camposLipidico as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Renal / Metabólitos -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-water me-2"></i>
                        Renal / Metabólitos
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposRenal = [
                            'getUreia'      => 'Ureia',
                            'getCreatinina' => 'Creatinina',
                            'getAcidoUrico' => 'Ácido Úrico',
                        ];
                        foreach ($camposRenal as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Eletrólitos -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">
                        <i class="bi bi-lightning me-2"></i>
                        Eletrólitos
                    </legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposEletr = [
                            'getCalcio'   => 'Cálcio',
                            'getMagnesio' => 'Magnésio',
                            'getFosforo'  => 'Fósforo',
                        ];
                        foreach ($camposEletr as $metodo => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame->$metodo() ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>
            </div>

            <div class="card-footer bg-light text-center py-3">
                <?php if ($auth->isAdmin()): ?>
                    <button onclick="imprimirLaudo(<?php echo $exame->getId(); ?>)" class="btn btn-primary me-2">
                        <i class="bi bi-printer"></i> Imprimir
                    </button>
                <?php endif; ?>
                <a href="/exames?paciente=<?= $exame->getIdPaciente() ?>" class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar para o Paciente
                </a>
                <a href="/home" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Voltar para Home
                </a>
            </div>
        </div>
    </main>

</body>

</html>