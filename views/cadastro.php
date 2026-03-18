<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($tipo_alerta) && $tipo_alerta === 'success'): ?>
        <meta http-equiv="refresh" content="1;url=/login">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/login.css?v=<?php echo time(); ?>">
    <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
    <title>Portal de Saúde Positivo - Cadastro</title>
</head>

<body>
    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>
    <div class="bg-shape shape3"></div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100 position-relative z-3 py-5">
        <div class="login-card w-100" style="max-width: 550px;">
            <div class="text-center mb-4">
                <div class="logo-circle mx-auto mb-3">
                    <i class="bi bi-person-plus-fill text-primary fs-2"></i>
                </div>
                <h2 class="brand-title">Criar Conta</h2>
                <p class="brand-subtitle">Insira suas informações de cadastro</p>
            </div>

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-<?php echo htmlspecialchars($tipo_alerta); ?> alert-dismissible fade show border-0 shadow-sm" style="border-radius: 12px;" role="alert">
                    <i class="bi <?php echo $tipo_alerta === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'; ?> me-2"></i>
                    <?php echo $mensagem; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="/usuario" method="POST" onsubmit="return validarSenha()">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Insira seu nome completo" required>
                    <label for="nomeUsuario"><i class="bi bi-person me-2 text-secondary"></i>Nome Completo</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Insira um e-mail válido" required>
                    <label for="email"><i class="bi bi-envelope me-2 text-secondary"></i>E-mail</label>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required minlength="8">
                            <label for="senha"><i class="bi bi-lock me-2 text-secondary"></i>Senha</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating position-relative">
                            <input type="password" class="form-control" name="senhaConfirma" id="senhaConfirma" placeholder="Confirmar" required minlength="8">
                            <label for="senhaConfirma"><i class="bi bi-check2-all me-2 text-secondary"></i>Confirmar Senha</label>
                            <button class="btn btn-sm btn-link position-absolute end-0 top-50 translate-middle-y text-secondary me-2 hover-link p-0" type="button" id="toggleSenhas" tabindex="0" title="Mostrar senhas" style="text-decoration: none;">
                                <i id="iconSenhas" class="bi bi-eye fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">
                    <i class="bi bi-person-plus me-2"></i>Cadastrar
                </button>
                <a href="/login" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-left me-2"></i>Voltar para o Login
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const senhaInput = document.getElementById('senha');
            const senhaConfirmaInput = document.getElementById('senhaConfirma');
            const toggleBtn = document.getElementById('toggleSenhas');
            const iconSenhas = document.getElementById('iconSenhas');
            
            if (toggleBtn && senhaInput && senhaConfirmaInput) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const mostrar = senhaInput.type === 'password' || senhaConfirmaInput.type === 'password';
                    senhaInput.type = mostrar ? 'text' : 'password';
                    senhaConfirmaInput.type = mostrar ? 'text' : 'password';
                    
                    if (mostrar) {
                        if (iconSenhas) iconSenhas.className = 'bi bi-eye-slash fs-5 text-primary';
                        toggleBtn.setAttribute('title', 'Ocultar senhas');
                    } else {
                        if (iconSenhas) iconSenhas.className = 'bi bi-eye fs-5 text-secondary';
                        toggleBtn.setAttribute('title', 'Mostrar senhas');
                    }
                });
            }
        });
    </script>
</body>

</html>