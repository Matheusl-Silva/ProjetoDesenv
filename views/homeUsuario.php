<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/home-usuario.css">
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
    <title>Página principal</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <div class="d-flex align-items-center">
                    <img src="../assets/img/health.png" class="imagemSize" alt="Logo Saúde">
                    <a class="navbar-brand text-primary" href="../index.html">Portal hematológico</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center">
                        <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nomeUsuario); ?></span>
                        <form action="/logout" method="post"><button type="submit" class="btn btn-outline-danger btn-sm" style="display: inline">Sair</button></form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row text-center banner mt-5">
                <h1>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?></h1>
                <h2>Selecione uma das opções abaixo para poder iniciar!</h2>
            </div>

            <?php if ($auth->isAdmin()): ?>
            <!-- Menu completo para administradores -->
            <div class="row justify-content-evenly row1">
                <div class="col-md-5 mb-4">
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

                <div class="col-md-5 mb-4">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-clipboard2-pulse text-primary"></i>
                        </div>
                        <h2>Exames</h2>
                        <p>Verificar os exames já realizados pelos pacientes e cadastrar novos</p>
                        <a href="examePrincipal.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-evenly row2">
              <div class="col-md-5 mb-4">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-person-vcard text-primary"></i>
                        </div>
                        <h2>Editar paciente</h2>
                        <p>Modificar dados cadastrais dos pacientes</p>
                        <a href="editarPaciente.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
                        </a>
                    </div>
                </div>

                <div class="col-md-5 mb-4">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-person-gear text-primary"></i>
                        </div>
                        <h2>Editar usuário</h2>
                        <p>Atualizar informações de usuários do sistema</p>
                        <a href="editarUsuario.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
                        </a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <!-- Menu limitado para usuários não adm -->
            <div class="row justify-content-center">
                <div class="col-md-5 mb-4">
                    <div class="card text-center shadow-sm h-100">
                        <div class="icone">
                            <i class="bi bi-clipboard2-pulse text-primary"></i>
                        </div>
                        <h2>Exames</h2>
                        <p>Verificar os exames já realizados pelos pacientes e cadastrar novos</p>
                        <a href="examePrincipal.php" class="mt-auto">
                            <button class="col-12 btn btn-primary">Acessar</button>
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