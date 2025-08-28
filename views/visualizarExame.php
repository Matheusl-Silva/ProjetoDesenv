
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/home-usuario.css">
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
    <title>Resultado do Exame</title>
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
                        <img src="../assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
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
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-1">Resultado do Exame</h2>
                <p class="mb-0">ID do Exame: <?php echo htmlspecialchars($exame['id']); ?></p>
            </div>

            <div class="card-body p-4">
                <!-- Dados Gerais -->
                <fieldset disabled>
                    <legend class="h5 mb-3">Dados Gerais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame['nome_paciente']); ?> (Reg: <?php echo htmlspecialchars($exame['registro_paciente']); ?>)">
                            <?php else: ?>
                                <input type="text" class="form-control" value="*****">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Exame realizado em</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame['data']))); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Responsável pelo Exame</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame['nome_responsavel']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preceptor Responsável</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame['nome_preceptor']); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Eritrograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Eritrograma</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposEritrograma = [
                            'hemacia' => 'Hemácias',
                            'hemoglobina' => 'Hemoglobina',
                            'hematocrito' => 'Hematócrito',
                            'vcm' => 'VCM',
                            'hcm' => 'HCM',
                            'chcm' => 'CHCM',
                            'rdw' => 'RDW'
                        ];
                        foreach ($camposEritrograma as $key => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame[$key] ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Leucograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Leucograma</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposLeucograma = [
                            'leucocitos' => 'Leucócitos',
                            'blastos' => 'Blastos (µL)',
                            'promielocitos' => 'Prómielócitos (µL)',
                            'mielocitos' => 'Mielócitos (µL)',
                            'metamielocitos' => 'Metamielócitos (µL)',
                            'bastonetes' => 'Bastonetes (µL)',
                            'segmentados' => 'Segmentados (µL)',
                            'neutrofilos' => 'Neutrófilos (%)',
                            'eosinofilos' => 'Eosinófilos (%)',
                            'basofilos' => 'Basófilos (%)'
                        ];
                        foreach ($camposLeucograma as $key => $label): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $label; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($exame[$key] ?? 'N/A'); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Plaquetograma -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Plaquetograma</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Plaquetas</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame['plaquetas'] ?? 'N/A'); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Volume Plaquetário Médio</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($exame['volplaquetariomedio'] ?? 'N/A'); ?>">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="card-footer bg-light text-center py-3">
                <?php if ($auth->isAdmin()): ?>
                    <button onclick="imprimirLaudo(<?php echo $exame['id']; ?>)" class="btn btn-primary me-2">
                        <i class="bi bi-printer"></i> Imprimir
                    </button>
                <?php endif; ?>
                <a href="examePrincipal.php?numero_paciente=<?php echo $exame['registro_paciente']; ?>"
                    class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar para o Paciente
                </a>
                <a href="homeUsuario.php" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Voltar para Home
                </a>
            </div>
        </div>
    </main>

    <script>
        function imprimirLaudo(idExame) {
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = `laudo.php?id=${idExame}`;
            document.body.appendChild(iframe);

            iframe.onload = function () {
                try {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                    iframe.contentWindow.onafterprint = function () {
                        document.body.removeChild(iframe);
                    }
                } catch (error) {
                    alert("Não foi possível abrir a janela de impressão.");
                    document.body.removeChild(iframe);
                }
            };
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
