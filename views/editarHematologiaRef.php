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
            <form action="/hematoRef" method="POST" id="teste">
                <input type="hidden" name="method" value="PUT">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($hematoRef->getId() ?? 1); ?>">
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hemacia_m" class="form-label">Hemácia (Masculino):</label>
                        <input type="text" class="form-control" id="hemacia_m" name="chemacia_m"
                            value="<?php echo htmlspecialchars($hematoRef->getHemaciaM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="hemacia_f" class="form-label">Hemácia (Feminino):</label>
                        <input type="text" class="form-control" id="hemacia_f" name="chemacia_f"
                            value="<?php echo htmlspecialchars($hematoRef->getHemaciaF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hemoglobina_m" class="form-label">Hemoglobina (Masculino):</label>
                        <input type="text" class="form-control" id="hemoglobina_m" name="chemoglobina_m"
                            value="<?php echo htmlspecialchars($hematoRef->getHemoglobinaM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="hemoglobina_f" class="form-label">Hemoglobina (Feminino):</label>
                        <input type="text" class="form-control" id="hemoglobina_f" name="chemoglobina_f"
                            value="<?php echo htmlspecialchars($hematoRef->getHemoglobinaF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hematocrito_m" class="form-label">Hematócrito (Masculino):</label>
                        <input type="text" class="form-control" id="hematocrito_m" name="chematocrito_m"
                            value="<?php echo htmlspecialchars($hematoRef->getHematocritoM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="hematocrito_f" class="form-label">Hematócrito (Feminino):</label>
                        <input type="text" class="form-control" id="hematocrito_f" name="chematocrito_f"
                            value="<?php echo htmlspecialchars($hematoRef->getHematocritoF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vcm_m" class="form-label">VCM (Masculino):</label>
                        <input type="text" class="form-control" id="vcm_m" name="cvcm_m"
                            value="<?php echo htmlspecialchars($hematoRef->getVcmM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="vcm_f" class="form-label">VCM (Feminino):</label>
                        <input type="text" class="form-control" id="vcm_f" name="cvcm_f"
                            value="<?php echo htmlspecialchars($hematoRef->getVcmF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hcm_m" class="form-label">HCM (Masculino):</label>
                        <input type="text" class="form-control" id="hcm_m" name="chcm_m"
                            value="<?php echo htmlspecialchars($hematoRef->getHcmM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="hcm_f" class="form-label">HCM (Feminino):</label>
                        <input type="text" class="form-control" id="hcm_f" name="chcm_f"
                            value="<?php echo htmlspecialchars($hematoRef->getHcmF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="chcw_m" class="form-label">CHCM (Masculino):</label>
                        <input type="text" class="form-control" id="chcw_m" name="cchcw_m"
                            value="<?php echo htmlspecialchars($hematoRef->getChcmM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="chcw_f" class="form-label">CHCM (Feminino):</label>
                        <input type="text" class="form-control" id="chcw_f" name="cchcw_f"
                            value="<?php echo htmlspecialchars($hematoRef->getChcmF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="rdw_m" class="form-label">RDW (Masculino):</label>
                        <input type="text" class="form-control" id="rdw_m" name="crdw_m"
                            value="<?php echo htmlspecialchars($hematoRef->getRdwM() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="rdw_f" class="form-label">RDW (Feminino):</label>
                        <input type="text" class="form-control" id="rdw_f" name="crdw_f"
                            value="<?php echo htmlspecialchars($hematoRef->getRdwF() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="leucocitos_relativo" class="form-label">Leucócitos (Relativo):</label>
                        <input type="text" class="form-control" id="leucocitos_relativo" name="cleucocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getLeucocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="leucocitos_absoluto" class="form-label">Leucócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="leucocitos_absoluto" name="cleucocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getLeucocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="neutrofilos_relativo" class="form-label">Neutrófilos (Relativo):</label>
                        <input type="text" class="form-control" id="neutrofilos_relativo" name="cneutrofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getNeutrofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="neutrofilos_absoluto" class="form-label">Neutrófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="neutrofilos_absoluto" name="cneutrofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getNeutrofilosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="blastos_relativo" class="form-label">Blastos (Relativo):</label>
                        <input type="text" class="form-control" id="blastos_relativo" name="cblastos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getBlastosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="blastos_absoluto" class="form-label">Blastos (Absoluto):</label>
                        <input type="text" class="form-control" id="blastos_absoluto" name="cblastos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getBlastosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="promielocitos_relativo" class="form-label">Promielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="promielocitos_relativo"
                            name="cpromielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getPromielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="promielocitos_absoluto" class="form-label">Promielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="promielocitos_absoluto"
                            name="cpromielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getPromielocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mielocitos_relativo" class="form-label">Mielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="mielocitos_relativo" name="cmielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getMielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="mielocitos_absoluto" class="form-label">Mielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="mielocitos_absoluto" name="cmielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getMielocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="metamielocitos_relativo" class="form-label">Metamielócitos (Relativo):</label>
                        <input type="text" class="form-control" id="metamielocitos_relativo"
                            name="cmetamielocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getMetamielocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="metamielocitos_absoluto" class="form-label">Metamielócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="metamielocitos_absoluto"
                            name="cmetamielocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getMetamielocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="bastonetes_relativo" class="form-label">Bastonetes (Relativo):</label>
                        <input type="text" class="form-control" id="bastonetes_relativo" name="cbastonetes_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getBastonetesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="bastonetes_absoluto" class="form-label">Bastonetes (Absoluto):</label>
                        <input type="text" class="form-control" id="bastonetes_absoluto" name="cbastonetes_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getBastonetesAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="segmentados_relativo" class="form-label">Segmentados (Relativo):</label>
                        <input type="text" class="form-control" id="segmentados_relativo" name="csegmentados_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getSegmentadosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="segmentados_absoluto" class="form-label">Segmentados (Absoluto):</label>
                        <input type="text" class="form-control" id="segmentados_absoluto" name="csegmentados_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getSegmentadosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="eosinofilos_relativo" class="form-label">Eosinófilos (Relativo):</label>
                        <input type="text" class="form-control" id="eosinofilos_relativo" name="ceosinofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getEosinofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="eosinofilos_absoluto" class="form-label">Eosinófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="eosinofilos_absoluto" name="ceosinofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getEosinofilosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="basofilos_relativo" class="form-label">Basófilos (Relativo):</label>
                        <input type="text" class="form-control" id="basofilos_relativo" name="cbasofilos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getBasofilosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="basofilos_absoluto" class="form-label">Basófilos (Absoluto):</label>
                        <input type="text" class="form-control" id="basofilos_absoluto" name="cbasofilos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getBasofilosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="linfocitos_relativo" class="form-label">Linfócitos (Relativo):</label>
                        <input type="text" class="form-control" id="linfocitos_relativo" name="clinfocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getLinfocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="linfocitos_absoluto" class="form-label">Linfócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="linfocitos_absoluto" name="clinfocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getLinfocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="linfocitos_atipicos_relativo" class="form-label">Linfócitos Atípicos (Relativo):</label>
                        <input type="text" class="form-control" id="linfocitos_atipicos_relativo"
                            name="clinfocitos_atipicos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getLinfocitosAtipicosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="linfocitos_atipicos_absoluto" class="form-label">Linfócitos Atípicos (Absoluto):</label>
                        <input type="text" class="form-control" id="linfocitos_atipicos_absoluto"
                            name="clinfocitos_atipicos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getLinfocitosAtipicosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="monocitos_relativo" class="form-label">Monócitos (Relativo):</label>
                        <input type="text" class="form-control" id="monocitos_relativo" name="cmonocitos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getMonocitosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="monocitos_absoluto" class="form-label">Monócitos (Absoluto):</label>
                        <input type="text" class="form-control" id="monocitos_absoluto" name="cmonocitos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getMonocitosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mieloblastos_relativo" class="form-label">Mieloblastos (Relativo):</label>
                        <input type="text" class="form-control" id="mieloblastos_relativo"
                            name="cmieloblastos_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getMieloblastosRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="mieloblastos_absoluto" class="form-label">Mieloblastos (Absoluto):</label>
                        <input type="text" class="form-control" id="mieloblastos_absoluto"
                            name="cmieloblastos_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getMieloblastosAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="outras_celulas_relativo" class="form-label">Outras Células (Relativo):</label>
                        <input type="text" class="form-control" id="outras_celulas_relativo"
                            name="coutras_celulas_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getOutrasCelulasRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="outras_celulas_absoluto" class="form-label">Outras Células (Absoluto):</label>
                        <input type="text" class="form-control" id="outras_celulas_absoluto"
                            name="coutras_celulas_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getOutrasCelulasAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="celulas_linfoides_relativo" class="form-label">Células Linfoides (Relativo):</label>
                        <input type="text" class="form-control" id="celulas_linfoides_relativo"
                            name="ccelulas_linfoides_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCelulasLinfoidesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="celulas_linfoides_absoluto" class="form-label">Células Linfoides (Absoluto):</label>
                        <input type="text" class="form-control" id="celulas_linfoides_absoluto"
                            name="ccelulas_linfoides_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCelulasLinfoidesAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="celulas_monocitoides_relativo" class="form-label">Células Monocitoides (Relativo):</label>
                        <input type="text" class="form-control" id="celulas_monocitoides_relativo"
                            name="ccelulas_monocitoides_relativo"
                            value="<?php echo htmlspecialchars($hematoRef->getCelulasMonocitoidesRelativo() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="celulas_monocitoides_absoluto" class="form-label">Células Monocitoides (Absoluto):</label>
                        <input type="text" class="form-control" id="celulas_monocitoides_absoluto"
                            name="ccelulas_monocitoides_absoluto"
                            value="<?php echo htmlspecialchars($hematoRef->getCelulasMonocitoidesAbsoluto() ?? ''); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="plaquetas" class="form-label">Plaquetas:</label>
                        <input type="text" class="form-control" id="plaquetas" name="cplaquetas"
                            value="<?php echo htmlspecialchars($hematoRef->getPlaquetas() ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="volume_plaquetario_medio" class="form-label">Volume Plaquetário Médio:</label>
                        <input type="text" class="form-control" id="volume_plaquetario_medio"
                            name="cvolume_plaquetario_medio"
                            value="<?php echo htmlspecialchars($hematoRef->getVolumePlaquetarioMedio() ?? ''); ?>">
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

    <script>
        /*const form = document.getElementById('teste');
        form.addEventListener("submit", function(e){
            e.preventDefault();
            console.log(form);
        })*/
    </script>

</body>

</html>