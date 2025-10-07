<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">
    <link rel="stylesheet" href="../../assets/css/SelecionarExame.css"> <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Cadastro de Exames Bioquímicos</title>
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
        <form class="needs-validation" novalidate method="post" action="/exameBio">
            <input type="hidden" name="id_paciente" value="<?php echo $paciente->getId(); ?>">
            <input type="hidden" name="tipo_exame" value="bioquimica">

            <div class="welcome-banner mb-5">
                <div class="welcome-content text-center">
                    <h2 class="welcome-title">Cadastro de Exames Bioquímicos</h2>
                    <p class="welcome-subtitle">Preencha os resultados para o paciente</p>
                </div>
            </div>

            <div class="row g-4">

                <?php if (count(array_intersect($paineis['hepatico'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-activity me-2 icon-danger"></i>Função Hepática</h6>
                        <?php if (in_array('ast', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">TGO (AST)</label><input type="text" class="form-control" name="ast"><div class="form-text text-muted small">F: &lt;31 U/L • M: &lt;35 U/L</div></div><?php endif; ?>
                        <?php if (in_array('alt', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">TGP (ALT)</label><input type="text" class="form-control" name="alt"><div class="form-text text-muted small">F: &lt;34 U/L • M: &lt;45 U/L</div></div><?php endif; ?>
                        <?php if (in_array('ggt', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Gama GT</label><input type="text" class="form-control" name="ggt"><div class="form-text text-muted small">F: &lt;32 U/L • M: &lt;49 U/L</div></div><?php endif; ?>
                        <?php if (in_array('bilirrubina_total', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Bilirrubina Total</label><input type="text" class="form-control" name="bilirrubina_total"><div class="form-text text-muted small">Adultos: 0,1 – 1,2 mg/dL</div></div><?php endif; ?>
                        <?php if (in_array('bilirrubina_direta', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Bilirrubina Direta</label><input type="text" class="form-control" name="bilirrubina_direta"><div class="form-text text-muted small">Adultos/Crianças: ≤ 0,1 – 1,2 mg/dL</div></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (count(array_intersect($paineis['renal'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-funnel me-2 icon-primary"></i>Função Renal</h6>
                        <?php if (in_array('ureia', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Ureia</label><input type="text" class="form-control" name="ureia"></div><?php endif; ?>
                        <?php if (in_array('creatinina', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Creatinina</label><input type="text" class="form-control" name="creatinina"></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (count(array_intersect($paineis['proteinas'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-body-text me-2 icon-info"></i>Proteínas e Enzimas</h6>
                        <?php if (in_array('proteina_total', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Proteína Total</label><input type="text" class="form-control" name="proteina_total"><div class="form-text text-muted small">3,5 – 5,2 g/dL</div></div><?php endif; ?>
                        <?php if (in_array('albumina', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Albumina</label><input type="text" class="form-control" name="albumina"><div class="form-text text-muted small">3,5 – 5,2 g/dL</div></div><?php endif; ?>
                        <?php if (in_array('amilase', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Amilase</label><input type="text" class="form-control" name="amilase"><div class="form-text text-muted small">&lt; 100 U/L</div></div><?php endif; ?>
                        <?php if (in_array('ldh', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">LDH</label><input type="text" class="form-control" name="ldh"><div class="form-text text-muted small">&lt; 480 U/L</div></div><?php endif; ?>
                        <?php if (in_array('fa', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Fosfatase Alcalina</label><input type="text" class="form-control" name="fa"><div class="form-text text-muted small">F: 35–105 • M: 40–130 U/L</div></div><?php endif; ?>
                        <?php if (in_array('ck', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">CK (Creatina Quinase)</label><input type="text" class="form-control" name="ck"><div class="form-text text-muted small">F: &lt;145 • M: &lt;171 U/L</div></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (count(array_intersect($paineis['lipidico'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-droplet me-2 icon-danger"></i>Perfil Lipídico</h6>
                        <?php if (in_array('col_total', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Colesterol Total</label><input type="text" class="form-control" name="col_total"><div class="form-text text-muted small">≤ 200 mg/dL</div></div><?php endif; ?>
                        <?php if (in_array('hdl', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">HDL</label><input type="text" class="form-control" name="hdl"><div class="form-text text-muted small">≥ 40–45 mg/dL</div></div><?php endif; ?>
                        <?php if (in_array('ldl', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">LDL</label><input type="text" class="form-control" name="ldl"><div class="form-text text-muted small">Alvo por risco</div></div><?php endif; ?>
                        <?php if (in_array('triglicerideos', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Triglicerídeos</label><input type="text" class="form-control" name="triglicerideos"><div class="form-text text-muted small">≤ 200 mg/dL</div></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (count(array_intersect($paineis['meta_minerais'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-lightning me-2 icon-warning"></i>Metabolismo e Minerais</h6>
                        <?php if (in_array('glicose', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Glicose</label><input type="text" class="form-control" name="glicose"><div class="form-text text-muted small">70–99 jejum</div></div><?php endif; ?>
                        <?php if (in_array('ferro', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Ferro</label><input type="text" class="form-control" name="ferro"></div><?php endif; ?>
                        <?php if (in_array('calcio', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Cálcio</label><input type="text" class="form-control" name="calcio"></div><?php endif; ?>
                        <?php if (in_array('magnesio', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Magnésio</label><input type="text" class="form-control" name="magnesio"></div><?php endif; ?>
                        <?php if (in_array('fosforo', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Fósforo</label><input type="text" class="form-control" name="fosforo"></div><?php endif; ?>
                        <?php if (in_array('acido_urico', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">Ácido Úrico</label><input type="text" class="form-control" name="acido_urico"></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (count(array_intersect($paineis['inflamatorios'], $campos_visiveis)) > 0): ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="exam-card p-4 h-100">
                        <h6 class="card-group-title"><i class="bi bi-fire me-2 icon-danger"></i>Marcadores Inflamatórios</h6>
                        <?php if (in_array('pcr', $campos_visiveis)): ?><div class="mb-3"><label class="form-label">PCR</label><input type="text" class="form-control" name="pcr"><div class="form-text text-muted small">Inferior a 1,0 mg/dL</div></div><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div> <div class="row mt-4">
                <div class="col-12">
                    <div class="exam-card p-4">
                        <h6 class="card-group-title"><i class="bi bi-journal-text me-2"></i>Observações</h6>
                        <textarea class="form-control" id = "observacao" name="observacao" rows="4" placeholder="Observações clínicas, intercorrências, orientação ao paciente etc."></textarea>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="exam-card p-4">
                        <h6 class="card-group-title"><i class="bi bi-person-check me-2"></i>Responsáveis pelo Exame</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Responsável pelo exame <span class="text-danger">*</span></label>
                                <select name="id_responsavel" class="form-select" required>
                                    <option value="" selected disabled>Selecione um usuário...</option>
                                    <?php foreach ($usuario as $usuarios): ?>
                                    <option value="<?php echo $usuarios->getId(); ?>">
                                        <?php echo htmlspecialchars($usuarios->getNome()); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecione o responsável pelo exame.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Preceptor responsável <span class="text-danger">*</span></label>
                                <select name="id_preceptor" class="form-select" required>
                                    <option value="" selected disabled>Selecione um usuário...</option>
                                    <?php foreach ($usuario as $usuarios): ?>
                                    <option value="<?php echo $usuarios->getId(); ?>">
                                        <?php echo htmlspecialchars($usuarios->getNome()); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecione o preceptor responsável.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="exam-card p-4">
                        <h6 class="card-group-title"><i class="bi bi-calendar-event me-2"></i>Data do Exame</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Data da Coleta <span class="text-danger">*</span></label>
                                <input type="date" name="data" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor, informe a data do exame.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="selection-actions">
                <div class="d-flex justify-content-end align-items-center flex-wrap gap-3">
                     <a href="/exames?paciente=<?php echo $paciente->getId(); ?>" class="btn btn-outline-secondary btn-custom"><i class="bi bi-arrow-left"></i> Voltar</a>
                     <button type="submit" class="btn btn-primary-custom btn-custom"><i class="bi bi-save2"></i> Salvar Resultados</button>
                </div>
            </div>

        </form>
    </main>
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalSucessoLabel">
                <i class="bi bi-check-circle-fill me-2"></i> Sucesso!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body text-center">
                <p id="mensagemSucesso" class="fs-5 mb-0"></p>
            </div>
            <div class="modal-footer">
                <a href="/exames?paciente=<?php echo $paciente->getId(); ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Ver Exames
                </a>
                <a href="/home" class="btn btn-success">
                <i class="bi bi-house-door me-1"></i> Ir para Home
                </a>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => { const forms = document.querySelectorAll('.needs-validation'); Array.from(forms).forEach(f => { f.addEventListener('submit', e => { if (!f.checkValidity()) { e.preventDefault(); e.stopPropagation(); } f.classList.add('was-validated'); }); }); })();

    const urlParams = new URLSearchParams(window.location.search);
    const exameId = urlParams.get('exame_id');
    const sucesso = urlParams.get('sucesso');

    if (sucesso === '1') {
        const mensagem = document.getElementById('mensagemSucesso');
        mensagem.textContent = exameId
        ? `Exame Bioquímico cadastrado com sucesso! Número do exame: ${exameId}`
        : 'Exame Bioquímico cadastrado com sucesso!';

        const modal = new bootstrap.Modal(document.getElementById('modalSucesso'));
        modal.show();

        const url = new URL(window.location);
        url.searchParams.delete('sucesso');
        window.history.replaceState({}, document.title, url);
    }
    </script>
</body>
</html>