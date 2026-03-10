<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/recover.css">
    <title>Recuperação de senha</title>
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
        .form-control.is-valid-custom {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
        }
        .form-control.is-invalid-custom {
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
<body class="bg-info-subtle">

    <!-- Modal de Sucesso -->
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalSucessoLabel">✅ Sucesso!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Uma nova senha provisória foi enviada para seu e-mail. Por favor, verifique sua caixa de entrada (e a pasta de spam).</p>
                </div>
                <div class="modal-footer">
                    <a href="/login" class="btn btn-primary">Ir para Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Erro -->
    <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalErroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalErroLabel">❌ Erro!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <div class="logo-text text-primary">Insira seu e-mail para recuperação de senha</div>
                    </div>
                    <div class="card-body bg-body-tertiary">
                        <form action="/recover" method="post" id="formRecover" novalidate>
                            <div class="form-group" id="texto">
                                <span>Insira seu e-mail institucional. Enviaremos uma senha provisória para o endereço cadastrado.</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email" class="form-label">E-mail: <span style="color: red;">*</span></label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-control" 
                                    placeholder="exemplo@email.com" 
                                    required
                                    autocomplete="email"
                                >
                                <div class="email-validation-feedback" id="emailFeedback">
                                    <span id="emailFeedbackText"></span>
                                </div>
                            </div>
                            <button type="submit" name="reset" class="btn btn-primary col-12 mt-3 mb-2 btn-submit-recover" id="btnSubmit" disabled>
                                <span id="btnText">Enviar</span>
                                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                            <a href="/login" class="btn btn-outline-secondary col-12">Voltar para a tela de login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
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
                    emailFeedbackText.textContent = '✗ Formato de e-mail inválido (ex: usuario@dominio.com)';
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
                btnText.textContent = 'Enviando...';
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
