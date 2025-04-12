<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/home-usuario.css">
    <title>Página principal</title>
</head>

<body class="bg-info-subtle">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle sticky-top">
            <div class="container">
                <img src="img/health.png" class="imagemSize" alt="">
                <a class="navbar-brand mx-auto text-primary" href="../index.html">Projeto Saude</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">                      
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#"><button class="btn btn-outline-danger">Sair</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row justify-content-evenly row1">
                <div class="card col-md-5 text-center round shadow">
                    <h1>👤</h1>
                    <h2>Cadastro de paciente</h2>
                    <p>Cadastrar novos pacientes</p>
                    <a href="cadastropaciente.php"><butt    on class="col-12 btn btn-primary mb-3">Acessar</button></a>
                </div>
                <div class="card col-md-5 text-center shadow">
                    <h1>🔬</h1>
                    <h2>Visualizar exames</h2>
                    <p>Verificar os exames já feitos pelos pacientes</p>
                    <a href="home.php"><button class="col-12 btn btn-primary mb-3">Acessar</button></a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>