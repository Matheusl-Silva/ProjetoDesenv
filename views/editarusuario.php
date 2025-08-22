<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <title>Editar Usuário</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Editar Usuário</h2>
                </div>
                <div class="card-body bg-body-tertiary">
                    <form action="editarUsuario.php" method="POST">
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nomeCompleto" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nomeUsuario" id="nomeUsuario"
                                    placeholder="Insira seu nome completo" value="<?= $usuario->getNome() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    placeholder="Insira um e-mail válido" value="<?= $usuario->getEmail() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="senha" class="form-label">Senha Atual:</label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="senha" id="senha" value="<?= $usuario->getSenha() ?>">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleSenha" tabindex="0" aria-label="Mostrar senha" title="Mostrar senha">
                                        <span id="iconSenha" class="bi bi-eye"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="admin" class="form-label">Administrador:</label>
                                <select class="form-select mb-2" name="admin" id="admin">
                                    <option value="N" <?php if ($usuario->getAdmin() === 'N') echo 'selected' ?>>Não</option>
                                    <option value="S" <?php if ($usuario->getAdmin() === 'S') echo 'selected' ?>>Sim</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="atualizar_usuario" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                    <a href="/usuario" class="me-3 btn btn-outline-secondary">Voltar para a lista</a>
                    <a href="/home" class="btn btn-outline-secondary">Voltar para a tela de usuário</a>
                </div>

            </div>
        </div>
    </div>

</body>
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

</html>