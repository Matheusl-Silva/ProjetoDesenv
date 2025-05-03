<?php
require_once '../bd/ConexaoClass.php';
require_once '../comum/AutenticacaoClass.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$nome_usuario = $auth->getNomeUsuario();

$mensagem = '';
$paciente = null;

if (isset($_POST['buscar_paciente']) && !empty($_POST['numero_paciente'])) {
    $id_paciente = $mysqli->real_escape_string($_POST['numero_paciente']);

    // Consulta para buscar o paciente pelo ID
    $sql       = "SELECT * FROM pacientes WHERE id = '$id_paciente'";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $paciente = $resultado->fetch_assoc();
    } else {
        $mensagem = "Paciente não encontrado.";
    }
}

if (isset($_POST['atualizar_paciente']) && !empty($_POST['id_paciente'])) {
    $id_paciente     = $mysqli->real_escape_string($_POST['id_paciente']);
    $nome            = $mysqli->real_escape_string($_POST['nome']);
    $periodo         = $mysqli->real_escape_string($_POST['periodo']);
    $data_nascimento = $mysqli->real_escape_string($_POST['data_nascimento']);
    $telefone        = $mysqli->real_escape_string($_POST['telefone']);
    $email           = $mysqli->real_escape_string($_POST['email']);
    $nome_mae        = $mysqli->real_escape_string($_POST['nome_mae']);

    $toma_medicamento = $mysqli->real_escape_string($_POST['toma_medicamento']);
    $medicamento      = ($toma_medicamento == 'medSim') ? $mysqli->real_escape_string($_POST['medicamento']) : '';

    $trata_patologia = $mysqli->real_escape_string($_POST['trata_patologia']);
    $patologia       = ($trata_patologia == 'patSim') ? $mysqli->real_escape_string($_POST['patologia']) : '';

    $sql = "UPDATE pacientes SET
            nome = '$nome',
            periodo = '$periodo',
            data_nascimento = '$data_nascimento',
            telefone = '$telefone',
            email = '$email',
            nome_mae = '$nome_mae',
            toma_medicamento = '$toma_medicamento',
            medicamento = '$medicamento',
            trata_patologia = '$trata_patologia',
            patologia = '$patologia'
            WHERE id = '$id_paciente'";

    if ($mysqli->query($sql)) {
        $mensagem = "Paciente atualizado com sucesso!";

        $sql       = "SELECT * FROM pacientes WHERE id = '$id_paciente'";
        $resultado = $mysqli->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $paciente = $resultado->fetch_assoc();
        }
    } else {
        $mensagem = "Erro ao atualizar paciente: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastropaciente.css">
    <title>Editar Paciente</title>
</head>

<body class="bg-info-subtle">
    <div class="container">

        <div class="modal fade" id="pesquisaModal" tabindex="-1" aria-labelledby="pesquisaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pesquisaModalLabel">Pesquisar Paciente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="editarPaciente.php" method="post">
                            <div class="mb-3">
                                <label for="numero_paciente" class="form-label">Número do Paciente:</label>
                                <input type="text" class="form-control" id="numero_paciente" name="numero_paciente" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="buscar_paciente" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Editar Paciente</h2>
                    <div class="logo-text text-primary">
                        <?php if ($paciente): ?>
                            Editando paciente: <?php ($paciente['nome']); ?> (Numero do Paciente: <?php echo($paciente['id']); ?>)
                        <?php else: ?>
                            Clique no botão abaixo para pesquisar o paciente
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($mensagem)): ?>
                <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>

                <?php if (!$paciente): ?>

                <div class="d-grid gap-2 mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                        Pesquisar Paciente
                    </button>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                    <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                </div>
                <?php else: ?>

                <form action="editarPaciente.php" method="post">
                    <input type="hidden" name="id_paciente" value="<?php echo htmlspecialchars($paciente['id']); ?>">

                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($paciente['nome']); ?>" required>
                    </div>

                    <div class="form-group">
                        <p class="form-label">Período:</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" <?php echo($paciente['periodo'] == 'matutino') ? 'checked' : ''; ?>>
                            <label for="matutino" class="form-check-label">Matutino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno" <?php echo($paciente['periodo'] == 'noturno') ? 'checked' : ''; ?>>
                            <label for="noturno" class="form-check-label">Noturno</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($paciente['data_nascimento']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone para contato:</label>
                        <input type="tel" id="telefone" class="form-control" name="telefone" value="<?php echo htmlspecialchars($paciente['telefone']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">E-mail para contato:</label>
                        <input type="email" id="email" class="form-control" name="email" value="<?php echo htmlspecialchars($paciente['email']); ?>" required>
                    </div>

                    <div>
                        <label for="nome_mae" class="form-label">Nome da mãe:</label>
                        <input type="text" class="form-control" id="nome_mae" name="nome_mae" value="<?php echo htmlspecialchars($paciente['nome_mae']); ?>" required>
                    </div>

                    <p class="form-label">Toma algum medicamento contínuo? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="medNao" class="form-check-input" name="toma_medicamento" value="medNao" <?php echo($paciente['toma_medicamento'] == 'medNao') ? 'checked' : ''; ?>>
                        <label for="medNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="medSim" class="form-check-input" name="toma_medicamento" value="medSim" <?php echo($paciente['toma_medicamento'] == 'medSim') ? 'checked' : ''; ?>>
                                <label for="medSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="medicamento" name="medicamento" placeholder="Insira o medicamento" value="<?php echo htmlspecialchars($paciente['medicamento']); ?>">
                            </div>
                        </div>
                    </div>

                    <p class="form-label">Trata alguma patologia? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="patNao" class="form-check-input" name="trata_patologia" value="patNao" <?php echo($paciente['trata_patologia'] == 'patNao') ? 'checked' : ''; ?>>
                        <label for="patNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="patSim" class="form-check-input" name="trata_patologia" value="patSim" <?php echo($paciente['trata_patologia'] == 'patSim') ? 'checked' : ''; ?>>
                                <label for="patSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="patologia" name="patologia" placeholder="Insira a patologia" value="<?php echo htmlspecialchars($paciente['patologia']); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="atualizar_paciente" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                    </div>

                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarPaciente.php" class="me-3">Nova Pesquisa</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        <?php if (!$paciente && !isset($_POST['buscar_paciente'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
            myModal.show();
        });
        <?php endif; ?>

        function configurarCaixaDeTexto(idSim, idNao, idCaixa){
            let sim = document.getElementById(idSim);
            let nao = document.getElementById(idNao);
            let caixa = document.getElementById(idCaixa);

            if (!sim || !nao || !caixa) return;

            caixa.disabled = !sim.checked;

            let alterarEstado = () => {
                caixa.disabled = !sim.checked;
            }

            sim.addEventListener('change', alterarEstado);
            nao.addEventListener('change', alterarEstado);
        }

        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($paciente): ?>
            configurarCaixaDeTexto("medSim", "medNao", "medicamento");
            configurarCaixaDeTexto("patSim", "patNao", "patologia");
            <?php endif; ?>
        });
    </script>
</body>
</html>