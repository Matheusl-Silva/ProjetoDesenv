<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home-usuario.css">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Portal de Saúde Positivo - Home</title>
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
                        <img src="assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
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

        <div class="container">

            <div class="welcome-banner">
                <div class="welcome-content">
                    <h1 class="welcome-title">Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?></h1>
                    <p class="welcome-subtitle">Selecione uma das opções abaixo para iniciar seus atendimentos</p>
                </div>
            </div>

            <?php if ($auth->isAdmin()): ?>

            <div class="cards-grid admin-grid">
                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon register">
                            <i class="bi bi-person-plus"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Cadastro de Paciente</h3>
                        <p class="card-description">Cadastrar novos pacientes no sistema com informações completas</p>
                        <a href="/cadastroPaciente" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon exames">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Exames</h3>
                        <p class="card-description">Verificar exames realizados pelos pacientes e cadastrar novos resultados</p>
                        <a href="/exames" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon edit-patient">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Editar Paciente</h3>
                        <p class="card-description">Modificar dados cadastrais e informações dos pacientes no sistema</p>
                        <a href="/paciente" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon edit-user">
                            <i class="bi bi-person-gear"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Editar Usuário</h3>
                        <p class="card-description">Atualizar informações de usuários do sistema e permissões de acesso</p>
                        <a href="/usuario" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php else: ?>

            <!-- Sem ser adm -->
            <div class="cards-grid user-grid">
                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon edit-patient">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Listar Pacientes</h3>
                        <p class="card-description">Listar pacientes do sistema</p>
                        <a href="/paciente" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="action-card">
                    <div class="card-icon-container">
                        <div class="card-icon exames">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Exames</h3>
                        <p class="card-description">Verificar exames já realizados pelos pacientes e cadastrar novos resultados no sistema</p>
                        <a href="/exames" class="action-btn">
                            Acessar
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>