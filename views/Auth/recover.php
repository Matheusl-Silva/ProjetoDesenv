<?php
require_once '../../models/PessoaModel.php';
require_once '../../models/UsuarioModel.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoDesenv/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ProjetoDesenv/assets/css/recover.css">
    <title>Recuperação de senha</title>
</head>
<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header bg-body-tertiary text-center">
                        <h2>Recuperar senha</h2>
                        <div class="logo-text text-primary">Insira seu email para recuperação de senha</div>
                    </div>
                    <div class="card-body bg-body-tertiary">
                        <form action="../../models/UsuarioModel.php" method="post">
                            <div class="form-group" id="texto">
                                <span>Insira seu email, enviaremos um link para a alteração da senha.</span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail: <span style="color: red;">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Insira seu e-mail" required>
                            </div>
                            <button type="submit" name = "reset" class="btn btn-primary col-12 mt-3 mb-2">Enviar</button>
                            <div class="card-footer bg-body-tertiary justify-content-center text-center ">
                                <a href="login.php">Voltar para a tela de login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
