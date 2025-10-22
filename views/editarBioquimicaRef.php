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
    <title>Editar Referência Bioquímica</title>
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
            <h1 class="card-title text-center mb-4">Editar Valores de Referência - Bioquímica</h1>
            <form action="/referenciaBioquimica/atualizar" method="POST">
                <input type="hidden" name="method" value="PUT">
                <input type="hidden" name="id" value="1"> <!-- Assumindo que sempre haverá apenas um registro de referência com ID 1 -->

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cbilirrubina_total" class="form-label">Bilirrubina Total:</label>
                        <input type="text" class="form-control" id="cbilirrubina_total" name="cbilirrubina_total" value="<?php echo htmlspecialchars($referencia->cbilirrubina_total ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cbilirrubina_total_unidade" class="form-label">Unidade Bilirrubina Total:</label>
                        <input type="text" class="form-control" id="cbilirrubina_total_unidade" name="cbilirrubina_total_unidade" value="<?php echo htmlspecialchars($referencia->cbilirrubina_total_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cbilirrubina_direta" class="form-label">Bilirrubina Direta:</label>
                        <input type="text" class="form-control" id="cbilirrubina_direta" name="cbilirrubina_direta" value="<?php echo htmlspecialchars($referencia->cbilirrubina_direta ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cbilirrubina_direta_unidade" class="form-label">Unidade Bilirrubina Direta:</label>
                        <input type="text" class="form-control" id="cbilirrubina_direta_unidade" name="cbilirrubina_direta_unidade" value="<?php echo htmlspecialchars($referencia->cbilirrubina_direta_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cproteina_total" class="form-label">Proteína Total:</label>
                        <input type="text" class="form-control" id="cproteina_total" name="cproteina_total" value="<?php echo htmlspecialchars($referencia->cproteina_total ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cproteina_total_unidade" class="form-label">Unidade Proteína Total:</label>
                        <input type="text" class="form-control" id="cproteina_total_unidade" name="cproteina_total_unidade" value="<?php echo htmlspecialchars($referencia->cproteina_total_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="calbumina" class="form-label">Albumina:</label>
                        <input type="text" class="form-control" id="calbumina" name="calbumina" value="<?php echo htmlspecialchars($referencia->calbumina ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="calbumina_unidade" class="form-label">Unidade Albumina:</label>
                        <input type="text" class="form-control" id="calbumina_unidade" name="calbumina_unidade" value="<?php echo htmlspecialchars($referencia->calbumina_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="camilase" class="form-label">Amilase:</label>
                        <input type="text" class="form-control" id="camilase" name="camilase" value="<?php echo htmlspecialchars($referencia->camilase ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="camilase_unidade" class="form-label">Unidade Amilase:</label>
                        <input type="text" class="form-control" id="camilase_unidade" name="camilase_unidade" value="<?php echo htmlspecialchars($referencia->camilase_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ctgo_transaminase_glutamico_oxalacetica_m" class="form-label">TGO (Masculino):</label>
                        <input type="text" class="form-control" id="ctgo_transaminase_glutamico_oxalacetica_m" name="ctgo_transaminase_glutamico_oxalacetica_m" value="<?php echo htmlspecialchars($referencia->ctgo_transaminase_glutamico_oxalacetica_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ctgo_transaminase_glutamico_oxalacetica_f" class="form-label">TGO (Feminino):</label>
                        <input type="text" class="form-control" id="ctgo_transaminase_glutamico_oxalacetica_f" name="ctgo_transaminase_glutamico_oxalacetica_f" value="<?php echo htmlspecialchars($referencia->ctgo_transaminase_glutamico_oxalacetica_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ctgo_transaminase_glutamico_oxalacetica_unidade" class="form-label">Unidade TGO:</label>
                        <input type="text" class="form-control" id="ctgo_transaminase_glutamico_oxalacetica_unidade" name="ctgo_transaminase_glutamico_oxalacetica_unidade" value="<?php echo htmlspecialchars($referencia->ctgo_transaminase_glutamico_oxalacetica_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ctgp_transaminase_glutamico_piruvica_m" class="form-label">TGP (Masculino):</label>
                        <input type="text" class="form-control" id="ctgp_transaminase_glutamico_piruvica_m" name="ctgp_transaminase_glutamico_piruvica_m" value="<?php echo htmlspecialchars($referencia->ctgp_transaminase_glutamico_piruvica_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ctgp_transaminase_glutamico_piruvica_f" class="form-label">TGP (Feminino):</label>
                        <input type="text" class="form-control" id="ctgp_transaminase_glutamico_piruvica_f" name="ctgp_transaminase_glutamico_piruvica_f" value="<?php echo htmlspecialchars($referencia->ctgp_transaminase_glutamico_piruvica_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ctgp_transaminase_glutamico_piruvica_unidade" class="form-label">Unidade TGP:</label>
                        <input type="text" class="form-control" id="ctgp_transaminase_glutamico_piruvica_unidade" name="ctgp_transaminase_glutamico_piruvica_unidade" value="<?php echo htmlspecialchars($referencia->ctgp_transaminase_glutamico_piruvica_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cgama_gt_glutamiltransferase_m" class="form-label">Gama GT (Masculino):</label>
                        <input type="text" class="form-control" id="cgama_gt_glutamiltransferase_m" name="cgama_gt_glutamiltransferase_m" value="<?php echo htmlspecialchars($referencia->cgama_gt_glutamiltransferase_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cgama_gt_glutamiltransferase_f" class="form-label">Gama GT (Feminino):</label>
                        <input type="text" class="form-control" id="cgama_gt_glutamiltransferase_f" name="cgama_gt_glutamiltransferase_f" value="<?php echo htmlspecialchars($referencia->cgama_gt_glutamiltransferase_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cgama_gt_glutamiltransferase_unidade" class="form-label">Unidade Gama GT:</label>
                        <input type="text" class="form-control" id="cgama_gt_glutamiltransferase_unidade" name="cgama_gt_glutamiltransferase_unidade" value="<?php echo htmlspecialchars($referencia->cgama_gt_glutamiltransferase_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cfosfatase_alcalina_m" class="form-label">Fosfatase Alcalina (Masculino):</label>
                        <input type="text" class="form-control" id="cfosfatase_alcalina_m" name="cfosfatase_alcalina_m" value="<?php echo htmlspecialchars($referencia->cfosfatase_alcalina_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cfosfatase_alcalina_f" class="form-label">Fosfatase Alcalina (Feminino):</label>
                        <input type="text" class="form-control" id="cfosfatase_alcalina_f" name="cfosfatase_alcalina_f" value="<?php echo htmlspecialchars($referencia->cfosfatase_alcalina_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cfosfatase_alcalina_unidade" class="form-label">Unidade Fosfatase Alcalina:</label>
                        <input type="text" class="form-control" id="cfosfatase_alcalina_unidade" name="cfosfatase_alcalina_unidade" value="<?php echo htmlspecialchars($referencia->cfosfatase_alcalina_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ccreatina_quinase_ck_m" class="form-label">Creatina Quinase CK (Masculino):</label>
                        <input type="text" class="form-control" id="ccreatina_quinase_ck_m" name="ccreatina_quinase_ck_m" value="<?php echo htmlspecialchars($referencia->ccreatina_quinase_ck_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatina_quinase_ck_f" class="form-label">Creatina Quinase CK (Feminino):</label>
                        <input type="text" class="form-control" id="ccreatina_quinase_ck_f" name="ccreatina_quinase_ck_f" value="<?php echo htmlspecialchars($referencia->ccreatina_quinase_ck_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatina_quinase_ck_unidade" class="form-label">Unidade Creatina Quinase CK:</label>
                        <input type="text" class="form-control" id="ccreatina_quinase_ck_unidade" name="ccreatina_quinase_ck_unidade" value="<?php echo htmlspecialchars($referencia->ccreatina_quinase_ck_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cglicose" class="form-label">Glicose:</label>
                        <input type="text" class="form-control" id="cglicose" name="cglicose" value="<?php echo htmlspecialchars($referencia->cglicose ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cglicose_unidade" class="form-label">Unidade Glicose:</label>
                        <input type="text" class="form-control" id="cglicose_unidade" name="cglicose_unidade" value="<?php echo htmlspecialchars($referencia->cglicose_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cferro_m_ate_40_anos" class="form-label">Ferro (M até 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_ate_40_anos" name="cferro_m_ate_40_anos" value="<?php echo htmlspecialchars($referencia->cferro_m_ate_40_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_m_mais_de_40_anos" class="form-label">Ferro (M > 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_mais_de_40_anos" name="cferro_m_mais_de_40_anos" value="<?php echo htmlspecialchars($referencia->cferro_m_mais_de_40_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_m_mais_de_60_anos" class="form-label">Ferro (M > 60 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_mais_de_60_anos" name="cferro_m_mais_de_60_anos" value="<?php echo htmlspecialchars($referencia->cferro_m_mais_de_60_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_unidade" class="form-label">Unidade Ferro:</label>
                        <input type="text" class="form-control" id="cferro_unidade" name="cferro_unidade" value="<?php echo htmlspecialchars($referencia->cferro_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cferro_f_ate_40_anos" class="form-label">Ferro (F até 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_ate_40_anos" name="cferro_f_ate_40_anos" value="<?php echo htmlspecialchars($referencia->cferro_f_ate_40_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_f_mais_de_40_anos" class="form-label">Ferro (F > 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_mais_de_40_anos" name="cferro_f_mais_de_40_anos" value="<?php echo htmlspecialchars($referencia->cferro_f_mais_de_40_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_f_mais_de_60_anos" class="form-label">Ferro (F > 60 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_mais_de_60_anos" name="cferro_f_mais_de_60_anos" value="<?php echo htmlspecialchars($referencia->cferro_f_mais_de_60_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cferro_crianca" class="form-label">Ferro (Criança):</label>
                        <input type="text" class="form-control" id="cferro_crianca" name="cferro_crianca" value="<?php echo htmlspecialchars($referencia->cferro_crianca ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ccolesterol_total" class="form-label">Colesterol Total:</label>
                        <input type="text" class="form-control" id="ccolesterol_total" name="ccolesterol_total" value="<?php echo htmlspecialchars($referencia->ccolesterol_total ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ccolesterol_total_unidade" class="form-label">Unidade Colesterol Total:</label>
                        <input type="text" class="form-control" id="ccolesterol_total_unidade" name="ccolesterol_total_unidade" value="<?php echo htmlspecialchars($referencia->ccolesterol_total_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="chdl_ate_19_anos" class="form-label">HDL (até 19 anos):</label>
                        <input type="text" class="form-control" id="chdl_ate_19_anos" name="chdl_ate_19_anos" value="<?php echo htmlspecialchars($referencia->chdl_ate_19_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chdl_mais_de_20_anos" class="form-label">HDL (mais de 20 anos):</label>
                        <input type="text" class="form-control" id="chdl_mais_de_20_anos" name="chdl_mais_de_20_anos" value="<?php echo htmlspecialchars($referencia->chdl_mais_de_20_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="chdl_unidade" class="form-label">Unidade HDL:</label>
                        <input type="text" class="form-control" id="chdl_unidade" name="chdl_unidade" value="<?php echo htmlspecialchars($referencia->chdl_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cldl_baixo_risco" class="form-label">LDL (Baixo Risco):</label>
                        <input type="text" class="form-control" id="cldl_baixo_risco" name="cldl_baixo_risco" value="<?php echo htmlspecialchars($referencia->cldl_baixo_risco ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_risco_intermediario" class="form-label">LDL (Risco Intermediário):</label>
                        <input type="text" class="form-control" id="cldl_risco_intermediario" name="cldl_risco_intermediario" value="<?php echo htmlspecialchars($referencia->cldl_risco_intermediario ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_alto_risco" class="form-label">LDL (Alto Risco):</label>
                        <input type="text" class="form-control" id="cldl_alto_risco" name="cldl_alto_risco" value="<?php echo htmlspecialchars($referencia->cldl_alto_risco ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_muito_alto_risco" class="form-label">LDL (Muito Alto Risco):</label>
                        <input type="text" class="form-control" id="cldl_muito_alto_risco" name="cldl_muito_alto_risco" value="<?php echo htmlspecialchars($referencia->cldl_muito_alto_risco ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cldl_unidade" class="form-label">Unidade LDL:</label>
                        <input type="text" class="form-control" id="cldl_unidade" name="cldl_unidade" value="<?php echo htmlspecialchars($referencia->cldl_unidade ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ctriglicerideos" class="form-label">Triglicerídeos:</label>
                        <input type="text" class="form-control" id="ctriglicerideos" name="ctriglicerideos" value="<?php echo htmlspecialchars($referencia->ctriglicerideos ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ctriglicerideos_unidade" class="form-label">Unidade Triglicerídeos:</label>
                        <input type="text" class="form-control" id="ctriglicerideos_unidade" name="ctriglicerideos_unidade" value="<?php echo htmlspecialchars($referencia->ctriglicerideos_unidade ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cureia_m_menos_de_50_anos" class="form-label">Ureia (M < 50 anos):</label>
                        <input type="text" class="form-control" id="cureia_m_menos_de_50_anos" name="cureia_m_menos_de_50_anos" value="<?php echo htmlspecialchars($referencia->cureia_m_menos_de_50_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cureia_m_mais_de_50_anos" class="form-label">Ureia (M > 50 anos):</label>
                        <input type="text" class="form-control" id="cureia_m_mais_de_50_anos" name="cureia_m_mais_de_50_anos" value="<?php echo htmlspecialchars($referencia->cureia_m_mais_de_50_anos ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cureia_f_menos_de_50_anos" class="form-label">Ureia (F < 50 anos):</label>
                        <input type="text" class="form-control" id="cureia_f_menos_de_50_anos" name="cureia_f_menos_de_50_anos" value="<?php echo htmlspecialchars($referencia->cureia_f_menos_de_50_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cureia_f_mais_de_50_anos" class="form-label">Ureia (F > 50 anos):</label>
                        <input type="text" class="form-control" id="cureia_f_mais_de_50_anos" name="cureia_f_mais_de_50_anos" value="<?php echo htmlspecialchars($referencia->cureia_f_mais_de_50_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cureia_crianca" class="form-label">Ureia (Criança):</label>
                        <input type="text" class="form-control" id="cureia_crianca" name="cureia_crianca" value="<?php echo htmlspecialchars($referencia->cureia_crianca ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cureia_unidade" class="form-label">Unidade Ureia:</label>
                        <input type="text" class="form-control" id="cureia_unidade" name="cureia_unidade" value="<?php echo htmlspecialchars($referencia->cureia_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ccreatinina_m" class="form-label">Creatinina (Masculino):</label>
                        <input type="text" class="form-control" id="ccreatinina_m" name="ccreatinina_m" value="<?php echo htmlspecialchars($referencia->ccreatinina_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatinina_f" class="form-label">Creatinina (Feminino):</label>
                        <input type="text" class="form-control" id="ccreatinina_f" name="ccreatinina_f" value="<?php echo htmlspecialchars($referencia->ccreatinina_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatinina_crianca" class="form-label">Creatinina (Criança):</label>
                        <input type="text" class="form-control" id="ccreatinina_crianca" name="ccreatinina_crianca" value="<?php echo htmlspecialchars($referencia->ccreatinina_crianca ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ccreatinina_unidade" class="form-label">Unidade Creatinina:</label>
                        <input type="text" class="form-control" id="ccreatinina_unidade" name="ccreatinina_unidade" value="<?php echo htmlspecialchars($referencia->ccreatinina_unidade ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cacido_urico_m_13_a_18_anos" class="form-label">Ácido Úrico (M 13-18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_m_13_a_18_anos" name="cacido_urico_m_13_a_18_anos" value="<?php echo htmlspecialchars($referencia->cacido_urico_m_13_a_18_anos ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cacido_urico_m_mais_de_18_anos" class="form-label">Ácido Úrico (M > 18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_m_mais_de_18_anos" name="cacido_urico_m_mais_de_18_anos" value="<?php echo htmlspecialchars($referencia->cacido_urico_m_mais_de_18_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cacido_urico_f_10_a_18_anos" class="form-label">Ácido Úrico (F 10-18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_f_10_a_18_anos" name="cacido_urico_f_10_a_18_anos" value="<?php echo htmlspecialchars($referencia->cacido_urico_f_10_a_18_anos ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cacido_urico_f_mais_de_18_anos" class="form-label">Ácido Úrico (F > 18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_f_mais_de_18_anos" name="cacido_urico_f_mais_de_18_anos" value="<?php echo htmlspecialchars($referencia->cacido_urico_f_mais_de_18_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cacido_urico_unidade" class="form-label">Unidade Ácido Úrico:</label>
                        <input type="text" class="form-control" id="cacido_urico_unidade" name="cacido_urico_unidade" value="<?php echo htmlspecialchars($referencia->cacido_urico_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpcr_proteina_c_reativa" class="form-label">PCR Proteína C Reativa:</label>
                        <input type="text" class="form-control" id="cpcr_proteina_c_reativa" name="cpcr_proteina_c_reativa" value="<?php echo htmlspecialchars($referencia->cpcr_proteina_c_reativa ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cpcr_proteina_c_reativa_unidade" class="form-label">Unidade PCR Proteína C Reativa:</label>
                        <input type="text" class="form-control" id="cpcr_proteina_c_reativa_unidade" name="cpcr_proteina_c_reativa_unidade" value="<?php echo htmlspecialchars($referencia->cpcr_proteina_c_reativa_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ccalcio" class="form-label">Cálcio:</label>
                        <input type="text" class="form-control" id="ccalcio" name="ccalcio" value="<?php echo htmlspecialchars($referencia->ccalcio ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ccalcio_unidade" class="form-label">Unidade Cálcio:</label>
                        <input type="text" class="form-control" id="ccalcio_unidade" name="ccalcio_unidade" value="<?php echo htmlspecialchars($referencia->ccalcio_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cldh" class="form-label">LDH:</label>
                        <input type="text" class="form-control" id="cldh" name="cldh" value="<?php echo htmlspecialchars($referencia->cldh ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cldh_unidade" class="form-label">Unidade LDH:</label>
                        <input type="text" class="form-control" id="cldh_unidade" name="cldh_unidade" value="<?php echo htmlspecialchars($referencia->cldh_unidade ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmagnesio_m" class="form-label">Magnésio (Masculino):</label>
                        <input type="text" class="form-control" id="cmagnesio_m" name="cmagnesio_m" value="<?php echo htmlspecialchars($referencia->cmagnesio_m ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmagnesio_f" class="form-label">Magnésio (Feminino):</label>
                        <input type="text" class="form-control" id="cmagnesio_f" name="cmagnesio_f" value="<?php echo htmlspecialchars($referencia->cmagnesio_f ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmagnesio_crianca" class="form-label">Magnésio (Criança):</label>
                        <input type="text" class="form-control" id="cmagnesio_crianca" name="cmagnesio_crianca" value="<?php echo htmlspecialchars($referencia->cmagnesio_crianca ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cmagnesio_unidade" class="form-label">Unidade Magnésio:</label>
                        <input type="text" class="form-control" id="cmagnesio_unidade" name="cmagnesio_unidade" value="<?php echo htmlspecialchars($referencia->cmagnesio_unidade ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cfosforo_adulto" class="form-label">Fósforo (Adulto):</label>
                        <input type="text" class="form-control" id="cfosforo_adulto" name="cfosforo_adulto" value="<?php echo htmlspecialchars($referencia->cfosforo_adulto ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cfosforo_1_a_3_anos" class="form-label">Fósforo (1-3 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_1_a_3_anos" name="cfosforo_1_a_3_anos" value="<?php echo htmlspecialchars($referencia->cfosforo_1_a_3_anos ?? ''); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cfosforo_4_a_12_anos" class="form-label">Fósforo (4-12 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_4_a_12_anos" name="cfosforo_4_a_12_anos" value="<?php echo htmlspecialchars($referencia->cfosforo_4_a_12_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cfosforo_13_a_15_anos" class="form-label">Fósforo (13-15 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_13_a_15_anos" name="cfosforo_13_a_15_anos" value="<?php echo htmlspecialchars($referencia->cfosforo_13_a_15_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cfosforo_16_a_18_anos" class="form-label">Fósforo (16-18 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_16_a_18_anos" name="cfosforo_16_a_18_anos" value="<?php echo htmlspecialchars($referencia->cfosforo_16_a_18_anos ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cfosforo_unidade" class="form-label">Unidade Fósforo:</label>
                        <input type="text" class="form-control" id="cfosforo_unidade" name="cfosforo_unidade" value="<?php echo htmlspecialchars($referencia->cfosforo_unidade ?? ''); ?>">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
