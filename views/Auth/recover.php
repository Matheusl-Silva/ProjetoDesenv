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

    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSucessoLabel">Sucesso!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Uma nova senha foi enviada para seu email. Por favor, verifique sua caixa de entrada.</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-primary">Ir para Login</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalErroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalErroLabel">Erro!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="mensagemErro"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

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
                            <button type="submit" name="reset" class="btn btn-primary col-12 mt-3 mb-2">Enviar</button>
                                <a href="login.php" class="btn btn-outline-secondary col-12">Voltar para a tela de login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/ProjetoDesenv/assets/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const msg = urlParams.get('msg');
            const error = urlParams.get('error');

            if (msg === 'senha_enviada') {
                const modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));
                modalSucesso.show();
            }

            if (error) {
                const modalErro = new bootstrap.Modal(document.getElementById('modalErro'));
                const mensagemErro = document.getElementById('mensagemErro');

                switch(error) {
                    case 'email_error':
                        mensagemErro.textContent = 'Ocorreu um erro ao enviar o email. Por favor, tente novamente.';
                        break;
                    case 'update_error':
                        mensagemErro.textContent = 'Ocorreu um erro ao atualizar a senha. Por favor, tente novamente.';
                        break;
                    case 'user_not_found':
                        mensagemErro.textContent = 'Usuário não encontrado. Verifique se o email está correto.';
                        break;
                    default:
                        mensagemErro.textContent = 'Ocorreu um erro inesperado. Por favor, tente novamente.';
                }

                modalErro.show();
            }
        });
    </script>
</body>
</html>
