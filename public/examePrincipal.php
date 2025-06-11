<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';

$bd     = new Conexao();
$mysqli = $bd->getConexao();

$auth = new Autenticacao();
$auth->verificarLogin();
$nome_usuario = $auth->getNomeUsuario();

$mensagem = '';
$paciente = null;

//buscar paciente pelo id
if (isset($_POST['buscar_paciente']) && !empty($_POST['numero_paciente'])) {
    $id_paciente = $mysqli->real_escape_string($_POST['numero_paciente']);

    $sql       = "SELECT * FROM pacientes WHERE id = '$id_paciente'";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $paciente = $resultado->fetch_assoc();
    } else {
        $mensagem = "Paciente não encontrado.";
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
                        <form action="examePrincipal.php" method="post">
                            <div class="mb-3">
                                <label for="numero_paciente" class="form-label">Número do Paciente:</label>
                                <input type="text" class="form-control" id="numero_paciente" name="numero_paciente"
                                    required autofocus />
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="buscar_paciente" class="btn btn-primary">
                                    Pesquisar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal para id não encontrado -->
        <?php if (!empty($mensagem)): ?>
            <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header <?php echo strpos($mensagem, 'sucesso') !== false ? 'bg-success text-white' : 'bg-danger text-white'; ?>">
                            <h5 class="modal-title" id="mensagemModalLabel">
                                <?php echo strpos($mensagem, 'sucesso') !== false ? 'Sucesso' : 'Erro'; ?>
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

        <!-- buscar pelo id-->
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
                        <a href="homeUsuario.php" class="link-secondary text-decoration-none">Voltar para a tela de usuário</a>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow p-4 bg-body-tertiary rounded">
                        <div class="card-header bg-body-tertiary text-center mb-4">
                            <h2>Cadastro Hematológico</h2>
                            <small class="text-primary">Número do paciente: <?php echo htmlspecialchars($paciente['id']); ?></small>
                        </div>

                        <form>
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
                                    <input type="text" class="form-control" name="preceptor" id="preceptor" />
                                </div>
                            </div>

                            <div class="section-title text-uppercase text-secondary fw-bold">
                                Informações do paciente
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="registroPaciente" class="form-label">N° de Registro</label>
                                    <input type="text" class="form-control" name="registroPaciente" id="registroPaciente"
                                        value="<?php echo htmlspecialchars($paciente['id']); ?>" disabled />
                                </div>

                                <div class="col-md-2">
                                    <label for="entradaPaciente" class="form-label">Entrada</label>
                                    <input type="date" class="form-control" name="entradaPaciente" id="entradaPaciente"
                                        value="" />
                                </div>

                                <div class="col-md-3">
                                    <label for="dataHora" class="form-label">Exame realizado em</label>
                                    <input type="datetime-local" class="form-control" name="dataHora" id="dataHora"
                                        value="" />
                                </div>

                                <div class="col-md-2">
                                    <label for="dataPrevista" class="form-label">Entrega</label>
                                    <input type="date" class="form-control" name="dataPrevista" id="dataPrevista"
                                        value="" />
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Células Mieloides</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Blastos</label>
                                            <input type="number" class="form-control" name="blastos" id="blastos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Prómielócitos</label>
                                            <input type="number" class="form-control" name="promielocitos" id="promielocitos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mielócitos</label>
                                            <input type="number" class="form-control" name="mielocitos" id="mielocitos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Metamielócitos</label>
                                            <input type="number" class="form-control" name="metamielocitos" id="metamielocitos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bastonetes</label>
                                            <input type="number" class="form-control" name="bastonetes" id="bastonetes">
                                            <div class="form-text">Ref.: 0 - 840 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Segmentados</label>
                                            <input type="number" class="form-control" name="segmentados" id="segmentados">
                                            <div class="form-text">Ref.: 1.700 - 8.000 /µL</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Células Linfóides e Outras</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Linfócitos</label>
                                            <input type="number" class="form-control" name="linfocitos" id="linfocitos">
                                            <div class="form-text">Ref.: 900 - 2.900 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Linfócitos Atípicos</label>
                                            <input type="number" class="form-control" name="linfAtipicos" id="linfAtipicos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Monócitos</label>
                                            <input type="number" class="form-control" name="monocitos" id="monocitos">
                                            <div class="form-text">Ref.: 300 - 900 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mieloblastos</label>
                                            <input type="number" class="form-control" name="mieloblastos" id="mieloblastos">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Cél. Linfóides</label>
                                            <input type="number" class="form-control" name="celLinfoides" id="celLinfoides">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Cél. Monocitóides</label>
                                            <input type="number" class="form-control" name="celMonocitoides" id="celMonocitoides">
                                            <div class="form-text">Ref.: 0 /µL</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Plaquetas</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Plaquetas</label>
                                            <input type="number" class="form-control" name="plaquetas" id="plaquetas">
                                            <div class="form-text">Ref.: 150.000 - 450.000 /µL</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Volume Plaquetário Médio</label>
                                            <input type="number" step="0.1" class="form-control" name="plaquetarioMedio" id="plaquetarioMedio">
                                            <div class="form-text">Ref.: 6,5 - 15,0 fL</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-5 shadow-sm">
                                <div class="card-header bg-light fw-bold text-uppercase border-bottom">Contagem Diferencial (%)</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Neutrófilos</label>
                                            <input type="number" class="form-control" name="contagemNeutrofilos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Linfócitos</label>
                                            <input type="number" class="form-control" name="contagemLinfocitos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Eosinófilos</label>
                                            <input type="number" class="form-control" name="contagemEosinofilos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Monócitos</label>
                                            <input type="number" class="form-control" name="contagemMonocitos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Basófilos</label>
                                            <input type="number" class="form-control" name="contagemBasofilos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Blastos</label>
                                            <input type="number" class="form-control" name="contagemBlastos">
                                        </div>
                                    </div>

                                    <div class="row g-3 pt-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Prómielócitos</label>
                                            <input type="number" class="form-control" name="contagemPromielocitos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mielócitos</label>
                                            <input type="number" class="form-control" name="contagemMielocitos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Metamielócitos</label>
                                            <input type="number" class="form-control" name="contagemMetamielocitos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bastonetes</label>
                                            <input type="number" class="form-control" name="contagemBastonetes">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Linf. Atípicos</label>
                                            <input type="number" class="form-control" name="contagemLinfatipicos">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Plasmócitos</label>
                                            <input type="number" class="form-control" name="contagemPlasmaticos">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-bold">Lote do corante utilizado</label>
                                <input type="text" class="form-control" name="loteCorante">
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

    <!-- script da modal de id não encontrado -->
    <?php if (!empty($mensagem)): ?>
            <script>
                var mensagemModal = new bootstrap.Modal(document.getElementById('mensagemModal'));
                mensagemModal.show();
            </script>
        <?php endif; ?>
    <script>

    //script da modal de busca pelo id
        <?php if (!$paciente && !isset($_POST['buscar_paciente'])): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('pesquisaModal'));
                myModal.show();
            });
        <?php endif; ?>
    </script>

</body>

</html>