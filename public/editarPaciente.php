<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../models/PacienteClass.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$auth->verificarAcessoAdmin();
$nome_usuario = $auth->getNomeUsuario();

$pacienteObj = new Paciente();
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

        <?php if(!$paciente): ?>
            <?php echo $pacienteObj->renderizarTabelaPaciente();?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
        <?php else: ?>
            <?php echo $pacienteObj->renderizarFormularioEdicao($paciente);?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarUsuario.php" class="me-3">Voltar para a lista</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (!$paciente && !isset($_POST['buscar_paciente'])): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
                myModal.show();
            });
        <?php endif; ?>

        function configurarCaixaDeTexto(idSim, idNao, idCaixa) {
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