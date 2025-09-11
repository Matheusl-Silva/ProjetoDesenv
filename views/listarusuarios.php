<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/user-list.css">
    <title>Lista de Usuários</title>
</head>

<body>
    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Tem certeza que deseja excluir este usuário?</strong></p>
                    <p class="text-muted">Esta ação não pode ser desfeita e removerá permanentemente o acesso do usuário ao sistema.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar Exclusão</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container main-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card user-list-card">
                    <div class="card-header text-center">
                        <h2>Gerenciar Usuários</h2>
                    </div>

                    <div class="card-body">
                        <!-- Contador de usuários -->
                        <div class="users-counter">
                            Total de usuários: <strong><?=count($listaUsuarios)?></strong>
                        </div>

                        <!-- Seção de busca -->
                        <div class="search-section">
                            <div class="row">
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <input type="text" class="form-control search-input" id="searchInput"
                                           placeholder="Buscar por nome ou email...">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control search-input" id="filterAdmin">
                                        <option value="">Todos os tipos</option>
                                        <option value="sim">Administradores</option>
                                        <option value="nao">Usuários comuns</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table" id="usersTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Tipo</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listaUsuarios as $usuario): ?>
                                            <tr>
                                                <td><?=$usuario->getId()?></td>
                                                <td><strong><?=htmlspecialchars($usuario->getNome())?></strong></td>
                                                <td><?=htmlspecialchars($usuario->getEmail())?></td>
                                                <td>
                                                    <?php if ($usuario->getAdmin() === 'S'): ?>
                                                        <span class="admin-badge admin-sim">Administrador</span>
                                                    <?php else: ?>
                                                        <span class="admin-badge admin-nao">Usuário</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <a href="/usuario/<?=$usuario->getId()?>"
                                                           class="btn btn-primary btn-sm"
                                                           title="Editar usuário">
                                                            Editar
                                                        </a>
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm btn-delete"
                                                                data-id="<?=$usuario->getId()?>"
                                                                data-nome="<?=htmlspecialchars($usuario->getNome())?>"
                                                                data-email="<?=htmlspecialchars($usuario->getEmail())?>"
                                                                title="Excluir usuário">
                                                            Excluir
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mensagem quando não há resultados -->
                            <div id="noResults" style="display: none;" class="no-results">
                                <h5>Nenhum usuário encontrado</h5>
                                <p>Tente ajustar os filtros de busca.</p>
                            </div>

                            <!-- Mensagem quando não há usuários cadastrados -->
                            <?php if (empty($listaUsuarios)): ?>
                                <div class="no-results">
                                    <h4>Nenhum usuário cadastrado</h4>
                                    <p>Comece adicionando o primeiro usuário ao sistema.</p>
                                    <a href="/usuario/novo" class="btn btn-primary mt-3">
                                        Cadastrar Primeiro Usuário
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="/usuario/novo" class="btn btn-success">
                                Novo Usuário
                            </a>
                            <a href="/home" class="btn btn-outline-secondary">
                                Voltar para a tela de usuário
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos
            const searchInput = document.getElementById('searchInput');
            const filterAdmin = document.getElementById('filterAdmin');
            const table = document.getElementById('usersTable');
            const tbody = table.querySelector('tbody');
            const noResults = document.getElementById('noResults');

            // Modal de exclusão
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'));
            const btnConfirmar = document.getElementById('btnConfirmarExclusao');

            // Event listeners para botões de exclusão
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    const userName = this.getAttribute('data-nome');
                    const userEmail = this.getAttribute('data-email');

                    // Atualiza o modal com informações do usuário
                    const modalBody = document.querySelector('#modalConfirmacao .modal-body');
                    modalBody.innerHTML = `
                        <p><strong>Tem certeza que deseja excluir este usuário?</strong></p>
                        <div class="alert alert-warning">
                            <strong>Usuário:</strong> ${userName}<br>
                            <strong>Email:</strong> ${userEmail}<br>
                            <strong>ID:</strong> ${userId}
                        </div>
                        <p class="text-muted">Esta ação não pode ser desfeita e removerá permanentemente o acesso do usuário ao sistema.</p>
                    `;

                    // Configura o botão de confirmação
                    btnConfirmar.onclick = function() {
                        // Criar form para envio
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/usuario/${userId}`;
                        form.style.display = 'none';

                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = 'method';
                        methodInput.value = 'DELETE';

                        const submitInput = document.createElement('input');
                        submitInput.type = 'hidden';
                        submitInput.name = 'excluir_usuario';
                        submitInput.value = '1';

                        form.appendChild(methodInput);
                        form.appendChild(submitInput);
                        document.body.appendChild(form);
                        form.submit();
                    };

                    modal.show();
                });
            });

            // Função de busca e filtro
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const adminFilter = filterAdmin.value.toLowerCase();
                const rows = tbody.querySelectorAll('tr');
                let visibleRows = 0;

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    const nome = cells[1].textContent.toLowerCase();
                    const email = cells[2].textContent.toLowerCase();
                    const tipo = cells[3].textContent.toLowerCase();

                    const matchesSearch = !searchTerm ||
                        nome.includes(searchTerm) ||
                        email.includes(searchTerm);

                    let matchesAdmin = true;
                    if (adminFilter === 'sim') {
                        matchesAdmin = tipo.includes('administrador');
                    } else if (adminFilter === 'nao') {
                        matchesAdmin = tipo.includes('usuário') && !tipo.includes('administrador');
                    }

                    if (matchesSearch && matchesAdmin) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Mostrar/ocultar mensagem de "nenhum resultado"
                if (visibleRows === 0 && rows.length > 0) {
                    table.style.display = 'none';
                    noResults.style.display = 'block';
                } else {
                    table.style.display = '';
                    noResults.style.display = 'none';
                }

                // Atualizar contador
                const counter = document.querySelector('.users-counter strong');
                if (counter) {
                    counter.textContent = visibleRows;
                }
            }

            // Event listeners para busca e filtro
            if (searchInput) {
                searchInput.addEventListener('input', filterTable);
            }

            if (filterAdmin) {
                filterAdmin.addEventListener('change', filterTable);
            }

            // Destacar administradores
            document.querySelectorAll('.admin-sim').forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });
                badge.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>

</html>