<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/SelecionarExame.css">
    <title>Seleção de Exames</title>
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

    <div class="container my-5">
        <div class="welcome-banner mb-5">
            <div class="welcome-content text-center">
                <h2 class="welcome-title">Seleção de Exames</h2>
                <p class="welcome-subtitle">Selecione os exames que deseja cadastrar para o paciente</p>
            </div>
        </div>

        <a href="/cadastrarHematologia/<?php echo $paciente->getId(); ?>" class="text-decoration-none">
            <div class="action-card examehemato-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-droplet-half examehemato-icon"></i>
                        <div>
                            <h4 class="mb-1 text-white">Hematologia</h4>
                            <p class="mb-0 text-white opacity-75">Clique para acessar a tela específica do exame hematológico</p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-white" style="font-size: 1.5rem;"></i>
                </div>
            </div>
        </a>

        <h4 class="mb-4">
            <i class="bi bi-clipboard2-pulse me-2"></i>
            Exames Bioquímicos
        </h4>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-activity me-2 icon-danger"></i>Função Hepática</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="tgo"><label class="form-check-label" for="tgo">TGO - Transaminase Glutamico Oxalacética</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="tgp"><label class="form-check-label" for="tgp">TGP - Transaminase Glutamico Piruvica</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="gama-gt"><label class="form-check-label" for="gama-gt">Gama GT - Glutamiltransferase</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="bilirrubina-total"><label class="form-check-label" for="bilirrubina-total">Bilirrubina Total</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="bilirrubina-direta"><label class="form-check-label" for="bilirrubina-direta">Bilirrubina Direta</label></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-funnel me-2 icon-primary"></i>Função Renal</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="ureia"><label class="form-check-label" for="ureia">Ureia</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="creatinina"><label class="form-check-label" for="creatinina">Creatinina</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="acido-urico"><label class="form-check-label" for="acido-urico">Ácido Úrico</label></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-body-text me-2 icon-info"></i>Proteínas e Enzimas</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="proteina-total"><label class="form-check-label" for="proteina-total">Proteína Total</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="albumina"><label class="form-check-label" for="albumina">Albumina</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="amilase"><label class="form-check-label" for="amilase">Amilase</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="ldh"><label class="form-check-label" for="ldh">LDH - Desidrogenase lática</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="fosfatase"><label class="form-check-label" for="fosfatase">Fosfatase Alcalina</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="ck"><label class="form-check-label" for="ck">CK - Creatina Quinase</label></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-droplet me-2 icon-danger"></i>Perfil Lipídico</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="colesterol-total"><label class="form-check-label" for="colesterol-total">Colesterol Total</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="hdl"><label class="form-check-label" for="hdl">HDL - Colesterol</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="ldl"><label class="form-check-label" for="ldl">LDL - Colesterol</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="triglicerideos"><label class="form-check-label" for="triglicerideos">Triglicerídeos</label></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-lightning me-2 icon-warning"></i>Metabolismo e Minerais</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="glicose"><label class="form-check-label" for="glicose">Glicose</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="ferro"><label class="form-check-label" for="ferro">Ferro</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="calcio"><label class="form-check-label" for="calcio">Cálcio</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="magnesio"><label class="form-check-label" for="magnesio">Magnésio</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="fosforo"><label class="form-check-label" for="fosforo">Fósforo</label></div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="exam-card p-4 h-100">
                    <h6 class="card-group-title"><i class="bi bi-fire me-2 icon-danger"></i>Marcadores Inflamatórios</h6>
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="pcr"><label class="form-check-label" for="pcr">PCR - Proteína C Reativa</label></div>
                </div>
            </div>
        </div>

        <div class="selection-actions">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <button type="button" class="btn btn-custom btn-primary-custom me-2" onclick="selectAll()">
                        <i class="bi bi-check2-square me-2"></i>
                        Selecionar Todos
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-custom" onclick="clearAll()">
                        <i class="bi bi-square me-2"></i>
                        Limpar Seleção
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-custom btn-success-custom btn-lg" onclick="submitSelection()">
                        <i class="bi bi-check-circle me-2"></i>
                        Confirmar Seleção
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="/exames" class="btn btn-outline-primary btn-custom me-2">
                <i class="bi bi-arrow-left me-1"></i>
                Voltar aos Exames
            </a>
            <a href="/home" class="btn btn-outline-secondary btn-custom">
                <i class="bi bi-house me-1"></i>
                Início
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para selecionar todos os exames
        function selectAll() {
            const checkboxes = document.querySelectorAll('.exam-card input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
            });
        }

        // Função para limpar todas as seleções
        function clearAll() {
            const checkboxes = document.querySelectorAll('.exam-card input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        // Função para confirmar seleção
        function submitSelection() {
            const selectedExams = [];
            const checkboxes = document.querySelectorAll('.exam-card input[type="checkbox"]:checked');

            checkboxes.forEach(checkbox => {
                const label = document.querySelector(`label[for="${checkbox.id}"]`);
                selectedExams.push({
                    id: checkbox.id,
                    name: label.textContent.trim()
                });
            });

            if (selectedExams.length === 0) {
                alert('Por favor, selecione pelo menos um exame.');
                return;
            }

        }
    </script>
</body>
</html>