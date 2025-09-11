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
    <title>Exames</title>
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

    <div class="container my-5">

        <!-- Modal Pesquisa -->
        <div class="modal fade" id="pesquisaModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Pesquisar Paciente</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/exames" method="get">
                            <label for="paciente" class="form-label">Número do Paciente:</label>
                            <input type="text" class="form-control mb-3" id="paciente" name="paciente" required>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mensagem -->
        <?php if (!empty($mensagem)): ?>
        <div class="modal fade" id="mensagemModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div
                        class="modal-header <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'bg-success text-white' : 'bg-danger text-white'; ?>">
                        <h5 class="modal-title">
                            <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'Sucesso' : 'Aviso'; ?>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body"><?php echo htmlspecialchars($mensagem); ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!$paciente): ?>
            <!-- Tela inicial -->
            <div class="d-flex align-items-center justify-content-center">
                <div class="action-card p-5 text-center shadow">
                    <h2 class="mb-3">Cadastro Hematológico</h2>
                    <p class="text-primary mb-4">Clique abaixo para pesquisar um paciente</p>
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                        <i class="bi bi-search me-1"></i>Pesquisar Paciente
                    </button>
                    <div class="mt-4">
                        <a href="/home" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Voltar
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Paciente encontrado -->
            <div class="welcome-banner mb-4">
                <div class="welcome-content text-center">
                    <h2>Exames do paciente</h2>
                    <p class="welcome-subtitle">Paciente Nº <?php echo htmlspecialchars($paciente->getId()); ?></p>
                </div>
            </div>

            <!-- Histórico -->
            <div class="action-card mb-5">
                <h5 class="mb-3"><i class="bi bi-clock-history me-2"></i>Histórico de Exames</h5>
                <?php if (!empty($exames)): ?>
                <div class="table-responsive">
                    <table class="table table-hover table-sm align-middle">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Data</th>
                                <th>Preceptor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exames as $exame): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($exame->getId()); ?></td>
                                <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($exame->getData()))); ?></td>
                                <td><?php echo isset($preceptores_map[$exame->getPreceptor()]) ? htmlspecialchars($preceptores_map[$exame->getPreceptor()]) : 'ID: ' . $exame->getPreceptor(); ?></td>
                                <td><a href="visualizarExame.php?id=<?php echo $exame->getId(); ?>" class="btn btn-sm btn-info">Visualizar</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p class="text-muted">Nenhum exame encontrado.</p>
                <?php endif; ?>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#pesquisaModal"><i class="bi bi-search me-1"></i>Nova Pesquisa</button>
                <a href="/home" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Voltar</a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (!empty($mensagem)): ?>
        document.addEventListener('DOMContentLoaded', () => {
            var mensagemModal = new bootstrap.Modal(document.getElementById('mensagemModal'));
            mensagemModal.show();
        });
        <?php endif; ?>

        <?php if (!$paciente && !isset($_GET['paciente'])): ?>  
        document.addEventListener('DOMContentLoaded', () => {
            var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
            myModal.show();
        });
        <?php endif; ?>
    </script>
</body>
</html>