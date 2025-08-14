<?php

require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../dao/ExameDAO.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$nome_usuario = $auth->getNomeUsuario();

$id_usuario = $auth->getIdUsuario();

$mensagem                  = '';
$paciente                  = null;
$exames                    = [];
$usuarios_para_preceptores = [];

//faz uma busca no banco para possíveis preceptores
$sql_usuarios = "SELECT id, nome FROM usuarios ORDER BY nome ASC";
$res_usuarios = $mysqli->query($sql_usuarios);
if ($res_usuarios) {
    //guarda esses usuários em um array
    $usuarios_para_preceptores = $res_usuarios->fetch_all(MYSQLI_ASSOC);
}

//map de chave/valor com dados de nome e id
$preceptores_map = array_column($usuarios_para_preceptores, 'nome', 'id');

//só é executado se a pagina for carregada com "numero_paciente"
if (isset($_GET['numero_paciente']) && !empty($_GET['numero_paciente'])) {
    //protege contra injeção de sql
    $id_paciente = $mysqli->real_escape_string($_GET['numero_paciente']);

    //busca o paciente no banco
    $sql       = "SELECT * FROM pacientes WHERE id = '$id_paciente'";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        //guarda os dados, caso encontre
        $paciente = $resultado->fetch_assoc();

        //utiliza exameDAO para buscar o histórico de exames
        $exameDAO = new ExameDAO($mysqli);
        $exames   = $exameDAO->buscarPorPacienteId($paciente['id']);
    } else {
        $mensagem = "Paciente não encontrado.";
    }
}

//verifica se a página foi carregada com parâmetro de satus
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sucesso') {
        $mensagem = "Exame salvo com sucesso!";
    } elseif ($_GET['status'] == 'erro') {
        $mensagem = "Ocorreu um erro ao salvar o exame.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/examePrincipal.css" />
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
    <title>Cadastro Hematológico</title>
</head>

<body class="bg-info-subtle">
    <div class="container my-5">
        <div class="modal fade" id="pesquisaModal" tabindex="-1" aria-labelledby="pesquisaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="pesquisaModalLabel">Pesquisar Paciente</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="examePrincipal.php" method="get">
                            <div class="mb-3">
                                <label for="numero_paciente" class="form-label">Número do Paciente:</label>
                                <input type="text" class="form-control" id="numero_paciente" name="numero_paciente"
                                    required autofocus />
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($mensagem)): ?>
            <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'bg-success text-white' : 'bg-danger text-white'; ?>">
                            <h5 class="modal-title" id="mensagemModalLabel">
                                <?php echo(strpos($mensagem, 'sucesso') !== false) ? 'Sucesso' : 'Aviso'; ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo htmlspecialchars($mensagem); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!$paciente): ?>
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <div class="col-md-6 card shadow p-4 bg-body-tertiary rounded">
                    <div class="card-header bg-body-tertiary text-center mb-3">
                        <h2>Cadastro Hematológico</h2>
                        <small class="text-primary">Clique no botão abaixo para pesquisar o paciente</small>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#pesquisaModal">
                            Pesquisar Paciente
                        </button>
                    </div>
                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-4">
                        <a href="homeUsuario.php" class="btn btn-outline-secondary text-decoration-none">Voltar para a tela de usuário</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow p-4 bg-body-tertiary rounded">
                        <div class="card-header bg-body-tertiary text-center mb-4">
                            <h2>Cadastro Hematológico</h2>
                            <small class="text-primary">Numero do Paciente: <?php echo htmlspecialchars($paciente['id']); ?></small>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Histórico de Exames</h5>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($exames)): ?>
                                    <table class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Número do exame</th>
                                                <th>Data do Exame</th>
                                                <th>Preceptor Responsável</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($exames as $exame): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($exame['id']); ?></td>
                                                <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($exame['data']))); ?></td>
                                                <td><?php echo isset($preceptores_map[$exame['id_preceptor']]) ? htmlspecialchars($preceptores_map[$exame['id_preceptor']]) : 'ID: ' . $exame['id_preceptor']; ?></td>
                                                <td>
                                                    <a href="visualizarExame.php?id=<?php echo $exame['id']; ?>" class="btn btn-sm btn-info">Visualizar</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p class="text-center text-muted">Nenhum exame encontrado para este paciente.</p>
                                    <p class="text-center">Preencha o formulário abaixo para <strong>cadastrar um novo exame</strong>.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <form action="salvar_exame.php" method="POST">
                            <input type="hidden" name="registro_paciente" value="<?php echo htmlspecialchars($paciente['id']); ?>">
                            <input type="hidden" name="id_responsavel" value="<?php echo htmlspecialchars($id_usuario); ?>">

                            <div class="section-title text-uppercase text-secondary fw-bold">
                                Responsáveis
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label for="responsavelExame" class="form-label">Responsável pelo exame</label>
                                    <input type="text" class="form-control" name="responsavelExame" id="responsavelExame"
                                        value="<?php echo htmlspecialchars($nome_usuario); ?>" disabled />
                                </div>

                                <div class="col-md-3">
                                    <label for="preceptor" class="form-label">Preceptor responsável</label>
                                    <select class="form-select" name="id_preceptor" id="preceptor" required>
                                        <option value="">Selecione um preceptor</option>
                                        <?php foreach ($usuarios_para_preceptores as $u): ?>
                                            <option value="<?php echo htmlspecialchars($u['id']); ?>">
                                                <?php echo htmlspecialchars($u['nome']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="section-title text-uppercase text-secondary fw-bold">
                                Informações do paciente
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="registroPaciente" class="form-label">N° de Registro</label>
                                    <input type="text" class="form-control" id="registroPaciente"
                                        value="<?php echo htmlspecialchars($paciente['id']); ?>" disabled />
                                </div>
                                <div class="col-md-2">
                                    <label for="entradaPaciente" class="form-label">Entrada</label>
                                    <input type="date" class="form-control" name="dentrada" id="entradaPaciente"
                                        value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                                <div class="col-md-3">
                                    <label for="dataHora" class="form-label">Exame realizado em</label>
                                    <input type="datetime-local" class="form-control" name="data" id="dataHora"
                                        value="<?php echo date('Y-m-d\TH:i'); ?>" />
                                </div>
                                <div class="col-md-2">
                                    <label for="dataPrevista" class="form-label">Entrega</label>
                                     <input type="date" class="form-control" name="dentrega" id="dataPrevista"
                                        value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Eritrograma</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2"><label class="form-label">Hemácias</label><input type="number" step ="0.01" class="form-control" name="hemacia" required></div>
                                        <div class="col-md-2"><label class="form-label">Hemoglobina</label><input type="number" step="0.1" class="form-control" name="hemoglobina" required></div>
                                        <div class="col-md-2"><label class="form-label">Hematócrito</label><input type="number" step="0.1" class="form-control" name="hematocrito" required></div>
                                        <div class="col-md-2"><label class="form-label">VCM</label><input type="number" step="0.1" class="form-control" name="vcm" required></div>
                                        <div class="col-md-2"><label class="form-label">HCM</label><input type="number" step="0.1" class="form-control" name="hcm" required></div>
                                        <div class="col-md-2"><label class="form-label">CHCM</label><input type="number" step="0.1" class="form-control" name="chcm" required></div>
                                        <div class="col-md-2"><label class="form-label">RDW</label><input type="number" step="0.1" class="form-control" name="rdw" required></div>
                                        <div class="col-md-2"><label class="form-label">Leucócitos</label><input type="number" step ="0.01" class="form-control" name="leucocitos" required></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Células Mieloides</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2"><label class="form-label">Blastos</label><input type="number" class="form-control" name="blastos" id="blastos" required><div class="form-text">Ref.: 0 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Prómielócitos</label><input type="number" class="form-control" name="promielocitos" id="promielocitos" required><div class="form-text">Ref.: 0 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Mielócitos</label><input type="number" class="form-control" name="mielocitos" id="mielocitos" required><div class="form-text">Ref.: 0 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Metamielócitos</label><input type="number" class="form-control" name="metamielocitos" id="metamielocitos" required><div class="form-text">Ref.: 0 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Bastonetes</label><input type="number" class="form-control" name="bastonetes" id="bastonetes" required><div class="form-text">Ref.: 0 - 840 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Segmentados</label><input type="number" class="form-control" name="segmentados" id="segmentados" required><div class="form-text">Ref.: 1.700 - 8.000 /µL</div></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Outras Células e Plaquetas</div>
                                <div class="card-body">
                                     <div class="row g-3">
                                        <div class="col-md-2"><label class="form-label">Linfócitos</label><input type="number" class="form-control" name="linfocitos" required><div class="form-text">Ref.: 900 - 2.900 /µL</div></div>
                                        <div class="col-md-2"><label class="form-label">Monócitos</label><input type="number" class="form-control" name="monocitos" required><div class="form-text">Ref.: 300 - 900 /µL</div></div>
                                        <div class="col-md-3"><label class="form-label">Plaquetas</label><input type="number" class="form-control" name="plaquetas" id="plaquetas" required><div class="form-text">Ref.: 150.000 - 450.000 /µL</div></div>
                                        <div class="col-md-3"><label class="form-label">Volume Plaquetário Médio</label><input type="number" step="0.1" class="form-control" name="plaquetarioMedio" id="plaquetarioMedio" required><div class="form-text">Ref.: 6,5 - 15,0 fL</div></div>
                                    </div>
                                </div>
                            </div>

                             <div class="card mb-5 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Contagem Diferencial (%)</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2"><label class="form-label">Neutrófilos</label><input type="number" class="form-control" name="contagemNeutrofilos" required></div>
                                        <div class="col-md-2"><label class="form-label">Linfócitos</label><input type="number" class="form-control" name="contagemLinfocitos" required></div>
                                        <div class="col-md-2"><label class="form-label">Eosinófilos</label><input type="number" class="form-control" name="contagemEosinofilos" required></div>
                                        <div class="col-md-2"><label class="form-label">Monócitos</label><input type="number" class="form-control" name="contagemMonocitos" required></div>
                                        <div class="col-md-2"><label class="form-label">Basófilos</label><input type="number" class="form-control" name="contagemBasofilos" required></div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                               <button type="submit" class="btn btn-success btn-lg">Salvar Novo Exame</button>
                            </div>

                        </form>
                        <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-4">
                            <a href="examePrincipal.php" class="btn btn-outline-primary me-3">Nova Pesquisa</a>
                            <a href="homeUsuario.php" class="btn btn-outline-secondary">Voltar para a tela de usuário</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //se $mensagem não estiver vazio, usa o js para mostrar o modal de mensagem
        <?php if (!empty($mensagem)): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var mensagemModal = new bootstrap.Modal(document.getElementById('mensagemModal'));
                mensagemModal.show();
            });
        <?php endif; ?>

        //se nenhum usuario foi carregado e o usuário não informou nenhum id, mostra a modal de pesquisa automaticamente
        <?php if (!$paciente && !isset($_GET['numero_paciente'])): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
                myModal.show();
            });
        <?php endif; ?>
    </script>

</body>
</html>