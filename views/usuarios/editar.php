<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/cadastropaciente.css">
    <title>Editar Usuário</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Gerenciar Usuários</h2>
                </div>

                <?php if (!empty($mensagem)): ?>
                <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>

                <?php if (!$usuario): ?>
                    <?php echo $usuarioObj->renderizarTabelaUsuarios(); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="index.php?controller=usuarios&action=index">Voltar para a tela de usuário</a>
                    </div>
                <?php else: ?>
                    <?php echo $usuarioObj->renderizarFormularioEdicao($usuario); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="index.php?controller=usuarios&action=editar" class="me-3">Voltar para a lista</a>
                        <a href="index.php?controller=usuarios&action=index">Voltar para a tela de usuário</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>