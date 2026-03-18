<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/login.css?v=<?php echo time(); ?>">
    <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
    <title>Portal de Saúde Positivo - Recuperação de Senha</title>
    <style>
        .email-validation-feedback {
            font-size: 0.85rem;
            margin-top: 4px;
            display: none;
        }
        .email-validation-feedback.show {
            display: block;
        }
        .email-validation-feedback.valid {
            color: #198754;
        }
        .email-validation-feedback.invalid {
            color: #dc3545;
        }
        .form-floating > .form-control.is-valid-custom {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
        }
        .form-floating > .form-control.is-invalid-custom {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }
        .btn-submit-recover:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
        }
    </style>
</head>
<body>

    <!-- Modal de Sucesso -->
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header bg-success text-white border-0" style="border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold" id="modalSucessoLabel"><i class="bi bi-check-circle-fill me-2"></i>Sucesso!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <p class="fs-5 mb-0 text-muted">Uma nova senha provisória foi enviada para seu e-mail. Por favor, verifique sua caixa de entrada (e a pasta de spam).</p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <a href="/login" class="btn btn-success px-4 rounded-pill">Ir para o Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Erro -->
    <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalErroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header bg-danger text-white border-0" style="border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title fw-bold" id="modalErroLabel"><i class="bi bi-exclamation-triangle-fill me-2"></i>Erro!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <p class="fs-5 mb-0 text-muted" id="mensagemErro"></p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>
    <div class="bg-shape shape3"></div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100 position-relative z-3 py-5">
        <div class="login-card w-100">
            <div class="text-center mb-4">
                <div class="logo-circle mx-auto mb-3">
                    <i class="bi bi-shield-lock-fill text-primary fs-2"></i>
                </div>
                <h2 class="brand-title">Recuperar Senha</h2>
                <p class="brand-subtitle">Insira seu e-mail para recuperação</p>
            </div>

            <form action="/recover" method="post" id="formRecover" novalidate>
                <p class="text-secondary small text-center mb-4">
                    Enviaremos uma senha provisória para o endereço cadastrado.
                </p>

                <div class="form-floating mb-4">
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="exemplo@email.com" 
                        required
                        autocomplete="email"
                    >
                    <label for="email"><i class="bi bi-envelope me-2 text-secondary"></i>E-mail Institucional</label>
                    <div class="email-validation-feedback ps-1" id="emailFeedback">
                        <span id="emailFeedbackText"></span>
                    </div>
                </div>

                <button type="submit" name="reset" class="btn btn-login w-100 mb-3 btn-submit-recover" id="btnSubmit" disabled>
                    <span id="btnText"><i class="bi bi-send me-2"></i>Enviar Senha</span>
                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
                <a href="/login" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-left me-2"></i>Voltar para o Login
                </a>
            </form>
        </div>
    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            const emailFeedback = document.getElementById('emailFeedback');
            const emailFeedbackText = document.getElementById('emailFeedbackText');
            const btnSubmit = document.getElementById('btnSubmit');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const form = document.getElementById('formRecover');

            // Padrão de e-mail que aceita domínios comuns
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Validação em tempo real do e-mail
            emailInput.addEventListener('input', function() {
                const email = this.value.trim();
                
                if (email.length === 0) {
                    // Campo vazio
                    emailInput.classList.remove('is-valid-custom', 'is-invalid-custom');
                    emailFeedback.classList.remove('show', 'valid', 'invalid');
                    btnSubmit.disabled = true;
                    return;
                }

                if (emailPattern.test(email)) {
                    // E-mail válido
                    emailInput.classList.remove('is-invalid-custom');
                    emailInput.classList.add('is-valid-custom');
                    emailFeedback.classList.remove('invalid');
                    emailFeedback.classList.add('show', 'valid');
                    emailFeedbackText.textContent = '✓ Formato de e-mail válido';
                    btnSubmit.disabled = false;
                } else {
                    // E-mail inválido
                    emailInput.classList.remove('is-valid-custom');
                    emailInput.classList.add('is-invalid-custom');
                    emailFeedback.classList.remove('valid');
                    emailFeedback.classList.add('show', 'invalid');
                    emailFeedbackText.textContent = '✗ Formato inválido (ex: usuario@dominio.com)';
                    btnSubmit.disabled = true;
                }
            });

            // Feedback visual ao enviar
            form.addEventListener('submit', function(e) {
                const email = emailInput.value.trim();
                
                if (!emailPattern.test(email)) {
                    e.preventDefault();
                    emailInput.classList.add('is-invalid-custom');
                    emailFeedback.classList.add('show', 'invalid');
                    emailFeedbackText.textContent = '✗ Por favor, insira um e-mail válido';
                    return;
                }

                // Mostra spinner no botão
                btnText.innerHTML = 'Enviando...';
                btnSpinner.classList.remove('d-none');
                btnSubmit.disabled = true;
            });

            // Mostrar modais conforme parâmetros da URL
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
                    case 'invalid_email':
                        mensagemErro.textContent = 'O formato do e-mail informado é inválido. Por favor, verifique e tente novamente.';
                        break;
                    case 'email_error':
                        mensagemErro.textContent = 'Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.';
                        break;
                    case 'update_error':
                        mensagemErro.textContent = 'Ocorreu um erro ao atualizar a senha. Por favor, tente novamente.';
                        break;
                    case 'user_not_found':
                        mensagemErro.textContent = 'Nenhum usuário encontrado com este e-mail. Verifique se o e-mail está correto.';
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
