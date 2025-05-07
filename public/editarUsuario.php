<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$nome_usuario = $auth->getNomeUsuario();

$mensagem = '';
$usuario  = null;

if (isset($_POST['buscar_usuario']) && !empty($_POST['email'])) {
    $email = $mysqli->real_escape_string($_POST['email']);

    // Consulta para buscar o paciente pelo ID
    $sql       = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        $mensagem = "Usuario não encontrado.";
    }
}

if (isset($_POST['atualizar_usuario'])) {

    $nome  = $mysqli->real_escape_string($_POST['nomeUsuario']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = "UPDATE usuarios SET
            nome = '$nome',
            email = '$email',
            senha = '$senha'
            WHERE email = '$email'";

    if ($mysqli->query($sql)) {
        $mensagem = "Usuario atualizado com sucesso!";

        $sql       = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $mysqli->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            header("refresh:2;url=homeUsuario.php");
        }
    } else {
        $mensagem = "Erro ao atualizar usuario: " . $mysqli->error;
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

        <div class="modal fade" id="pesquisaModal" tabindex="-1" aria-labelledby="pesquisaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pesquisaModalLabel">Pesquisar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="editarUsuario.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email do usuario:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="buscar_usuario" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Editar Usuario</h2>
                </div>

                <?php if (!empty($mensagem)): ?>
                <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>

                <?php if (!$usuario): ?>

                <div class="d-grid gap-2 mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                        Pesquisar Usuario
                    </button>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                    <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                </div>
                <?php else: ?>

                    <div class="card-body bg-body-tertiary">
                        <form action="editarUsuario.php" method="POST">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nomeCompleto" class="form-label">Nome Completo:</label>
                                    <input type="text" class="form-control mb-2" name="nomeUsuario" id="nomeUsuario" placeholder="Insira seu nome completo" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail:</label>
                                    <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Insira um e-mail válido" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="senha" class="form-label">Nova senha:</label>
                                    <input type="password" class="form-control mb-2" name="senha"id="senha" value="<?php echo htmlspecialchars($usuario['senha']); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="atualizar_usuario" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                            </div>

                        </form>
                    </div>

                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarUsuario.php">Selecionar outro Usuario</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        <?php if (!$usuario && !isset($_POST['buscar_usuario'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
            myModal.show();
        });
        <?php endif; ?>
        src="../js/script.js"
    </script>
</body>
</html>