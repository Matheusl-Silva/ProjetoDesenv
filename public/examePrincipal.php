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
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Cadastro Hematológico</title>
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
                        <form action="examePrincipal.php" method="post">
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

        <?php if (!empty($mensagem)): ?>
        <div class="alert <?php echo strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-danger'; ?> mt-3">
            <?php echo $mensagem; ?>
        </div>
        <?php endif; ?>

        <?php if (!$paciente): ?>
        <div class="row justify-content-center">
            <div class="col-md-6 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Cadastro Hematológico</h2>
                    <div class="logo-text text-primary">
                        Clique no botão abaixo para pesquisar o paciente
                    </div>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pesquisaModal">
                        Pesquisar Paciente
                    </button>
                </div>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                    <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Cadastro Hematológico</h2>
                    <div class="logo-text text-primary">
                        Número do paciente: <?php echo htmlspecialchars($paciente['id']); ?>
                    </div>
                </div>

                <form>
                    <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">Responsáveis</div>
                    <div class="row pt-3 pb-3">
                        <div class="col-md-2">
                            <label for="responsavelExame" class="form-label">Responsável pelo exame</label>
                            <input type="text" class="form-control" name="responsavelExame" id="responsavelExame" value="<?php echo htmlspecialchars($nome_usuario); ?>" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="preceptor" class="form-label">Preceptor responsável</label>
                            <input type="text" class="form-control" name="preceptor" id="preceptor" >
                        </div>
                    </div>

                    <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">Informações do paciente</div>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="registroPaciente" class="form-label">N° de Registro</label>
                            <input type="text" class="form-control mb-2" name="registroPaciente" id="registroPaciente" value="<?php echo htmlspecialchars($paciente['id']); ?>" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="entradaPaciente" class="form-label">Entrada: </label>
                            <input type="date" class="form-control mb-2" name="entradaPaciente" id="entradaPaciente" value="<?php echo date('Y-m-d'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <label for="dataHora" class="form-label">Exame realizado em: </label>
                            <input type="datetime-local" class="form-control mb-2" name="dataHora" id="dataHora" value="<?php echo date('Y-m-d\TH:i'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <label for="dataPrevista" class="form-label">Entrega: </label>
                            <input type="date" class="form-control mb-2" name="dataPrevista" id="dataPrevista" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" >
                        </div>
                    </div>

                    <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">ERITROGRAMA</div>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="hemacia" class="form-label">Hemacia</label>
                            <input type="text" class="form-control mb-2" name="hemacia" id="hemacia" >
                            <div class="form-text">Valor de ref.: 3,9 - 5,0 x106/µL</div>
                        </div>
                        <div class="col-md-2">
                            <label for="hemoglobina" class="form-label">Hemoglobina</label>
                            <input type="text" class="form-control mb-2" name="hemoglobina" id="hemoglobina" >
                            <div class="form-text">Valor de ref.: 12,0- 15,5g/dL</div>
                        </div>
                        <div class="col-md-2">
                            <label for="hematocrito" class="form-label">Hematócrito</label>
                            <input type="text" class="form-control mb-2" name="hematocrito" id="hematocrito" >
                            <div class="form-text">Valor de ref.: 35% - 45%</div>
                        </div>
                        <div class="col-md-2">
                            <label for="vcm" class="form-label">VCM</label>
                            <input type="text" class="form-control mb-2" name="vcm" id="vcm" >
                            <div class="form-text">Valor de ref.: 82 - 98 fL</div>
                        </div>
                        <div class="col-md-2">
                            <label for="hcm" class="form-label">HCM</label>
                            <input type="text" class="form-control mb-2" name="hcm" id="hcm" >
                            <div class="form-text">Valor de ref.: 26pg - 34pg</div>
                        </div>
                        <div class="col-md-2">
                            <label for="chcm" class="form-label">CHCM</label>
                            <input type="text" class="form-control mb-2" name="chcm" id="chcm" >
                            <div class="form-text">Valor de ref.: 31g/dL - 36g/dL</div>
                        </div>
                    </div>

                    <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">LEUCOGRAMA</div>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="rdw" class="form-label">RDW</label>
                            <input type="text" class="form-control mb-2" name="rdw" id="rdw" >
                            <div class="form-text mb-2">Valor de ref.: 11,5% - 16,5%</div>
                        </div>
                        <div class="col-md-2">
                            <label for="leucocitos" class="form-label">Leucócitos</label>
                            <input type="text" class="form-control mb-2" name="leucocitos" id="leucocitos" >
                            <div class="form-text mb-2">Valor de ref.: 3.500 - 10.500 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="neutrofilos" class="form-label">Neutrófilos</label>
                            <input type="text" class="form-control mb-2" name="neutrofilos" id="neutrofilos" >
                            <div class="form-text mb-2">Valor de ref.: 1.700 - 8.000 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="blastos" class="form-label">Blastos </label>
                            <input type="text" class="form-control mb-2" name="blastos" id="blastos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="promielocitos" class="form-label">Prómielócitos</label>
                            <input type="text" class="form-control mb-2" name="promielocitos" id="promielocitos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="mielocitos" class="form-label">Mielócitos</label>
                            <input type="text" class="form-control mb-2" name="mielocitos" id="mielocitos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="metamielocitos" class="form-label">Metamielócitos</label>
                            <input type="text" class="form-control mb-2" name="metamielocitos" id="metamielocitos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="bastonetes" class="form-label">Bastonetes</label>
                            <input type="text" class="form-control mb-2" name="bastonetes" id="bastonetes" >
                            <div class="form-text mb-2">Valor de ref.: 0 - 840 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="segmentados" class="form-label">Segmentados</label>
                            <input type="text" class="form-control mb-2" name="segmentados" id="segmentados" >
                            <div class="form-text mb-2">Valor de ref.: 1.700 - 8.000 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="eosinofilos" class="form-label">Eosinófilos</label>
                            <input type="text" class="form-control mb-2" name="eosinofilos" id="eosinofilos" >
                            <div class="form-text mb-2">Valor de ref.: 50 - 500 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="basofilos" class="form-label">Basófilos</label>
                            <input type="text" class="form-control mb-2" name="basofilos" id="basofilos" >
                            <div class="form-text mb-2">Valor de ref.: 0 - 100 /µL</div>
                        </div>
                        <div class="col-md-2">
                            <label for="linfocitos" class="form-label">Linfócitos</label>
                            <input type="text" class="form-control mb-2" name="linfocitos" id="linfocitos" >
                            <div class="form-text mb-2">Valor de ref.: 900 - 2.900 /µL</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="linfAtipicos" class="form-label">Linfócitos Atípicos</label>
                            <input type="text" class="form-control mb-2" name="linfAtipicos" id="linfAtipicos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="monocitos" class="form-label">Monócitos</label>
                            <input type="text" class="form-control mb-2" name="monocitos" id="monocitos" >
                            <div class="form-text mb-2">Valor de ref.: 300 - 900 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="mieloblastos" class="form-label">Mieloblastos</label>
                            <input type="text" class="form-control mb-2" name="mieloblastos" id="mieloblastos" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="outrasCelulas" class="form-label">Outras células</label>
                            <input type="text" class="form-control mb-2" name="outrasCelulas" id="outrasCelulas" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="celLinfoides" class="form-label">Células Linfóides</label>
                            <input type="text" class="form-control mb-2" name="celLinfoides" id="celLinfoides" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="celMonocitoides" class="form-label">Células Monocitóides</label>
                            <input type="text" class="form-control mb-2" name="celMonocitoides" id="celMonocitoides" >
                            <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="plaquetas" class="form-label">Plaquetas</label>
                            <input type="text" class="form-control mb-2" name="plaquetas" id="plaquetas" >
                            <div class="form-text mb-2">Valor de ref.: 150 - 450 x103/µL</div>
                        </div>

                        <div class="col-md-2">
                            <label for="plaquetarioMedio" class="form-label">Volume Plaquetário Médio</label>
                            <input type="text" class="form-control mb-2" name="plaquetarioMedio" id="plaquetarioMedio" >
                            <div class="form-text mb-2">Valor de ref.: 6,5 - 15,0 fL</div>
                        </div>
                    </div>

                    <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">CONTAGEM DIFERENCIAL</div>
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="contagemNeutrofilos" class="form-label">Neutrófilos</label>
                            <input type="text" class="form-control mb-2" name="contagemNeutrofilos" id="contagemNeutrofilos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemLinfocitos" class="form-label">Linfócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemLinfocitos" id="contagemLinfocitos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemEosinofilos" class="form-label">Eosinófilos</label>
                            <input type="text" class="form-control mb-2" name="contagemEosinofilos" id="contagemEosinofilos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemMonocitos" class="form-label">Monócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemMonocitos" id="contagemMonocitos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemBasofilos" class="form-label">Basófilos</label>
                            <input type="text" class="form-control mb-2" name="contagemBasofilos" id="contagemBasofilos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemBlastos" class="form-label">Blastos</label>
                            <input type="text" class="form-control mb-2" name="contagemBlastos" id="contagemBlastos" >
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="contagemPromielocitos" class="form-label">Prómielócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemPromielocitos" id="contagemPromielocitos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemMielocitos" class="form-label">Mielócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemMielocitos" id="contagemMielocitos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemMetamielocitos" class="form-label">Metamielócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemMetamielocitos"
                                id="contagemMetamielocitos" >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemBastonetes" class="form-label">Bastonetes</label>
                            <input type="text" class="form-control" name="contagemBastonetes" id="contagemBastonetes" >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemLinfatipicos" class="form-label">Linfócitos Atípicos</label>
                            <input type="text" class="form-control mb-2" name="contagemLinfatipicos" id="contagemLinfatipicos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemMonocitos" class="form-label">Monócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemMonocitos" id="contagemMonocitos"
                                >
                        </div>
                    </div>

                    <div class="row g-3 pb-3">
                        <div class="col-md-2">
                            <label for="contagemPlasmaticos" class="form-label">Plasmócitos</label>
                            <input type="text" class="form-control mb-2" name="contagemPlasmaticos" id="contagemPlasmaticos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="contagemMieloblastos" class="form-label">Mieloblastos</label>
                            <input type="text" class="form-control mb-2" name="contagemMieloblastos" id="contagemMieloblastos"
                                >
                        </div>

                        <div class="col-md-2">
                            <label for="loteCorante" class="form-label">Lote do corante utilizado:</label>
                            <input type="text" class="form-control mb-2" name="loteCorante" id="loteCorante" >
                        </div>
                    </div>

                    <div class="card-footer bg-body-tertiary d-flex justify-content-center mt-3">
                        <a href="examePrincipal.php" class="me-3">Nova Pesquisa</a>
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                </form>
            </div>
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
    </script>
</body>

</html>
