<?php
require_once '../database/ConexaoClass.php';
require_once '../models/AutenticacaoClass.php';
require_once '../dao/ExameDAO.php';

$auth = new Autenticacao();
$auth->verificarLogin();

$exame = null;
if (isset($_GET['id'])) {
    $bd       = new Conexao();
    $mysqli   = $bd->getConexao();
    $exameDAO = new ExameDAO($mysqli);
    $exame    = $exameDAO->buscarExameCompletoPorId($_GET['id']);
}

if (!$exame) {
    die("Exame não encontrado ou ID inválido.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <title>Visualizar Exame Hematológico</title>
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Resultado do Exame Hematológico</h2>
                        <p class="mb-0">ID do Exame: <?php echo htmlspecialchars($exame['id']); ?></p>
                    </div>
                    <div class="card-body p-4">

                        <fieldset disabled>
                            <legend class="h5">Dados Gerais</legend>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Paciente</label>
                                    <?php if ($auth->isAdmin()): ?>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['nome_paciente']); ?> (Reg: <?php echo htmlspecialchars($exame['registro_paciente']); ?>)">
                                    <?php else: ?>
                                    <input type="text" class="form-control" value="*****">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Exame realizado em</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame['data']))); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Responsável pelo Exame</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['nome_responsavel']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Preceptor Responsável</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['nome_preceptor']); ?>">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <legend class="h5 mt-4">Eritrograma</legend>
                            <div class="row g-3 mb-4">
                                <?php
$camposEritrograma = ['hemacia' => 'Hemácias', 'hemoglobina' => 'Hemoglobina', 'hematocrito' => 'Hematócrito', 'vcm' => 'VCM', 'hcm' => 'HCM', 'chcm' => 'CHCM', 'rdw' => 'RDW'];
foreach ($camposEritrograma as $key => $label): ?>
                                <div class="col-md-3">
                                    <label class="form-label"><?php echo $label; ?></label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($exame[$key] ?? 'N/A'); ?>">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <legend class="h5 mt-4">Leucograma</legend>
                             <div class="row g-3 mb-4">
                                <div class="col-md-3"><label class="form-label">Leucócitos</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['leucocitos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Blastos (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['blastos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Prómielócitos (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['promielocitos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Mielócitos (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['mielocitos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Metamielócitos (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['metamielocitos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Bastonetes (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['bastonetes'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Segmentados (µL)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['segmentados'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Neutrófilos (%)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['neutrofilos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Eosinófilos (%)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['eosinofilos'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-3"><label class="form-label">Basófilos (%)</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['basofilos'] ?? 'N/A'); ?>"></div>
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <legend class="h5 mt-4">Plaquetograma</legend>
                             <div class="row g-3 mb-4">
                                <div class="col-md-4"><label class="form-label">Plaquetas</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['plaquetas'] ?? 'N/A'); ?>"></div>
                                <div class="col-md-4"><label class="form-label">Volume Plaquetário Médio</label><input type="text" class="form-control" value="<?php echo htmlspecialchars($exame['volplaquetariomedio'] ?? 'N/A'); ?>"></div>
                            </div>
                        </fieldset>

                        <div class="card-footer bg-light text-center mt-4">
                            <a href="laudo.php?id=<?php echo $exame["id"] ?>" class="btn btn-primary">Imprimir</a>
                            <a href="examePrincipal.php?numero_paciente=<?php echo $exame['registro_paciente']; ?>" class="btn btn-primary">Voltar para o Paciente</a>
                            <a href="homeUsuario.php" class="btn btn-secondary">Voltar para Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>