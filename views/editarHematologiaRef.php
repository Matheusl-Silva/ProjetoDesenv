<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Editar Referência Hematologia</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center">
                    <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nomeUsuario); ?></span>
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

    <div class="container mt-5">
        <div class="action-card p-4">
            <h1 class="card-title text-center mb-4">Editar Valores de Referência - Hematologia</h1>
            <form action="/hematoRef" method="POST">
                <input type="hidden" name="method" value="PUT">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($hematoRef->getId() ?? 1); ?>">

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="chemacia_m" class="form-label">Hemácia (Masculino):</label>
                        <input type="text" class="form-control" id="chemacia_m" name="chemacia_m"
                            value="<?php echo htmlspecialchars($hematoRef->getChemaciaM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chemacia_f" class="form-label">Hemácia (Feminino):</label>
                        <input type="text" class="form-control" id="chemacia_f" name="chemacia_f"
                            value="<?php echo htmlspecialchars($hematoRef->getChemaciaF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chemacia_unidade" class="form-label">Unidade Hemácia:</label>
                        <input type="text" class="form-control" id="chemacia_unidade" name="chemacia_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getChemaciaUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="chemoglobina_m" class="form-label">Hemoglobina (Masculino):</label>
                        <input type="text" class="form-control" id="chemoglobina_m" name="chemoglobina_m"
                            value="<?php echo htmlspecialchars($hematoRef->getChemoglobinaM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chemoglobina_f" class="form-label">Hemoglobina (Feminino):</label>
                        <input type="text" class="form-control" id="chemoglobina_f" name="chemoglobina_f"
                            value="<?php echo htmlspecialchars($hematoRef->getChemoglobinaF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chemoglobina_unidade" class="form-label">Unidade Hemoglobina:</label>
                        <input type="text" class="form-control" id="chemoglobina_unidade" name="chemoglobina_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getChemoglobinaUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="chematocrito_m" class="form-label">Hematócrito (Masculino):</label>
                        <input type="text" class="form-control" id="chematocrito_m" name="chematocrito_m"
                            value="<?php echo htmlspecialchars($hematoRef->getChematocritoM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chematocrito_f" class="form-label">Hematócrito (Feminino):</label>
                        <input type="text" class="form-control" id="chematocrito_f" name="chematocrito_f"
                            value="<?php echo htmlspecialchars($hematoRef->getChematocritoF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chematocrito_unidade" class="form-label">Unidade Hematócrito:</label>
                        <input type="text" class="form-control" id="chematocrito_unidade" name="chematocrito_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getChematocritoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cvcm_m" class="form-label">VCM (Masculino):</label>
                        <input type="text" class="form-control" id="cvcm_m" name="cvcm_m"
                            value="<?php echo htmlspecialchars($hematoRef->getCvcmM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cvcm_f" class="form-label">VCM (Feminino):</label>
                        <input type="text" class="form-control" id="cvcm_f" name="cvcm_f"
                            value="<?php echo htmlspecialchars($hematoRef->getCvcmF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cvcm_unidade" class="form-label">Unidade VCM:</label>
                        <input type="text" class="form-control" id="cvcm_unidade" name="cvcm_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCvcmUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="chcm_m" class="form-label">HCM (Masculino):</label>
                        <input type="text" class="form-control" id="chcm_m" name="chcm_m"
                            value="<?php echo htmlspecialchars($hematoRef->getChcmM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chcm_f" class="form-label">HCM (Feminino):</label>
                        <input type="text" class="form-control" id="chcm_f" name="chcm_f"
                            value="<?php echo htmlspecialchars($hematoRef->getChcmF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chcm_unidade" class="form-label">Unidade HCM:</label>
                        <input type="text" class="form-control" id="chcm_unidade" name="chcm_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getChcmUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cchcw_m" class="form-label">CHCM (Masculino):</label>
                        <input type="text" class="form-control" id="cchcw_m" name="cchcw_m"
                            value="<?php echo htmlspecialchars($hematoRef->getCchcwM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cchcw_f" class="form-label">CHCM (Feminino):</label>
                        <input type="text" class="form-control" id="cchcw_f" name="cchcw_f"
                            value="<?php echo htmlspecialchars($hematoRef->getCchcwF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cchcw_unidade" class="form-label">Unidade CHCM:</label>
                        <input type="text" class="form-control" id="cchcw_unidade" name="cchcw_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCchcwUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="crdw_m" class="form-label">RDW (Masculino):</label>
                        <input type="text" class="form-control" id="crdw_m" name="crdw_m"
                            value="<?php echo htmlspecialchars($hematoRef->getCrdwM() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="crdw_f" class="form-label">RDW (Feminino):</label>
                        <input type="text" class="form-control" id="crdw_f" name="crdw_f"
                            value="<?php echo htmlspecialchars($hematoRef->getCrdwF() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="crdw_unidade" class="form-label">Unidade RDW:</label>
                        <input type="text" class="form-control" id="crdw_unidade" name="crdw_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCrdwUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cleucocitos_relativo" class="form-label">Leucócitos (Relativo):</label>
                        <input type="text" class="form-control" id="cleucocitos_relativo" name="cleucocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCleucocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cleucocitos_absoluto" class="form-label">Leucócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cleucocitos_absoluto" name="cleucocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCleucocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cleucocitos_absoluto_unidade" class="form-label">Unidade Leucócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cleucocitos_absoluto_unidade"
                            name="cleucocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCleucocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cneutrofilos_relativo" class="form-label">Neutrófilos (Relativo):</label>
                        <input type="text" class="form-control" id="cneutrofilos_relativo" name="cneutrofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCneutrofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cneutrofilos_absoluto" class="form-label">Neutrófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="cneutrofilos_absoluto" name="cneutrofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCneutrofilosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cneutrofilos_absoluto_unidade" class="form-label">Unidade Neutrófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="cneutrofilos_absoluto_unidade"
                            name="cneutrofilos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCneutrofilosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cblastos_relativo" class="form-label">Blastos (Relativo):</label>
                        <input type="text" class="form-control" id="cblastos_relativo" name="cblastos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCblastosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cblastos_absoluto" class="form-label">Blastos (Absoluto):</label>
                        <input type="text" class="form-control" id="cblastos_absoluto" name="cblastos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCblastosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cblastos_absoluto_unidade" class="form-label">Unidade Blastos (Absoluto):</label>
                        <input type="text" class="form-control" id="cblastos_absoluto_unidade"
                            name="cblastos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCblastosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cpromielocitos_relativo" class="form-label">Promielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="cpromielocitos_relativo"
                            name="cpromielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCpromielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cpromielocitos_absoluto" class="form-label">Promielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cpromielocitos_absoluto"
                            name="cpromielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCpromielocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cpromielocitos_absoluto_unidade" class="form-label">Unidade Promielócitos
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="cpromielocitos_absoluto_unidade"
                            name="cpromielocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCpromielocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmielocitos_relativo" class="form-label">Mielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="cmielocitos_relativo" name="cmielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCmielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmielocitos_absoluto" class="form-label">Mielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmielocitos_absoluto" name="cmielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCmielocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmielocitos_absoluto_unidade" class="form-label">Unidade Mielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmielocitos_absoluto_unidade"
                            name="cmielocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCmielocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmetamielocitos_relativo" class="form-label">Metamielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="cmetamielocitos_relativo"
                            name="cmetamielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCmetamielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmetamielocitos_absoluto" class="form-label">Metamielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmetamielocitos_absoluto"
                            name="cmetamielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCmetamielocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmetamielocitos_absoluto_unidade" class="form-label">Unidade Metamielócitos
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="cmetamielocitos_absoluto_unidade"
                            name="cmetamielocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCmetamielocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cbastonetes_relativo" class="form-label">Bastonetes (Relativo):</label>
                        <input type="text" class="form-control" id="cbastonetes_relativo" name="cbastonetes_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCbastonetesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cbastonetes_absoluto" class="form-label">Bastonetes (Absoluto):</label>
                        <input type="text" class="form-control" id="cbastonetes_absoluto" name="cbastonetes_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCbastonetesAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cbastonetes_absoluto_unidade" class="form-label">Unidade Bastonetes (Absoluto):</label>
                        <input type="text" class="form-control" id="cbastonetes_absoluto_unidade"
                            name="cbastonetes_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCbastonetesAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="csegmentados_relativo" class="form-label">Segmentados (Relativo):</label>
                        <input type="text" class="form-control" id="csegmentados_relativo" name="csegmentados_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCsegmentadosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="csegmentados_absoluto" class="form-label">Segmentados (Absoluto):</label>
                        <input type="text" class="form-control" id="csegmentados_absoluto" name="csegmentados_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCsegmentadosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="csegmentados_absoluto_unidade" class="form-label">Unidade Segmentados (Absoluto):</label>
                        <input type="text" class="form-control" id="csegmentados_absoluto_unidade"
                            name="csegmentados_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCsegmentadosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ceosinofilos_relativo" class="form-label">Eosinófilos (Relativo):</label>
                        <input type="text" class="form-control" id="ceosinofilos_relativo" name="ceosinofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCeosinofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ceosinofilos_absoluto" class="form-label">Eosinófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="ceosinofilos_absoluto" name="ceosinofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCeosinofilosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ceosinofilos_absoluto_unidade" class="form-label">Unidade Eosinófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="ceosinofilos_absoluto_unidade"
                            name="ceosinofilos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCeosinofilosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cbasofilos_relativo" class="form-label">Basófilos (Relativo):</label>
                        <input type="text" class="form-control" id="cbasofilos_relativo" name="cbasofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCbasofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cbasofilos_absoluto" class="form-label">Basófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="cbasofilos_absoluto" name="cbasofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCbasofilosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cbasofilos_absoluto_unidade" class="form-label">Unidade Basófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="cbasofilos_absoluto_unidade"
                            name="cbasofilos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCbasofilosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="clinfocitos_relativo" class="form-label">Linfócitos (Relativo):</label>
                        <input type="text" class="form-control" id="clinfocitos_relativo" name="clinfocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="clinfocitos_absoluto" class="form-label">Linfócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="clinfocitos_absoluto" name="clinfocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="clinfocitos_absoluto_unidade" class="form-label">Unidade Linfócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="clinfocitos_absoluto_unidade"
                            name="clinfocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="clinfocitos_atipicos_relativo" class="form-label">Linfócitos Atípicos (Relativo):</label>
                        <input type="text" class="form-control" id="clinfocitos_atipicos_relativo"
                            name="clinfocitos_atipicos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosAtipicosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="clinfocitos_atipicos_absoluto" class="form-label">Linfócitos Atípicos (Absoluto):</label>
                        <input type="text" class="form-control" id="clinfocitos_atipicos_absoluto"
                            name="clinfocitos_atipicos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosAtipicosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="clinfocitos_atipicos_absoluto_unidade" class="form-label">Unidade Linfócitos Atípicos
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="clinfocitos_atipicos_absoluto_unidade"
                            name="clinfocitos_atipicos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getClinfocitosAtipicosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmonocitos_relativo" class="form-label">Monócitos (Relativo):</label>
                        <input type="text" class="form-control" id="cmonocitos_relativo" name="cmonocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCmonocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmonocitos_absoluto" class="form-label">Monócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmonocitos_absoluto" name="cmonocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCmonocitosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmonocitos_absoluto_unidade" class="form-label">Unidade Monócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmonocitos_absoluto_unidade"
                            name="cmonocitos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCmonocitosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmieloblastos_relativo" class="form-label">Mieloblastos (Relativo):</label>
                        <input type="text" class="form-control" id="cmieloblastos_relativo"
                            name="cmieloblastos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCmieloblastosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmieloblastos_absoluto" class="form-label">Mieloblastos (Absoluto):</label>
                        <input type="text" class="form-control" id="cmieloblastos_absoluto"
                            name="cmieloblastos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCmieloblastosAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmieloblastos_absoluto_unidade" class="form-label">Unidade Mieloblastos
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="cmieloblastos_absoluto_unidade"
                            name="cmieloblastos_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCmieloblastosAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="coutras_celulas_relativo" class="form-label">Outras Células (Relativo):</label>
                        <input type="text" class="form-control" id="coutras_celulas_relativo"
                            name="coutras_celulas_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCoutrasCelulasRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="coutras_celulas_absoluto" class="form-label">Outras Células (Absoluto):</label>
                        <input type="text" class="form-control" id="coutras_celulas_absoluto"
                            name="coutras_celulas_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCoutrasCelulasAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="coutras_celulas_absoluto_unidade" class="form-label">Unidade Outras Células
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="coutras_celulas_absoluto_unidade"
                            name="coutras_celulas_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCoutrasCelulasAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ccelulas_linfoides_relativo" class="form-label">Células Linfoides (Relativo):</label>
                        <input type="text" class="form-control" id="ccelulas_linfoides_relativo"
                            name="ccelulas_linfoides_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasLinfoidesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccelulas_linfoides_absoluto" class="form-label">Células Linfoides (Absoluto):</label>
                        <input type="text" class="form-control" id="ccelulas_linfoides_absoluto"
                            name="ccelulas_linfoides_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasLinfoidesAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccelulas_linfoides_absoluto_unidade" class="form-label">Unidade Células Linfoides
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="ccelulas_linfoides_absoluto_unidade"
                            name="ccelulas_linfoides_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasLinfoidesAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ccelulas_monocitoides_relativo" class="form-label">Células Monocitoides
                            (Relativo):</label>
                        <input type="text" class="form-control" id="ccelulas_monocitoides_relativo"
                            name="ccelulas_monocitoides_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasMonocitoidesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccelulas_monocitoides_absoluto" class="form-label">Células Monocitoides
                            (Absoluto):</label>
                        <input type="text" class="form-control" id="ccelulas_monocitoides_absoluto"
                            name="ccelulas_monocitoides_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasMonocitoidesAbsoluto() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccelulas_monocitoides_absoluto_unidade" class="form-label">Unidade Células
                            Monocitoides (Absoluto):</label>
                        <input type="text" class="form-control" id="ccelulas_monocitoides_absoluto_unidade"
                            name="ccelulas_monocitoides_absoluto_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCcelulasMonocitoidesAbsolutoUnidade() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cplaquetas" class="form-label">Plaquetas:</label>
                        <input type="text" class="form-control" id="cplaquetas" name="cplaquetas"
                            value="<?php echo htmlspecialchars($hematoRef->getCplaquetas() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cplaquetas_unidade" class="form-label">Unidade Plaquetas:</label>
                        <input type="text" class="form-control" id="cplaquetas_unidade" name="cplaquetas_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCplaquetasUnidade() ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cvolume_plaquetario_medio" class="form-label">Volume Plaquetário Médio:</label>
                        <input type="text" class="form-control" id="cvolume_plaquetario_medio"
                            name="cvolume_plaquetario_medio"
                            value="<?php echo htmlspecialchars($hematoRef->getCvolumePlaquetarioMedio() ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cvolume_plaquetario_medio_unidade" class="form-label">Unidade Volume Plaquetário
                            Médio:</label>
                        <input type="text" class="form-control" id="cvolume_plaquetario_medio_unidade"
                            name="cvolume_plaquetario_medio_unidade"
                            value="<?php echo htmlspecialchars($hematoRef->getCvolumePlaquetarioMedioUnidade() ?? ''); ?>">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/exames" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'success'): ?>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Alteração Concluída!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <p class="mt-3">Os valores de referência foram alterados com sucesso.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php endif; ?>

   <script>
     <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'success'): ?>
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    <?php endif; ?>
   </script>

</body>

</html>
