<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/assets/css/login.css?v=<?php echo time(); ?>">
  <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
  <title>Portal de Saúde Positivo - Login</title>
</head>

<body>

  <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
        <div class="modal-header bg-danger text-white border-0" style="border-radius: 16px 16px 0 0;">
          <h5 class="modal-title fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Login inválido!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 text-center">
          <p class="fs-5 mb-0 text-muted">O email ou a senha estão incorretos! Por favor, tente novamente ou redefina a sua senha.</p>
        </div>
        <div class="modal-footer border-0 justify-content-center pb-4">
          <a href="/recover" class="btn btn-outline-secondary px-4 rounded-pill">Redefinir Senha</a>
          <button type="button" class="btn btn-danger px-4 rounded-pill" data-bs-dismiss="modal">Tentar Novamente</button>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-shape shape1"></div>
  <div class="bg-shape shape2"></div>
  <div class="bg-shape shape3"></div>

  <div class="container d-flex justify-content-center align-items-center vh-100 position-relative z-3">
    <div class="login-card w-100">
      <div class="text-center mb-4">
        <div class="logo-circle mx-auto mb-3">
          <i class="bi bi-heart-pulse-fill text-primary fs-2"></i>
        </div>
        <h2 class="brand-title">Portal Positivo</h2>
        <p class="brand-subtitle">Acesso seguro aos seus dados de saúde</p>
      </div>

      <form action="/login" method="POST">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com" required>
          <label for="email"><i class="bi bi-envelope me-2 text-secondary"></i>Email</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
          <label for="senha"><i class="bi bi-lock me-2 text-secondary"></i>Senha</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 px-1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="lembrarMim">
            <label class="form-check-label text-secondary small" for="lembrarMim">
              Lembrar-me
            </label>
          </div>
          <a href="/recover" class="text-decoration-none fw-semibold small text-primary hover-link">Esqueceu a senha?</a>
        </div>

        <button type="submit" class="btn btn-login mb-3 w-100">
          Entrar na Plataforma
        </button>
        
        <a href="/" class="btn btn-outline-secondary w-100 btn-back">
          <i class="bi bi-arrow-left me-2"></i>Voltar para o início
        </a>
      </form>
    </div>
  </div>

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script>
    const loginInvalido = <?php echo isset($loginInvalido) && $loginInvalido ? 'true' : 'false'; ?>;
    
    if(loginInvalido){
      document.addEventListener("DOMContentLoaded", function() {
        if(typeof bootstrap !== 'undefined') {
          const modalElt = document.getElementById("modal");
          if(modalElt) {
            const modal = new bootstrap.Modal(modalElt);
            modal.show();
          }
        }
      });
    }
  </script>
</body>
</html>