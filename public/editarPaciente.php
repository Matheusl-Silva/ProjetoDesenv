<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../models/PessoaClass.php';
require_once '../models/PacienteModel.php';
require_once '../dao/PacienteDAO.php';
require_once '../views/PacienteView.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$auth->verificarAcessoAdmin();
$nome_usuario = $auth->getNomeUsuario();

$pacienteObj = new PacienteDAO();
$mensagem    = '';
$paciente    = null;

if (isset($_POST['buscar_paciente']) && !empty($_POST['email'])) {
    $email     = $mysqli->real_escape_string($_POST['email']);
    $sql       = "SELECT * FROM pacientes WHERE email = '$email'";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $paciente = $resultado->fetch_assoc();
    } else {
        $mensagem = "Paciente não encontrado.";
    }
}

if (isset($_POST['excluir_paciente']) && !empty($_POST['email'])) {
    if ($pacienteObj->excluirPaciente($_POST['email'])) {
        $mensagem = "Paciente excluído com sucesso!";
        header("refresh:2;url=editarPaciente.php");
    } else {
        $mensagem = "Erro ao excluir paciente.";
    }
}

if (isset($_POST['atualizar_paciente'])) {
    $nome             = $_POST['nome'];
    $email            = $_POST['email'];
    $periodo          = $_POST['periodo'];
    $data_nascimento  = $_POST['data_nascimento'];
    $telefone         = $_POST['telefone'];
    $nome_mae         = $_POST['nome_mae'];
    $toma_medicamento = $_POST['toma_medicamento'];
    $medicamento      = $_POST['medicamento'];
    $trata_patologia  = $_POST['trata_patologia'];
    $patologia        = $_POST['patologia'];

    if ($pacienteObj->atualizarPacientes($nome, $email, $periodo, $data_nascimento, $telefone, $nome_mae, $toma_medicamento, $medicamento, $trata_patologia, $patologia)) {
        $mensagem = "Paciente atualizado com sucesso!";
        header("refresh:2;url=editarPaciente.php");
    } else {
        $mensagem = "Erro ao atualizar paciente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/cadastropaciente.css">
    <title>Editar Paciente</title>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Gerenciar Pacientes</h2>
                </div>

                <!--Gera a mensagem no topo se $mensagem não for vazio-->
                <?php if (!empty($mensagem)): ?>
                <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
                    <?php echo $mensagem; ?>
                </div>
                <?php endif; ?>

                <!--Decide se gera a tabela com usuários ou o formulário para edição-->
                <?php if (!$paciente): ?>
                    <?php echo PacienteView::renderizarTabelaPaciente(); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php else: ?>
                    <?php echo PacienteView::renderizarFormularioEdicao($paciente); ?>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="editarUsuario.php" class="me-3">Voltar para a lista</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

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
                atualizarVisibilidade(); // Executa uma vez para definir o estado inicial
            }

            // Configurar campos de medicamento
            const medSim = document.getElementById('medSim');
            const medNao = document.getElementById('medNao');
            if (medSim && medNao) {
                controlarCampos(medSim, medNao, 'medicamentoContainer');
            }

            // Configurar campos de patologia
            const patSim = document.getElementById('patSim');
            const patNao = document.getElementById('patNao');
            if (patSim && patNao) {
                controlarCampos(patSim, patNao, 'patologiaContainer');
            }
        });
    </script>
</body>

</html>