<?php
require_once '../database/conexaoClass.php';
require_once '../dao/UsuarioDAO.php';

$db     = new Conexao();
$mysqli = $db->getConexao();

$usuarioDAO = new UsuarioDAO();

$mensagem    = "";
$tipo_alerta = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome          = trim($_POST['nomeUsuario']);
    $email         = trim($_POST['email']);
    $senha         = $_POST['senha'];
    $senhaConfirma = $_POST['senhaConfirma'];

    // Valida se as senhas são iguais
    if (strcmp($senha, $senhaConfirma) !== 0) {
        $mensagem    = "As senhas não conferem! Por favor, digite novamente.";
        $tipo_alerta = "danger";
    } else {
        // Verifica se o email já existe
        $sql_verificar  = "SELECT * FROM usuarios WHERE email = ?";
        $stmt_verificar = $mysqli->prepare($sql_verificar);
        $stmt_verificar->bind_param("s", $email);
        $stmt_verificar->execute();
        $resultado = $stmt_verificar->get_result();

        if ($resultado->num_rows > 0) {
            $mensagem    = "Este e-mail já está cadastrado!";
            $tipo_alerta = "warning";
        } else {
            
            // Executa a query
            $result = $usuarioDAO->cadastrarUsuario($nome, $email, $senha);
            
            if ($result) {
                $mensagem    = "Usuário cadastrado com sucesso!";
                $tipo_alerta = "success";

                // Redireciona após 2 segundos (opcional)
                //header("refresh:2;url=../views/Auth/login.php");
            } else {
                $mensagem    = "Erro ao cadastrar";
                $tipo_alerta = "danger";
            }
        }
        $stmt_verificar->close();
    }
}
$db->fecharConexao();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Cadastro de Usuário</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header bg-body-tertiary text-center">
                        <h2>Usuário Laboratório</h2>
                        <div class="logo-text text-primary">Insira suas informações de cadastro</div>
                    </div>
                    <?php if (!empty($mensagem)): ?>
                    <div class="alert alert-<?php echo $tipo_alerta; ?> alert-dismissible fade show" role="alert">
                        <?php echo $mensagem; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <div class="card-body bg-body-tertiary">
                        <form action="cadastro.php" method="POST" onsubmit="return validarSenha()">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nomeCompleto" class="form-label">Nome Completo: <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control mb-2" name="nomeUsuario" id="nomeUsuario" placeholder="Insira seu nome completo" required>
                                </div>
                            <div class="row">
                            </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail: <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Insira um e-mail válido" required>
                                </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="senha" class="form-label">Senha: <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control mb-2" name="senha"id="senha" placeholder="Insira sua senha" required minlength="8">
                                </div>
                                <div class="form-group col">
                                    <label for="senhaConfirma" class="form-label">Confirmar senha: <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control mb-2" name="senhaConfirma" id="senhaConfirma" required minlength="8">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-12 mt-3 mb-2 ">Cadastrar Usuario</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="../index.html">Voltar para a tela inicial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/script.js"></script>

</html>
