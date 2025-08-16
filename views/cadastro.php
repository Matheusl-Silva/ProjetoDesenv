<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($tipo_alerta === 'success'): ?>
        <meta http-equiv="refresh" content="1;url=/login">
    <?php endif; ?>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
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
                        <form action="/usuario" method="POST" onsubmit="return validarSenha()">
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
                                        <div class="input-group mb-2">
                                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua senha" required minlength="8">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <label for="senhaConfirma" class="form-label">Confirmar senha: <span style="color: red;">*</span></label>
                                        <div class="input-group mb-2">
                                            <input type="password" class="form-control" name="senhaConfirma" id="senhaConfirma" required minlength="8">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleSenhas" tabindex="0" aria-label="Mostrar senhas" title="Mostrar senhas">
                                                <span id="iconSenhas" class="bi bi-eye"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-12 mt-3 mb-2 ">Cadastrar Usuario</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="/">Voltar para a tela inicial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const senhaInput = document.getElementById('senha');
        const senhaConfirmaInput = document.getElementById('senhaConfirma');
        const toggleBtn = document.getElementById('toggleSenhas');
        const iconSenhas = document.getElementById('iconSenhas');
        if (toggleBtn && senhaInput && senhaConfirmaInput) {
            toggleBtn.addEventListener('click', function() {
                const mostrar = senhaInput.type === 'password' || senhaConfirmaInput.type === 'password';
                senhaInput.type = mostrar ? 'text' : 'password';
                senhaConfirmaInput.type = mostrar ? 'text' : 'password';
                if (mostrar) {
                    if (iconSenhas) iconSenhas.className = 'bi bi-eye-slash';
                    toggleBtn.setAttribute('title', 'Ocultar senhas');
                    toggleBtn.setAttribute('aria-label', 'Ocultar senhas');
                } else {
                    if (iconSenhas) iconSenhas.className = 'bi bi-eye';
                    toggleBtn.setAttribute('title', 'Mostrar senhas');
                    toggleBtn.setAttribute('aria-label', 'Mostrar senhas');
                }
            });
        }
    });
</script>

</html>