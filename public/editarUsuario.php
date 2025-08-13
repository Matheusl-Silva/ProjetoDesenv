<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../models/PessoaModel.php';
require_once '../models/UsuarioModel.php';
require_once '../dao/UsuarioDAO.php';
require_once '../views/UsuarioView.php';

$auth = new Autenticacao();
$auth->verificarLogin();
$auth->verificarAcessoAdmin();
$nome_usuario = $auth->getNomeUsuario();
$usuarioObj   = new UsuarioDAO();
$mensagem     = '';
$usuario      = null;

if (isset($_POST['buscar_usuario']) && !empty($_POST['email'])) {
    $email    = $_POST['email'];
    $usuarios = $usuarioObj->listarUsuarios();

    foreach ($usuarios as $user) {
        if ($user['email'] === $email) {
            $usuario = $user;
            break;
        }
    }

    if (!$usuario) {
        $mensagem = "Usuário não encontrado.";
    }
}

if (isset($_POST['excluir_usuario']) && !empty($_POST['email'])) {
    if ($usuarioObj->excluirUsuario($_POST['email'])) {
        $mensagem = "Usuário excluído com sucesso!";
        header("refresh:2;url=editarUsuario.php");
    } else {
        $mensagem = "Erro ao excluir usuário.";
    }
}

if (isset($_POST['atualizar_usuario'])) {
    $id    = $_POST['id'];
    $nome  = $_POST['nomeUsuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $admin = $_POST['admin'];

    if ($usuarioObj->atualizarUsuario($id, $nome, $email, $senha, $admin)) {
        $mensagem = "Usuário atualizado com sucesso!";
        header("refresh:2;url=editarUsuario.php");
    } else {
        $mensagem = "Erro ao atualizar usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/cadastropaciente.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
    <title>Editar Usuario</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Gerenciar Usuários</h2>
                </div>

                <!--Gera a mensagem no topo se $mensagem não for vazio-->
                <?php if (!empty($mensagem)): ?>
                <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>

                <!--Decide se gera a tabela com usuários ou o formulário para edição-->
                <?php if (!$usuario): ?>
                    <?php echo UsuarioView::renderizarTabelaUsuarios(); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php else: ?>
                    <?php echo UsuarioView::renderizarFormularioEdicao($usuario); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarUsuario.php" class="me-3">Voltar para a lista</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const senhaInput = document.getElementById('senha');
        const toggleBtn = document.getElementById('toggleSenha');
        const iconSenha = document.getElementById('iconSenha');

        if (toggleBtn && senhaInput) {
            toggleBtn.addEventListener('click', function() {
                if (senhaInput.type === 'password') {
                    senhaInput.type = 'text';
                    if (iconSenha) iconSenha.className = 'bi bi-eye-slash';
                    toggleBtn.setAttribute('title', 'Ocultar senha');
                    toggleBtn.setAttribute('aria-label', 'Ocultar senha');
                } else {
                    senhaInput.type = 'password';
                    if (iconSenha) iconSenha.className = 'bi bi-eye';
                    toggleBtn.setAttribute('title', 'Mostrar senha');
                    toggleBtn.setAttribute('aria-label', 'Mostrar senha');
                }
            });
        }
    });
    </script>
</body>
</html>