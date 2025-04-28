<?php

require_once '../bd/ConexaoClass.php';
require_once '../comum/AutenticacaoClass.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$nome_usuario = $auth->getNomeUsuario();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/home-usuario.css">
    <title>Página principal</title>
    <style>
        :root {
            --dark-primary: #0d6efd;
            --medium-primary: #3a8afd;
            --light-primary: #5c9aff;
            --dark-bg: #f8f9fa;
            --medium-bg: #e9ecef;
            --light-bg: #dee2e6;
        }

        body {
            background: #6991b9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
        }

        .imagemSize {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #e6f0ff 0%, #cce4ff 100%);
            border-radius: 15px;
            padding: 40px 20px;
            margin: 30px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--dark-primary);
            border-color: var(--dark-primary);
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
            transform: translateY(-2px);
        }

        .user-greeting {
            font-weight: 500;
            color: #495057;
        }

        .btn-outline-danger {
            border-width: 2px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <div class="d-flex align-items-center">
                    <img src="../img/health.png" class="imagemSize" alt="Logo Saúde">
                    <a class="navbar-brand text-primary" href="../index.html">Portal hematológico</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center">
                        <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row text-center banner mt-5">
                <h1>Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?></h1>
                <h2>Selecione uma das opções abaixo para poder iniciar!</h2>
            </div>

            <div class="row justify-content-evenly row1">
                <div class="col-md-5">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-person-plus text-primary"></i>
                        </div>
                        <h2>Cadastro de paciente</h2>
                        <p>Cadastrar novos pacientes no sistema hematológico</p>
                        <a href="cadastropaciente.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
                        </a>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-clipboard2-pulse text-primary"></i>
                        </div>
                        <h2>Visualizar exames</h2>
                        <p>Verificar os exames já realizados pelos pacientes</p>
                        <a href="examePrincipal.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>