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
            <form action="/bioquimicaRef" method="POST">
                <input type="hidden" name="method" value="PUT">
                <input type="hidden" name="id" value="<?=htmlspecialchars($bioquimicaRef->getId() ?? 1);?>">

                <!-- Bilirrubina -->
                <h5 class="mt-4 mb-3 text-primary">Bilirrubina</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cbilirrubina_total" class="form-label">Bilirrubina Total:</label>
                        <input type="text" class="form-control" id="cbilirrubina_total" name="cbilirrubina_total"
                            value="<?=htmlspecialchars($bioquimicaRef->getBilirrubinaTotal() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cbilirrubina_direta" class="form-label">Bilirrubina Direta:</label>
                        <input type="text" class="form-control" id="cbilirrubina_direta" name="cbilirrubina_direta"
                            value="<?=htmlspecialchars($bioquimicaRef->getBilirrubinadireta() ?? '');?>">
                    </div>
                </div>

                <!-- Proteínas -->
                <h5 class="mt-4 mb-3 text-primary">Proteínas</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cproteina_total" class="form-label">Proteína Total:</label>
                        <input type="text" class="form-control" id="cproteina_total" name="cproteina_total"
                            value="<?=htmlspecialchars($bioquimicaRef->getProteinaTotal() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="calbumina" class="form-label">Albumina:</label>
                        <input type="text" class="form-control" id="calbumina" name="calbumina"
                            value="<?=htmlspecialchars($bioquimicaRef->getAlbumina() ?? '');?>">
                    </div>
                </div>

                <!-- Enzimas -->
                <h5 class="mt-4 mb-3 text-primary">Enzimas</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="camilase" class="form-label">Amilase:</label>
                        <input type="text" class="form-control" id="camilase" name="camilase"
                            value="<?=htmlspecialchars($bioquimicaRef->getAmilase() ?? '');?>">
                    </div>
                </div>

                <!-- TGO -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ctgo_m" class="form-label">TGO (Masculino):</label>
                        <input type="text" class="form-control" id="ctgo_m" name="ctgo_transaminase_glutamico_oxalacetica_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getTgoTransaminaseGlutamicoOxalaceticaM() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ctgo_f" class="form-label">TGO (Feminino):</label>
                        <input type="text" class="form-control" id="ctgo_f" name="ctgo_transaminase_glutamico_oxalacetica_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getTgoTransaminaseGlutamicoOxalaceticaF() ?? '');?>">
                    </div>
                </div>

                <!-- TGP -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ctgp_m" class="form-label">TGP (Masculino):</label>
                        <input type="text" class="form-control" id="ctgp_m" name="ctgp_transaminase_glutamico_piruvica_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getTgpTransaminaseGlutamicoPiruvicaM() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ctgp_f" class="form-label">TGP (Feminino):</label>
                        <input type="text" class="form-control" id="ctgp_f" name="ctgp_transaminase_glutamico_piruvica_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getTgpTransaminaseGlutamicoPiruvicaF() ?? '');?>">
                    </div>
                </div>

                <!-- Gama GT -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cgama_gt_m" class="form-label">Gama GT (Masculino):</label>
                        <input type="text" class="form-control" id="cgama_gt_m" name="cgama_gt_glutamiltransferase_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getGamaGtGlutamiltransferaseM() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cgama_gt_f" class="form-label">Gama GT (Feminino):</label>
                        <input type="text" class="form-control" id="cgama_gt_f" name="cgama_gt_glutamiltransferase_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getGamaGtGlutamiltransferaseF() ?? '');?>">
                    </div>
                </div>

                <!-- Fosfatase Alcalina -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cfosfatase_alcalina_m" class="form-label">Fosfatase Alcalina (Masculino):</label>
                        <input type="text" class="form-control" id="cfosfatase_alcalina_m" name="cfosfatase_alcalina_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosfataseAlcalinaM() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cfosfatase_alcalina_f" class="form-label">Fosfatase Alcalina (Feminino):</label>
                        <input type="text" class="form-control" id="cfosfatase_alcalina_f" name="cfosfatase_alcalina_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosfataseAlcalinaF() ?? '');?>">
                    </div>
                </div>

                <!-- Creatina Quinase (CK) -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ccreatina_quinase_ck_m" class="form-label">CK (Masculino):</label>
                        <input type="text" class="form-control" id="ccreatina_quinase_ck_m" name="ccreatina_quinase_ck_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getCreatinaQuinaseCkM() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="ccreatina_quinase_ck_f" class="form-label">CK (Feminino):</label>
                        <input type="text" class="form-control" id="ccreatina_quinase_ck_f" name="ccreatina_quinase_ck_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getCreatinaQuinaseCkF() ?? '');?>">
                    </div>
                </div>

                <!-- Glicose -->
                <h5 class="mt-4 mb-3 text-primary">Glicemia</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="cglicose" class="form-label">Glicose:</label>
                        <input type="text" class="form-control" id="cglicose" name="cglicose"
                            value="<?=htmlspecialchars($bioquimicaRef->getGlicose() ?? '');?>">
                    </div>
                </div>

                <!-- Ferro -->
                <h5 class="mt-4 mb-3 text-primary">Ferro</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cferro_m_ate_40" class="form-label">Ferro Masculino (até 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_ate_40" name="cferro_m_ate_40_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroMAte40Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cferro_m_mais_40" class="form-label">Ferro Masculino (40-60 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_mais_40" name="cferro_m_mais_de_40_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroMMaisDe40Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cferro_m_mais_60" class="form-label">Ferro Masculino (>60 anos):</label>
                        <input type="text" class="form-control" id="cferro_m_mais_60" name="cferro_m_mais_de_60_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroMMaisDe60Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cferro_f_ate_40" class="form-label">Ferro Feminino (até 40 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_ate_40" name="cferro_f_ate_40_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroFAte40Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cferro_f_mais_40" class="form-label">Ferro Feminino (40-60 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_mais_40" name="cferro_f_mais_de_40_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroFMaisDe40Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cferro_f_mais_60" class="form-label">Ferro Feminino (>60 anos):</label>
                        <input type="text" class="form-control" id="cferro_f_mais_60" name="cferro_f_mais_de_60_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroFMaisDe60Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="cferro_crianca" class="form-label">Ferro Criança:</label>
                        <input type="text" class="form-control" id="cferro_crianca" name="cferro_crianca"
                            value="<?=htmlspecialchars($bioquimicaRef->getFerroCrianca() ?? '');?>">
                    </div>
                </div>

                <!-- Lipidograma -->
                <h5 class="mt-4 mb-3 text-primary">Lipidograma</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="ccolesterol_total" class="form-label">Colesterol Total:</label>
                        <input type="text" class="form-control" id="ccolesterol_total" name="ccolesterol_total"
                            value="<?=htmlspecialchars($bioquimicaRef->getColesterolTotal() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="chdl_ate_19" class="form-label">HDL (até 19 anos):</label>
                        <input type="text" class="form-control" id="chdl_ate_19" name="chdl_ate_19_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getHdlAte19Anos() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="chdl_mais_20" class="form-label">HDL (>20 anos):</label>
                        <input type="text" class="form-control" id="chdl_mais_20" name="chdl_mais_de_20_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getHdlMaisDe20Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="cldl_baixo" class="form-label">LDL (Baixo Risco):</label>
                        <input type="text" class="form-control" id="cldl_baixo" name="cldl_baixo_risco"
                            value="<?=htmlspecialchars($bioquimicaRef->getLdlBaixoRisco() ?? '');?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_inter" class="form-label">LDL (Risco Intermediário):</label>
                        <input type="text" class="form-control" id="cldl_inter" name="cldl_risco_intermediario"
                            value="<?=htmlspecialchars($bioquimicaRef->getLdlRiscoIntermediario() ?? '');?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_alto" class="form-label">LDL (Alto Risco):</label>
                        <input type="text" class="form-control" id="cldl_alto" name="cldl_alto_risco"
                            value="<?=htmlspecialchars($bioquimicaRef->getLdlAltoRisco() ?? '');?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cldl_muito_alto" class="form-label">LDL (Muito Alto Risco):</label>
                        <input type="text" class="form-control" id="cldl_muito_alto" name="cldl_muito_alto_risco"
                            value="<?=htmlspecialchars($bioquimicaRef->getLdlMuitoAltoRisco() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="ctriglicerideos" class="form-label">Triglicerídeos:</label>
                        <input type="text" class="form-control" id="ctriglicerideos" name="ctriglicerideos"
                            value="<?=htmlspecialchars($bioquimicaRef->getTriglicerideos() ?? '');?>">
                    </div>
                </div>

                <!-- Função Renal -->
                <h5 class="mt-4 mb-3 text-primary">Função Renal</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cureia_m_menos_50" class="form-label">Ureia Masculino (<50 anos):</label>
                        <input type="text" class="form-control" id="cureia_m_menos_50" name="cureia_m_menos_de_50_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getUreiaMMenosDe50Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cureia_m_mais_50" class="form-label">Ureia Masculino (≥50 anos):</label>
                        <input type="text" class="form-control" id="cureia_m_mais_50" name="cureia_m_mais_de_50_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getUreiaMMaisDe50Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cureia_f_menos_50" class="form-label">Ureia Feminino (<50 anos):</label>
                        <input type="text" class="form-control" id="cureia_f_menos_50" name="cureia_f_menos_de_50_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getUreiaFMenosDe50Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cureia_f_mais_50" class="form-label">Ureia Feminino (≥50 anos):</label>
                        <input type="text" class="form-control" id="cureia_f_mais_50" name="cureia_f_mais_de_50_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getUreiaFMaisDe50Anos() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cureia_crianca" class="form-label">Ureia Criança:</label>
                        <input type="text" class="form-control" id="cureia_crianca" name="cureia_crianca"
                            value="<?=htmlspecialchars($bioquimicaRef->getUreiaCrianca() ?? '');?>">
                    </div>
                </div>

                <!-- Creatinina -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="ccreatinina_m" class="form-label">Creatinina Masculino:</label>
                        <input type="text" class="form-control" id="ccreatinina_m" name="ccreatinina_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getCreatininaM() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatinina_f" class="form-label">Creatinina Feminino:</label>
                        <input type="text" class="form-control" id="ccreatinina_f" name="ccreatinina_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getCreatininaF() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ccreatinina_crianca" class="form-label">Creatinina Criança:</label>
                        <input type="text" class="form-control" id="ccreatinina_crianca" name="ccreatinina_crianca"
                            value="<?=htmlspecialchars($bioquimicaRef->getCreatininaCrianca() ?? '');?>">
                    </div>
                </div>

                <!-- Ácido Úrico -->
                <h5 class="mt-4 mb-3 text-primary">Ácido Úrico</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cacido_urico_m_13_18" class="form-label">Ácido Úrico Masculino (13-18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_m_13_18" name="cacido_urico_m_13_a_18_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getAcidoUricoM13a18Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cacido_urico_m_mais_18" class="form-label">Ácido Úrico Masculino (>18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_m_mais_18" name="cacido_urico_m_mais_de_18_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getAcidoUricoMMaisDe18Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cacido_urico_f_1_9" class="form-label">Ácido Úrico Feminino (1-9 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_f_1_9" name="cacido_urico_f_1_a_9_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getAcidoUricoF1a9Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cacido_urico_f_10_18" class="form-label">Ácido Úrico Feminino (10-18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_f_10_18" name="cacido_urico_f_10_a_18_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getAcidoUricoF10a18Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cacido_urico_f_mais_18" class="form-label">Ácido Úrico Feminino (>18 anos):</label>
                        <input type="text" class="form-control" id="cacido_urico_f_mais_18" name="cacido_urico_f_mais_de_18_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getAcidoUricoFMaisDe18Anos() ?? '');?>">
                    </div>
                </div>

                <!-- PCR -->
                <h5 class="mt-4 mb-3 text-primary">Proteína C Reativa</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="cpcr" class="form-label">PCR:</label>
                        <input type="text" class="form-control" id="cpcr" name="cpcr_proteina_c_reativa"
                            value="<?=htmlspecialchars($bioquimicaRef->getPcrProteinaCReativa() ?? '');?>">
                    </div>
                </div>

                <!-- Eletrólitos -->
                <h5 class="mt-4 mb-3 text-primary">Eletrólitos</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="ccalcio" class="form-label">Cálcio:</label>
                        <input type="text" class="form-control" id="ccalcio" name="ccalcio"
                            value="<?=htmlspecialchars($bioquimicaRef->getCalcio() ?? '');?>">
                    </div>
                </div>

                <!-- LDH -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="cldh" class="form-label">LDH:</label>
                        <input type="text" class="form-control" id="cldh" name="cldh"
                            value="<?=htmlspecialchars($bioquimicaRef->getLdh() ?? '');?>">
                    </div>
                </div>

                <!-- Magnésio -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cmagnesio_m" class="form-label">Magnésio Masculino:</label>
                        <input type="text" class="form-control" id="cmagnesio_m" name="cmagnesio_m"
                            value="<?=htmlspecialchars($bioquimicaRef->getMagnesioM() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmagnesio_f" class="form-label">Magnésio Feminino:</label>
                        <input type="text" class="form-control" id="cmagnesio_f" name="cmagnesio_f"
                            value="<?=htmlspecialchars($bioquimicaRef->getMagnesioF() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cmagnesio_crianca" class="form-label">Magnésio Criança:</label>
                        <input type="text" class="form-control" id="cmagnesio_crianca" name="cmagnesio_crianca"
                            value="<?=htmlspecialchars($bioquimicaRef->getMagnesioCrianca() ?? '');?>">
                    </div>
                </div>

                <!-- Fósforo -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="cfosforo_adulto" class="form-label">Fósforo Adulto:</label>
                        <input type="text" class="form-control" id="cfosforo_adulto" name="cfosforo_adulto"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosforoAdulto() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cfosforo_1_3" class="form-label">Fósforo (1-3 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_1_3" name="cfosforo_1_a_3_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosforo1a3Anos() ?? '');?>">
                    </div>
                    <div class="col-md-4">
                        <label for="cfosforo_4_12" class="form-label">Fósforo (4-12 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_4_12" name="cfosforo_4_a_12_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosforo4a12Anos() ?? '');?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cfosforo_13_15" class="form-label">Fósforo (13-15 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_13_15" name="cfosforo_13_a_15_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosforo13a15Anos() ?? '');?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cfosforo_16_18" class="form-label">Fósforo (16-18 anos):</label>
                        <input type="text" class="form-control" id="cfosforo_16_18" name="cfosforo_16_a_18_anos"
                            value="<?=htmlspecialchars($bioquimicaRef->getFosforo16a18Anos() ?? '');?>">
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