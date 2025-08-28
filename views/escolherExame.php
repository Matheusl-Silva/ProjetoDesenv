<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/home-usuario.css">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Exames do Paciente</title>
</head>

<body>
    <!-- Elementos decorativos -->
    <div class="bg-decoration decoration-1"></div>
    <div class="bg-decoration decoration-2"></div>
    <div class="bg-decoration decoration-3"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="logo-container-nav">
                    <img src="../assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
                </div>
                <a class="navbar-brand">Portal de Saúde Positivo</a>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <div class="d-flex align-items-center">
                    <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                    <form action="../logout.php" method="post">
                        <button type="submit" class="btn-logout">
                            <i class="bi bi-box-arrow-right me-1"></i>Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container my-5">
        <div class="welcome-banner mb-4">
            <div class="welcome-content text-center">
                <h2>Exames do Paciente</h2>
                <p class="welcome-subtitle">Paciente Nº <?php echo htmlspecialchars($paciente['id']); ?> - <?php echo htmlspecialchars($paciente['nome']); ?></p>
            </div>
        </div>

        <!-- Lista de exames -->
        <div class="action-card shadow p-4">
            <h5 class="mb-3"><i class="bi bi-file-earmark-medical me-2"></i>Histórico de Exames</h5>
            <?php if (!empty($exames)): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Responsável</th>
                                <th>Preceptor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exames as $exame): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($exame['id']); ?></td>
                                    <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame['data']))); ?></td>
                                    <td><?php echo htmlspecialchars($exame['nome_responsavel']); ?></td>
                                    <td>
                                        <?php echo isset($preceptores_map[$exame['id_preceptor']]) 
                                            ? htmlspecialchars($preceptores_map[$exame['id_preceptor']]) 
                                            : 'ID: ' . $exame['id_preceptor']; ?>
                                    </td>
                                    <td>
                                        <a href="visualizarExame.php?id=<?php echo $exame['id']; ?>" 
                                           class="btn btn-sm btn-primary">
                                           <i class="bi bi-eye"></i> Visualizar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">Nenhum exame encontrado para este paciente.</p>
            <?php endif; ?>
        </div>

        <!-- Botões -->
        <div class="text-center mt-4">
            <a href="examePrincipal.php" class="btn btn-outline-primary me-2">
                <i class="bi bi-search me-1"></i> Nova Pesquisa
            </a>
            <a href="homeUsuario.php" class="btn btn-outline-secondary">
                <i class="bi bi-house me-1"></i> Home
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
