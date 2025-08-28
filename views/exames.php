<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/home-usuario.css">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Exames</title>
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
                        <form action="examePrincipal.php" method="get">
                            <label for="numero_paciente" class="form-label">Número do Paciente:</label>
                            <input type="text" class="form-control mb-3" id="numero_paciente" name="numero_paciente" required>
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
                        class="modal-header <?php echo(strpos($mensagem,'sucesso')!==false)?'bg-success text-white':'bg-danger text-white'; ?>">
                        <h5 class="modal-title">
                            <?php echo(strpos($mensagem,'sucesso')!==false)?'Sucesso':'Aviso'; ?>
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
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <div class="action-card p-5 text-center shadow">
                    <h2 class="mb-3">Cadastro Hematológico</h2>
                    <p class="text-primary mb-4">Clique abaixo para pesquisar um paciente</p>
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                        <i class="bi bi-search me-1"></i>Pesquisar Paciente
                    </button>
                    <div class="mt-4">
                        <a href="homeUsuario.php" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Voltar
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Paciente encontrado -->
            <div class="welcome-banner mb-4">
                <div class="welcome-content text-center">
                    <h2>Cadastro Hematológico</h2>
                    <p class="welcome-subtitle">Paciente Nº <?php echo htmlspecialchars($paciente['id']); ?></p>
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
                                <td><?php echo htmlspecialchars($exame['id']); ?></td>
                                <td><?php echo htmlspecialchars(date('d/m/Y',strtotime($exame['data']))); ?></td>
                                <td><?php echo isset($preceptores_map[$exame['id_preceptor']])?htmlspecialchars($preceptores_map[$exame['id_preceptor']]):'ID: '.$exame['id_preceptor']; ?></td>
                                <td><a href="visualizarExame.php?id=<?php echo $exame['id']; ?>" class="btn btn-sm btn-info">Visualizar</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p class="text-muted">Nenhum exame encontrado. Preencha abaixo para cadastrar um novo.</p>
                <?php endif; ?>
            </div>

            <!-- Formulário -->
            <form action="salvar_exame.php" method="POST" class="action-card p-4">
                <input type="hidden" name="registro_paciente" value="<?php echo htmlspecialchars($paciente['id']); ?>">
                <input type="hidden" name="id_responsavel" value="<?php echo htmlspecialchars($id_usuario); ?>">

                <h5 class="mb-3 text-secondary">Responsáveis</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Responsável</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($nome_usuario); ?>" disabled>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Preceptor</label>
                        <select class="form-select" name="id_preceptor" required>
                            <option value="">Selecione</option>
                            <?php foreach ($usuarios_para_preceptores as $u): ?>
                            <option value="<?php echo htmlspecialchars($u['id']); ?>"><?php echo htmlspecialchars($u['nome']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Info paciente -->
                <h5 class="mb-3 text-secondary">Informações do Paciente</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-2">
                        <label class="form-label">Registro</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($paciente['id']); ?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Entrada</label>
                        <input type="date" class="form-control" name="dentrada" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Data Exame</label>
                        <input type="datetime-local" class="form-control" name="data" value="<?php echo date('Y-m-d\TH:i'); ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Entrega</label>
                        <input type="date" class="form-control" name="dentrega" value="<?php echo date('Y-m-d',strtotime('+1 day')); ?>">
                    </div>
                </div>

                <!-- Eritrograma -->
                <div class="mb-4">
                    <h6 class="fw-bold">Eritrograma</h6>
                    <div class="row g-3">
                        <div class="col-md-2"><label class="form-label">Hemácias</label><input type="number" step="0.01" class="form-control" name="hemacia" required></div>
                        <div class="col-md-2"><label class="form-label">Hemoglobina</label><input type="number" step="0.1" class="form-control" name="hemoglobina" required></div>
                        <div class="col-md-2"><label class="form-label">Hematócrito</label><input type="number" step="0.1" class="form-control" name="hematocrito" required></div>
                        <div class="col-md-2"><label class="form-label">VCM</label><input type="number" step="0.1" class="form-control" name="vcm" required></div>
                        <div class="col-md-2"><label class="form-label">HCM</label><input type="number" step="0.1" class="form-control" name="hcm" required></div>
                        <div class="col-md-2"><label class="form-label">CHCM</label><input type="number" step="0.1" class="form-control" name="chcm" required></div>
                        <div class="col-md-2"><label class="form-label">RDW</label><input type="number" step="0.1" class="form-control" name="rdw" required></div>
                        <div class="col-md-2"><label class="form-label">Leucócitos</label><input type="number" step="0.01" class="form-control" name="leucocitos" required></div>
                    </div>
                </div>

                <!-- Células Mieloides -->
                <div class="mb-4">
                    <h6 class="fw-bold">Células Mieloides</h6>
                    <div class="row g-3">
                        <div class="col-md-2"><label class="form-label">Blastos</label><input type="number" class="form-control" name="blastos" required></div>
                        <div class="col-md-2"><label class="form-label">Prómielócitos</label><input type="number" class="form-control" name="promielocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Mielócitos</label><input type="number" class="form-control" name="mielocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Metamielócitos</label><input type="number" class="form-control" name="metamielocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Bastonetes</label><input type="number" class="form-control" name="bastonetes" required></div>
                        <div class="col-md-2"><label class="form-label">Segmentados</label><input type="number" class="form-control" name="segmentados" required></div>
                    </div>
                </div>

                <!-- Outras células -->
                <div class="mb-4">
                    <h6 class="fw-bold">Outras Células e Plaquetas</h6>
                    <div class="row g-3">
                        <div class="col-md-2"><label class="form-label">Linfócitos</label><input type="number" class="form-control" name="linfocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Monócitos</label><input type="number" class="form-control" name="monocitos" required></div>
                        <div class="col-md-3"><label class="form-label">Plaquetas</label><input type="number" class="form-control" name="plaquetas" required></div>
                        <div class="col-md-3"><label class="form-label">Vol. Plaquetário Médio</label><input type="number" step="0.1" class="form-control" name="plaquetarioMedio" required></div>
                    </div>
                </div>

                <!-- Contagem diferencial -->
                <div class="mb-4">
                    <h6 class="fw-bold">Contagem Diferencial (%)</h6>
                    <div class="row g-3">
                        <div class="col-md-2"><label class="form-label">Neutrófilos</label><input type="number" class="form-control" name="contagemNeutrofilos" required></div>
                        <div class="col-md-2"><label class="form-label">Linfócitos</label><input type="number" class="form-control" name="contagemLinfocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Eosinófilos</label><input type="number" class="form-control" name="contagemEosinofilos" required></div>
                        <div class="col-md-2"><label class="form-label">Monócitos</label><input type="number" class="form-control" name="contagemMonocitos" required></div>
                        <div class="col-md-2"><label class="form-label">Basófilos</label><input type="number" class="form-control" name="contagemBasofilos" required></div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check2-circle me-1"></i>Salvar Novo Exame
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="examePrincipal.php" class="btn btn-outline-primary me-2"><i class="bi bi-search me-1"></i>Nova Pesquisa</a>
                <a href="homeUsuario.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Voltar</a>
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

        <?php if (!$paciente && !isset($_GET['numero_paciente'])): ?>
        document.addEventListener('DOMContentLoaded', () => {
            var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
            myModal.show();
        });
        <?php endif; ?>
    </script>
</body>
</html>