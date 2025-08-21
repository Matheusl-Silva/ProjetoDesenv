<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <title>Lista de pacientes</title>
</head>

<body class="bg-info-subtle">

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir este paciente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar Exclusão</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Lista de Pacientes</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Período</th>
                                    <th>Data de nascimento</th>
                                    <th>Telefone</th>
                                    <th>Nome da mãe</th>
                                    <th>Medicamento</th>
                                    <th>Patologia</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaPacientes as $paciente): ?>
                                    <tr>
                                        <td><?= $paciente->getId() ?></td>
                                        <td><?= $paciente->getNome() ?></td>
                                        <td><?= $paciente->getEmail() ?></td>
                                        <td><?= $paciente->getPeriodo() ?></td>
                                        <td><?= $paciente->getDataNasc() ?></td>
                                        <td><?= $paciente->getFone() ?></td>
                                        <td><?= $paciente->getNomeMae() ?></td>
                                        <td><?= $paciente->getMedicamento() ?></td>
                                        <td><?= $paciente->getPatologia() ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="/paciente/<?= $paciente->getId() ?>" class="btn btn-primary btn-sm">Editar</a>
                                                <form action="editarPaciente.php" method="POST" style="display: inline;" id="formExcluir_<?= $paciente->getEmail() ?>">
                                                    <input type="hidden" name="email" value="<?= $paciente->getEmail() ?>">
                                                    <input type="hidden" name="excluir_paciente" value="1">
                                                    <button type="button" class="btn btn-danger btn-sm" style="width: 60px;" onclick='confirmarExclusao(<?= $paciente->getEmail() ?>)'>Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                    <a href="/home" class="btn btn-outline-secondary">Voltar para a tela de usuário</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarExclusao(email) {
            const modal = new bootstrap.Modal(document.getElementById("modalConfirmacao"));
            const btnConfirmar = document.getElementById("btnConfirmarExclusao");

            btnConfirmar.onclick = function() {
                document.getElementById("formExcluir_" + email).submit();
            };

            modal.show();
        }
    </script>
</body>

</html>