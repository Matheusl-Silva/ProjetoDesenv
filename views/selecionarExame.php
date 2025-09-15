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
    <title>Seleção de Exames</title>
    <style>
        .exam-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }

        .exam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-blue-light));
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .exam-card:hover::before {
            transform: translateX(0);
        }

        .exam-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .exam-card.selected {
            border-color: var(--primary-blue);
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 50%);
        }

        .exam-card.selected::before {
            transform: translateX(0);
        }

        .examehemato-card {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            color: white;
            border: none;
            margin-bottom: 30px;
        }

        .examehemato-card:hover {
            background: linear-gradient(135deg, var(--primary-blue-dark), var(--primary-blue));
            transform: translateY(-8px) scale(1.02);
        }

        .examehemato-card::before {
            display: none;
        }

        .exam-grid {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .exam-grid::-webkit-scrollbar {
            width: 8px;
        }

        .exam-grid::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .exam-grid::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 10px;
        }

        .exam-icon {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .icon-warning { background-color: var(--warning-orange); }
        .icon-info { background-color: var(--secondary-blue); }
        .icon-success { background-color: var(--success-green); }
        .icon-danger { background-color: #ef4444; }
        .icon-primary { background-color: var(--primary-blue); }
        .icon-secondary { background-color: #6b7280; }
        .icon-dark { background-color: #374151; }

        .selection-actions {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--card-shadow);
            margin-top: 30px;
        }

        .btn-custom {
            border-radius: 25px;
            font-weight: 500;
            padding: 10px 25px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            color: white;
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.4);
            color: white;
        }

        .btn-success-custom {
            background: linear-gradient(135deg, var(--success-green), #059669);
            color: white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .examehemato-icon {
            font-size: 2.5rem;
            margin-right: 15px;
        }
    </style>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center">
                    <span class="user-greeting me-3">Olá, Usuário</span>
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
        <!-- Banner -->
        <div class="welcome-banner mb-4">
            <div class="welcome-content text-center">
                <h2 class="welcome-title">Seleção de Exames</h2>
                <p class="welcome-subtitle">Selecione os exames que deseja cadastrar para o paciente</p>
            </div>
        </div>

        <!-- Examehemato Card (Destacado) -->
        <div class="action-card examehemato-card" onclick="goToExamehemato()">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="bi bi-microscope examehemato-icon"></i>
                    <div>
                        <h4 class="mb-1">Examehemato</h4>
                        <p class="mb-0 opacity-75">Clique para acessar a tela específica do exame hematológico</p>
                    </div>
                </div>
                <i class="bi bi-chevron-right" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <!-- Outros Exames -->
        <div class="action-card">
            <h5 class="mb-4">
                <i class="bi bi-clipboard2-pulse me-2"></i>
                Outros Exames Laboratoriais
            </h5>
            <p class="text-muted mb-4">Selecione múltiplos exames usando os checkboxes abaixo</p>

            <div class="exam-grid">
                <div class="row g-3">
                    <!-- Bilirrubina Total -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bilirrubina-total" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="bilirrubina-total">
                                    <span class="exam-icon icon-warning"></span>
                                    Bilirrubina Total
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Bilirrubina Direta -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bilirrubina-direta" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="bilirrubina-direta">
                                    <span class="exam-icon icon-warning"></span>
                                    Bilirrubina Direta
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Proteína Total -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="proteina-total" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="proteina-total">
                                    <span class="exam-icon icon-info"></span>
                                    Proteína Total
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Albumina -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="albumina" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="albumina">
                                    <span class="exam-icon icon-info"></span>
                                    Albumina
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Amilase -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amilase" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="amilase">
                                    <span class="exam-icon icon-success"></span>
                                    Amilase
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- TGO -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tgo" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="tgo">
                                    <span class="exam-icon icon-danger"></span>
                                    TGO - Transaminase Glutamico Oxalacética
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- TGP -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tgp" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="tgp">
                                    <span class="exam-icon icon-danger"></span>
                                    TGP - Transaminase Glutamico Piruvica
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Gama GT -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gama-gt" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="gama-gt">
                                    <span class="exam-icon icon-danger"></span>
                                    Gama GT - Glutamiltransferase
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Fosfatase Alcalina -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fosfatase" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="fosfatase">
                                    <span class="exam-icon icon-secondary"></span>
                                    Fosfatase Alcalina
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Creatina Quinase - CK -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ck" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="ck">
                                    <span class="exam-icon icon-primary"></span>
                                    Creatina Quinase - CK
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Glicose -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="glicose" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="glicose">
                                    <span class="exam-icon icon-warning"></span>
                                    Glicose
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Ferro -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ferro" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="ferro">
                                    <span class="exam-icon icon-dark"></span>
                                    Ferro
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Colesterol Total -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="colesterol-total" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="colesterol-total">
                                    <span class="exam-icon icon-danger"></span>
                                    Colesterol Total
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- HDL -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="hdl" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="hdl">
                                    <span class="exam-icon icon-success"></span>
                                    HDL
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- LDL -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ldl" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="ldl">
                                    <span class="exam-icon icon-warning"></span>
                                    LDL
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Triglicerídeos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="triglicerideos" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="triglicerideos">
                                    <span class="exam-icon icon-info"></span>
                                    Triglicerídeos
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Ureia -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ureia" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="ureia">
                                    <span class="exam-icon icon-primary"></span>
                                    Ureia
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Creatinina -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="creatinina" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="creatinina">
                                    <span class="exam-icon icon-primary"></span>
                                    Creatinina
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Ácido Úrico -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="acido-urico" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="acido-urico">
                                    <span class="exam-icon icon-warning"></span>
                                    Ácido Úrico
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- PCR -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pcr" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="pcr">
                                    <span class="exam-icon icon-danger"></span>
                                    PCR - Proteína C Reativa
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Calcio -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="calcio" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="calcio">
                                    <span class="exam-icon icon-secondary"></span>
                                    Calcio
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- LDH -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ldh" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="ldh">
                                    <span class="exam-icon icon-info"></span>
                                    LDH
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Magnésio -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="magnesio" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="magnesio">
                                    <span class="exam-icon icon-success"></span>
                                    Magnésio
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Fósforo -->
                    <div class="col-md-6 col-lg-4">
                        <div class="exam-card p-3 h-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fosforo" onchange="toggleExamCard(this)">
                                <label class="form-check-label w-100" for="fosforo">
                                    <span class="exam-icon icon-secondary"></span>
                                    Fósforo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botões de Ação -->
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

        <!-- Botões de Navegação -->
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
        // Função para alterar visual do card quando checkbox é marcado/desmarcado
        function toggleExamCard(checkbox) {
            const card = checkbox.closest('.exam-card');
            if (checkbox.checked) {
                card.classList.add('selected');
            } else {
                card.classList.remove('selected');
            }
        }

        // Função para ir para tela do Examehemato
        function goToExamehemato() {
            // Aqui você pode redirecionar para outra página
            alert('Redirecionando para a tela do Examehemato...');
            // window.location.href = 'examehemato.php';
        }

        // Função para selecionar todos os exames
        function selectAll() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
                toggleExamCard(checkbox);
            });
        }

        // Função para limpar todas as seleções
        function clearAll() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
                toggleExamCard(checkbox);
            });
        }

        // Função para confirmar seleção
        function submitSelection() {
            const selectedExams = [];
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

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

            // Aqui você pode enviar os dados para o backend
            console.log('Exames selecionados:', selectedExams);
            alert(`${selectedExams.length} exame(s) selecionado(s). Dados prontos para envio ao backend.`);

        }

        document.addEventListener('DOMContentLoaded', function() {
            const examCards = document.querySelectorAll('.exam-card:not(.examehemato-card)');
            examCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.type !== 'checkbox') {
                        const checkbox = this.querySelector('input[type="checkbox"]');
                        checkbox.checked = !checkbox.checked;
                        toggleExamCard(checkbox);
                    }
                });
            });
        });
    </script>
</body>
</html>
