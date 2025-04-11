<?php
include_once "../bd/conexao.php";
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuário está logado
$logado       = isset($_SESSION['id']) && isset($_SESSION['nome']);
$nome_usuario = $logado ? $_SESSION['nome'] : '';

// Redireciona para a página de login se não estiver logado
if (!$logado) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sistema Laboratorial</title>
    <style>
        .card-menu {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .menu-icon {
            font-size: 4rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .welcome-banner {
            background-color: #e3f2fd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .action-description {
            min-height: 60px;
        }

        .btn-lg {
            padding: 12px 24px;
            font-size: 1.1rem;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .footer {
            margin-top: 60px;
            padding: 20px 0;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>

<body class="bg-info-subtle">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Laboratorial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastropaciente.php">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Exames</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                    <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <!-- Banner de boas-vindas -->
        <div class="welcome-banner text-center">
            <h2>Bem-vindo(a) ao Sistema Laboratorial</h2>
            <p class="mb-0">O que você deseja fazer hoje?</p>
        </div>

        <!-- Cards principais -->
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="card card-menu text-center p-4">
                    <div class="card-body d-flex flex-column">
                        <div class="menu-icon">👥</div>
                        <h3 class="card-title">Cadastrar Paciente</h3>
                        <p class="card-text action-description">Registre novos pacientes no sistema com seus dados pessoais e informações médicas.</p>
                        <div class="mt-auto">
                            <a href="cadastropaciente.php" class="btn btn-primary btn-lg w-100">Cadastrar Paciente</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card card-menu text-center p-4">
                    <div class="card-body d-flex flex-column">
                        <div class="menu-icon">🔬</div>
                        <h3 class="card-title">Verificar Exames</h3>
                        <p class="card-text action-description">Consulte os resultados de exames hematológicos dos pacientes cadastrados.</p>
                        <div class="mt-auto">
                            <a href="home.php" class="btn btn-primary btn-lg w-100">Acessar Exames</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Funcionalidades secundárias -->
        <h3 class="text-center mt-5 mb-4">Outras Funcionalidades</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-menu h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Buscar Paciente</h4>
                        <p class="card-text">Localize pacientes cadastrados no sistema</p>
                        <a href="#" class="btn btn-outline-primary">Buscar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-menu h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Agendar Exame</h4>
                        <p class="card-text">Agende novos exames para pacientes</p>
                        <a href="#" class="btn btn-outline-primary">Agendar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-menu h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Histórico</h4>
                        <p class="card-text">Acesse o histórico de exames realizados</p>
                        <a href="#" class="btn btn-outline-primary">Ver Histórico</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center">
            <p class="text-muted">&copy; <?php echo date('Y'); ?> Sistema de Gerenciamento Laboratorial. Todos os direitos reservados.</p>
        </footer>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>