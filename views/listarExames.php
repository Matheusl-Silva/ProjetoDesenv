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
    <?php if ($auth->isAdmin()): ?>
        <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tem certeza que deseja excluir este exame?</strong></p>
                        <p class="text-muted">Esta ação não pode ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="/exame" method="post" style="display: inline">
                            <input type="hidden" name="method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

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
                        <div class="modal-header <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'bg-success text-white' : 'bg-danger text-white'; ?>">
                            <h5 class="modal-title">
                                <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'Sucesso' : 'Aviso'; ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body"><?php echo htmlspecialchars($mensagem); ?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                                <i class="bi bi-search me-1"></i>Nova Pesquisa
                            </button>
                            <a href="/home" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Voltar ao Início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Modal específico para paciente não encontrado -->
        <?php if (isset($_GET['paciente']) && !$paciente && empty($mensagem)): ?>
            <div class="modal fade" id="pacienteNaoEncontradoModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title">
                                <i class="bi bi-exclamation-triangle me-2"></i>Paciente não encontrado
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-3">O paciente com o número <strong><?php echo htmlspecialchars($_GET['paciente']); ?></strong> não foi encontrado no sistema.</p>
                            <p class="text-muted mb-0">Verifique se o número foi digitado corretamente e tente novamente.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" onclick="abrirModalPesquisa()">
                                <i class="bi bi-search me-1"></i>Nova Pesquisa
                            </button>
                            <a href="/home" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Voltar ao Início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!$paciente && !isset($_GET['paciente'])): ?>
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
        <?php elseif (!$paciente && isset($_GET['paciente'])): ?>
            <!-- Paciente não encontrado - tela alternativa se não usar modal -->
            <div class="d-flex align-items-center justify-content-center">
                <div class="action-card p-5 text-center shadow border-warning">
                    <div class="text-warning mb-3">
                        <i class="bi bi-exclamation-triangle" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="mb-3 text-warning">Paciente não encontrado</h2>
                    <p class="text-muted mb-4">
                        O paciente com o número <strong><?php echo htmlspecialchars($_GET['paciente']); ?></strong> não foi encontrado no sistema.
                        <br>Verifique se o número foi digitado corretamente.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                            <i class="bi bi-search me-1"></i>Nova Pesquisa
                        </button>
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


                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Histórico de Exames</h5>
                    <a href="/exames/novo/<?php echo $paciente->getId(); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Incluir Exame
                    </a>
                </div>

                <?php if (!empty($exames)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm align-middle">
                            </table>
                    </div>
                <?php else: ?>
                    <div class="text-center p-4 border rounded mt-4">
                        <p class="text-muted mb-0">Nenhum exame encontrado para este paciente.</p>
                        <p class="text-muted">Clique em "Incluir Exame" para adicionar o primeiro.</p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($exames)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Preceptor</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($exames as $exame): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($exame->getId()); ?></td>
                                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($exame->getData()))); ?></td>
                                        <td>
                                            <?php
$tipoExame = $exame->getTipo();
if ($tipoExame === 'hematologia'):
?>
                                                <span class="badge bg-primary">Hematologia</span>
                                            <?php elseif ($tipoExame === 'bioquimica'): ?>
                                                <span class="badge bg-success">Bioquímica</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">N/A</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo isset($preceptores_map[$exame->getPreceptor()]) ? htmlspecialchars($preceptores_map[$exame->getPreceptor()]) : 'Preceptor: ' . $exame->getPreceptor(); ?></td>
                                        <td>
                                            <?php
$tipoExame = $exame->getTipo();
if ($tipoExame === 'hematologia'):
?>
                                                <a href="/exameHemato/listar/<?php echo $exame->getId(); ?>" class="btn btn-sm btn-info">Visualizar</a>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalConfirmacao" data-id="<?=$exame->getId()?>" data-tipo="Hemato" class="btn btn-sm btn-danger">Excluir</button>
                                            <?php elseif ($tipoExame === 'bioquimica'): ?>
                                                <a href="/exameBio/listar/<?php echo $exame->getId(); ?>" class="btn btn-sm btn-info">Visualizar</a>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalConfirmacao" data-id="<?=$exame->getId()?>" data-tipo="Bio" class="btn btn-sm btn-danger">Excluir</button>
                                            <?php endif; ?>
                                            <?php if ($auth->isAdmin()): ?>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif?>
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

        <?php if (isset($_GET['paciente']) && !$paciente && empty($mensagem)): ?>
            document.addEventListener('DOMContentLoaded', () => {
                var pacienteNaoEncontradoModal = new bootstrap.Modal(document.getElementById('pacienteNaoEncontradoModal'));
                pacienteNaoEncontradoModal.show();
            });
        <?php endif; ?>

        //Modal de confirmação de exclusão
        document.addEventListener('DOMContentLoaded', () => {
            const modalExcluir = document.getElementById('modalConfirmacao');
            modalExcluir.addEventListener('show.bs.modal', function() {
                const botao = event.relatedTarget;
                const idExame = botao.getAttribute('data-id');
                const tipoExame = botao.getAttribute('data-tipo');
                const form = modalExcluir.querySelector('form');
                form.action = form.action + tipoExame + '/' + idExame;
            });
        })

        // Limpar campo de pesquisa quando modal for aberto
        document.getElementById('pesquisaModal').addEventListener('shown.bs.modal', function() {
            document.getElementById('paciente').value = '';
            document.getElementById('paciente').focus();
        });
    </script>
</body>

</html>