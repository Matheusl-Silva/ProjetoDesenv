<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/patient-list.css">
    <title>Lista de Pacientes</title>
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
                    <p><strong>Tem certeza que deseja excluir este paciente?</strong></p>
                    <p class="text-muted">Esta ação não pode ser desfeita.</p>
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
                <div class="card patient-list-card">
                    <div class="card-header text-center">
                        <h2>Lista de Pacientes</h2>
                    </div>

                    <div class="card-body">

                        <div class="patients-counter">
                            Total de pacientes: <strong><?=count($listaPacientes)?></strong>
                        </div>


                        <div class="search-section">
                            <div class="row">
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <input type="text" class="form-control search-input" id="searchInput"
                                        placeholder="Buscar por nome, email ou telefone...">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control search-input" id="filterPeriodo">
                                        <option value="">Todos os períodos</option>
                                        <option value="matutino">Matutino</option>
                                        <option value="noturno">Noturno</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table" id="patientsTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <?php if ($auth->isAdmin()): ?>
                                                <th>Nome</th>
                                                <th>Email</th>
                                            <?php endif; ?>
                                            <th>Período</th>
                                            <th>Medicamento</th>
                                            <?php if ($auth->isAdmin()): ?>
                                                <th>CPF</th>
                                                <th>Nascimento</th>
                                                <th>Telefone</th>
                                            <?php endif; ?>
                                            <th>Patologia</th>
                                            <?php if ($auth->isAdmin()): ?>
                                                <th>Ações</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listaPacientes as $paciente): ?>
                                            <tr>
                                                <td><?=$paciente->getId()?></td>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td><strong><?= htmlspecialchars($paciente->getNome()) ?></strong></td>
                                                <?php endif; ?>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td><?=htmlspecialchars($paciente->getEmail())?></td>
                                                <?php endif; ?>
                                                <td>
                                                    <span class="periodo-badge periodo-<?=$paciente->getPeriodo()?>">
                                                        <?=ucfirst($paciente->getPeriodo())?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if ($paciente->getMedicamento()): ?>
                                                        <span class="status-sim" title="<?=htmlspecialchars($paciente->getMedicamento())?>">
                                                            Sim
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="status-nao">Não</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td><?=htmlspecialchars($paciente->getCpf())?></td>
                                                <?php endif; ?>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td>
                                                        <?php
                                                            $dateTime = new DateTime($paciente->getDataNasc());
                                                            echo $dateTime->format('d/m/Y');
                                                        ?>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td><?= htmlspecialchars($paciente->getFone()) ?></td>
                                                <?php endif; ?>
                                                <td>
                                                    <?php if ($paciente->getPatologia()): ?>
                                                        <span class="status-sim" title="<?=htmlspecialchars($paciente->getPatologia())?>">
                                                            Sim
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="status-nao">Não</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if ($auth->isAdmin()): ?>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="/paciente/<?= $paciente->getId() ?>" class="btn btn-primary btn-sm">Editar</a>
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm btn-delete"
                                                                    data-id="<?= $paciente->getId() ?>"
                                                                    data-nome="<?= htmlspecialchars($paciente->getNome()) ?>">
                                                                Excluir
                                                            </button>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>


                            <div id="noResults" style="display: none;" class="no-results">
                                <h5>Nenhum paciente encontrado</h5>
                                <p>Tente ajustar os filtros de busca.</p>
                            </div>


                            <?php if (empty($listaPacientes)): ?>
                                <div class="no-results">
                                    <h4>Nenhum paciente cadastrado</h4>
                                    <p>Comece adicionando o primeiro paciente ao sistema.</p>
                                    <a href="/cadastroPaciente" class="btn btn-primary mt-3">
                                        Cadastrar Primeiro Paciente
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <?php if ($auth->isAdmin()): ?>
                            <a href="/cadastroPaciente" class="btn btn-success">
                                Novo Paciente
                            </a>
                            <?php endif; ?>
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
            const filterPeriodo = document.getElementById('filterPeriodo');
            const table = document.getElementById('patientsTable');
            const tbody = table.querySelector('tbody');
            const noResults = document.getElementById('noResults');

            // Modal de exclusão
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'));
            const btnConfirmar = document.getElementById('btnConfirmarExclusao');

            // Event listeners para botões de exclusão
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const patientId = this.getAttribute('data-id');
                    const patientName = this.getAttribute('data-nome');

                    // Configura o botão de confirmação
                    btnConfirmar.onclick = function() {
                        // Criar form para envio
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/paciente/${patientId}`;
                        form.style.display = 'none';

                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = 'method';
                        methodInput.value = 'DELETE';

                        const submitInput = document.createElement('input');
                        submitInput.type = 'hidden';
                        submitInput.name = 'excluir_paciente';
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
                const periodoFilter = filterPeriodo.value.toLowerCase();
                const rows = tbody.querySelectorAll('tr');
                let visibleRows = 0;

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    const nome = cells[1].textContent.toLowerCase();
                    const email = cells[2].textContent.toLowerCase();
                    const periodo = cells[3].textContent.toLowerCase();
                    const telefone = cells[5].textContent.toLowerCase();

                    const matchesSearch = !searchTerm ||
                        nome.includes(searchTerm) ||
                        email.includes(searchTerm) ||
                        telefone.includes(searchTerm);

                    const matchesPeriodo = !periodoFilter || periodo.includes(periodoFilter);

                    if (matchesSearch && matchesPeriodo) {
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
            }

            // Event listeners para busca e filtro
            if (searchInput) {
                searchInput.addEventListener('input', filterTable);
            }

            if (filterPeriodo) {
                filterPeriodo.addEventListener('change', filterTable);
            }
        });
    </script>
</body>

</html>