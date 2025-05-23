<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../models/PessoaClass.php';
require_once '../models/UsuarioClass.php';

$auth = new Autenticacao();
$auth->verificarLogin();
$auth->verificarAcessoAdmin();
$nome_usuario = $auth->getNomeUsuario();

$usuarioObj = new Usuario();
$mensagem   = '';
$usuario    = null;

if (isset($_POST['buscar_usuario']) && !empty($_POST['email'])) {
    $usuario = $usuarioObj->buscarUsuarioPorEmail($_POST['email']);
    if (!$usuario) {
        $mensagem = "Usuario não encontrado.";
    }
}

if (isset($_POST['atualizar_usuario'])) {
    $nome  = $_POST['nomeUsuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $admin = $_POST['admin'];

    if ($usuarioObj->atualizarUsuario($nome, $email, $senha, $admin)) {
        $mensagem = "Usuario atualizado com sucesso!";
        header("refresh:2;url=editarUsuario.php");
    } else {
        $mensagem = "Erro ao atualizar usuario.";
    }
}

if (isset($_POST['excluir_usuario'])) {
    if ($usuarioObj->excluirUsuario($_POST['email'])) {
        $mensagem = "Usuario excluído com sucesso!";
        header("refresh:2;url=editarUsuario.php");
    } else {
        $mensagem = "Erro ao excluir usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastropaciente.css">
    <title>Editar Usuario</title>
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
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php else: ?>
                    <?php echo $usuarioObj->renderizarFormularioEdicao($usuario); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarUsuario.php" class="me-3">Voltar para a lista</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>