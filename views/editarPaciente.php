<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <title>Editar Paciente</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Editar Paciente</h2>
                </div>
                <?php if (isset($_SESSION["flash"])): ?>
                    <div class="alert alert-<?= $_SESSION["flash"]["tipo"] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION["flash"]["mensagem"] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card-body bg-body-tertiary">
                    <form action="/paciente/<?= $paciente->getId() ?>" method="POST">
                        <input type="hidden" name="method" value="PUT">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nome" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nome" id="nome"
                                    value="<?= $paciente->getNome() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    value="<?= $paciente->getEmail() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Período:</label>
                                <div class="form-check">
                                    <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" <?php if ($paciente->getPeriodo() === 'matutino') echo 'checked' ?>>
                                    <label for="matutino" class="form-check-label">Matutino</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno" <?php if ($paciente->getPeriodo() === 'noturno') echo 'checked' ?>>
                                    <label for="noturno" class="form-check-label">Noturno</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control mb-2" name="data_nascimento" id="data_nascimento"
                                    value="<?= $paciente->getDataNasc() ?>" placeholder="DD/MM/AAAA" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="tel" class="form-control mb-2" name="telefone" id="telefone"
                                    value="<?= $paciente->getFone() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="nome_mae" class="form-label">Nome da Mãe:</label>
                                <input type="text" class="form-control mb-2" name="nome_mae" id="nome_mae"
                                    value="<?= $paciente->getNomeMae() ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Toma algum medicamento contínuo?</label>
                                <div class="form-check">
                                    <input type="radio" id="medNao" class="form-check-input" name="toma_medicamento" value="N" <?php if ($paciente->getMedicamento() == null) echo 'checked' ?>>
                                    <label for="medNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="medSim" class="form-check-input" name="toma_medicamento" value="S" <?php if ($paciente->getMedicamento() != null) echo 'checked' ?>>
                                    <label for="medSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="medicamentoContainer" style="display: <?= $paciente->getMedicamento() ? "block;" : "none;" ?>>
                            <div class=" form-group col">
                            <label for="medicamento" class="form-label">Qual medicamento?</label>
                            <input type="text" class="form-control mb-2" name="medicamento" id="medicamento"
                                value="<?= $paciente->getMedicamento() ?>">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Trata alguma patologia?</label>
                                <div class="form-check">
                                    <input type="radio" id="patNao" class="form-check-input" name="trata_patologia" value="N" <?php if ($paciente->getPatologia() == null) echo 'checked'; ?>>
                                    <label for="patNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="patSim" class="form-check-input" name="trata_patologia" value="S" <?php if ($paciente->getPatologia() != null) echo 'checked'; ?>>
                                    <label for="patSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="patologiaContainer" style="display: <?= $paciente->getMedicamento() ? "block;" : "none;" ?>>
                                    <div class=" form-group col">
                            <label for="patologia" class="form-label">Qual patologia?</label>
                            <input type="text" class="form-control mb-2" name="patologia" id="patologia"
                                value="<?= $paciente->getMedicamento() ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="atualizar_paciente" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                    <a href="/paciente" class="btn btn-outline-secondary me-3">Voltar para a lista</a>
                    <a href="/home" class="btn btn-outline-secondary">Voltar para a tela de usuário</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {


        function controlarCampos(radioSim, radioNao, container) {
            const containerElement = document.getElementById(container);
            if (!containerElement) return;

            function atualizarVisibilidade() {
                containerElement.style.display = radioSim.checked ? 'block' : 'none';
            }

            radioSim.addEventListener('change', atualizarVisibilidade);
            radioNao.addEventListener('change', atualizarVisibilidade);
            atualizarVisibilidade();
        }


        const medSim = document.getElementById('medSim');
        const medNao = document.getElementById('medNao');
        if (medSim && medNao) {
            controlarCampos(medSim, medNao, 'medicamentoContainer');
        }


        const patSim = document.getElementById('patSim');
        const patNao = document.getElementById('patNao');
        if (patSim && patNao) {
            controlarCampos(patSim, patNao, 'patologiaContainer');
        }
    });
</script>

</html>