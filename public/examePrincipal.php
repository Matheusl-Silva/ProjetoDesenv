<?php
require_once '../models/AutenticacaoClass.php';

$auth = new Autenticacao();
$auth->verificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Cadastro Hematológico</title>
</head>

<body>
    <div class="container">
        <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">Responsáveis</div>
        <div class="row pt-3 pb-3">
            <div class="col-md-2">
                <label for="responsavelExame" class="form-label">Responsável pelo exame</label>
                <input type="text" class="form-control" name="responsavelExame" id="responsavelExame" disabled>
            </div>

            <div class="col-md-2">
                <label for="preceptor" class="form-label">Preceptor responsável</label>
                <input type="text" class="form-control" name="preceptor" id="preceptor" disabled>
            </div>
        </div>

        <form>
            <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">Informações do paciente</div>
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="registroPaciente" class="form-label">N° de Registro</label>
                    <input type="text" class="form-control mb-2" name="registroPaciente" id="registroPaciente" disabled>
                </div>
                <div class="col-md-2">
                    <label for="nomePaciente" class="form-label">Nome</label>
                    <input type="text" class="form-control mb-2" id="nomePaciente" disabled>
                </div>
                <div class="col-md-2">
                    <label for="entradaPaciente" class="form-label">Entrada: </label>
                    <input type="date" class="form-control mb-2" name="entradaPaciente" id="entradaPaciente" disabled>
                </div>
                <div class="col-md-2">
                    <label for="dataHora" class="form-label">Exame realizado em: </label>
                    <input type="datetime-local" class="form-control mb-2" name="dataHora" id="dataHora" disabled>
                </div>
                <div class="col-md-2">
                    <label for="dataPrevista" class="form-label">Entrega: </label>
                    <input type="date" class="form-control mb-2" name="dataPrevista" id="dataPrevista" disabled>
                </div>
            </div>

            <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">ERITROGRAMA</div>
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="hemacia" class="form-label">Hemacia</label>
                    <input type="text" class="form-control mb-2" name="hemacia" id="hemacia" disabled>
                    <div class="form-text">Valor de ref.: 3,9 - 5,0 x106/µL</div>
                </div>
                <div class="col-md-2">
                    <label for="hemoglobina" class="form-label">Hemoglobina</label>
                    <input type="text" class="form-control mb-2" name="hemoglobina" id="hemoglobina" disabled>
                    <div class="form-text">Valor de ref.: 12,0- 15,5g/dL</div>
                </div>
                <div class="col-md-2">
                    <label for="hematocrito" class="form-label">Hematócrito</label>
                    <input type="text" class="form-control mb-2" name="hematocrito" id="hematocrito" disabled>
                    <div class="form-text">Valor de ref.: 35% - 45%</div>
                </div>
                <div class="col-md-2">
                    <label for="vcm" class="form-label">VCM</label>
                    <input type="text" class="form-control mb-2" name="vcm" id="vcm" disabled>
                    <div class="form-text">Valor de ref.: 82 - 98 fL</div>
                </div>
                <div class="col-md-2">
                    <label for="hcm" class="form-label">HCM</label>
                    <input type="text" class="form-control mb-2" name="hcm" id="hcm" disabled>
                    <div class="form-text">Valor de ref.: 26pg - 34pg</div>
                </div>
                <div class="col-md-2">
                    <label for="chcm" class="form-label">CHCM</label>
                    <input type="text" class="form-control mb-2" name="chcm" id="chcm" disabled>
                    <div class="form-text">Valor de ref.: 31g/dL - 36g/dL</div>
                </div>
            </div>

            <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">LEUCOGRAMA</div>
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="rdw" class="form-label">RDW</label>
                    <input type="text" class="form-control mb-2" name="rdw" id="rdw" disabled>
                    <div class="form-text mb-2">Valor de ref.: 11,5% - 16,5%</div>
                </div>
                <div class="col-md-2">
                    <label for="leucocitos" class="form-label">Leucócitos</label>
                    <input type="text" class="form-control mb-2" name="leucocitos" id="leucocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 3.500 - 10.500 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="neutrofilos" class="form-label">Neutrófilos</label>
                    <input type="text" class="form-control mb-2" name="neutrofilos" id="neutrofilos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 1.700 - 8.000 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="blastos" class="form-label">Blastos </label>
                    <input type="text" class="form-control mb-2" name="blastos" id="blastos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="promielocitos" class="form-label">Prómielócitos</label>
                    <input type="text" class="form-control mb-2" name="promielocitos" id="promielocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="mielocitos" class="form-label">Mielócitos</label>
                    <input type="text" class="form-control mb-2" name="mielocitos" id="mielocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-2">
                    <label for="metamielocitos" class="form-label">Metamielócitos</label>
                    <input type="text" class="form-control mb-2" name="metamielocitos" id="metamielocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="bastonetes" class="form-label">Bastonetes</label>
                    <input type="text" class="form-control mb-2" name="bastonetes" id="bastonetes" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 - 840 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="segmentados" class="form-label">Segmentados</label>
                    <input type="text" class="form-control mb-2" name="segmentados" id="segmentados" disabled>
                    <div class="form-text mb-2">Valor de ref.: 1.700 - 8.000 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="eosinofilos" class="form-label">Eosinófilos</label>
                    <input type="text" class="form-control mb-2" name="eosinofilos" id="eosinofilos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 50 - 500 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="basofilos" class="form-label">Basófilos</label>
                    <input type="text" class="form-control mb-2" name="basofilos" id="basofilos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 - 100 /µL</div>
                </div>
                <div class="col-md-2">
                    <label for="linfocitos" class="form-label">Linfócitos</label>
                    <input type="text" class="form-control mb-2" name="linfocitos" id="linfocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 900 - 2.900 /µL</div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-2">
                    <label for="linfAtipicos" class="form-label">Linfócitos Atípicos</label>
                    <input type="text" class="form-control mb-2" name="linfAtipicos" id="linfAtipicos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="monocitos" class="form-label">Monócitos</label>
                    <input type="text" class="form-control mb-2" name="monocitos" id="monocitos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 300 - 900 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="mieloblastos" class="form-label">Mieloblastos</label>
                    <input type="text" class="form-control mb-2" name="mieloblastos" id="mieloblastos" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="outrasCelulas" class="form-label">Outras células</label>
                    <input type="text" class="form-control mb-2" name="outrasCelulas" id="outrasCelulas" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="celLinfoides" class="form-label">Células Linfóides</label>
                    <input type="text" class="form-control mb-2" name="celLinfoides" id="celLinfoides" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>

                <div class="col-md-2">
                    <label for="celMonocitoides" class="form-label">Células Monocitóides</label>
                    <input type="text" class="form-control mb-2" name="celMonocitoides" id="celMonocitoides" disabled>
                    <div class="form-text mb-2">Valor de ref.: 0 /µL</div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-2">
                    <label for="plaquetas" class="form-label">Plaquetas</label>
                    <input type="text" class="form-control mb-2" name="plaquetas" id="plaquetas" disabled>
                    <div class="form-text mb-2">Valor de ref.: 150 - 450 x103/µL</div>
                </div>

                <div class="col-md-2">
                    <label for="plaquetarioMedio" class="form-label">Volume Plaquetário Médio</label>
                    <input type="text" class="form-control mb-2" name="plaquetarioMedio" id="plaquetarioMedio" disabled>
                    <div class="form-text mb-2">Valor de ref.: 6,5 - 15,0 fL</div>
                </div>
            </div>

            <div class="mt-4 mb-2 fw-bold text-uppercase text-secondary">CONTAGEM DIFERENCIAL</div>
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="contagemNeutrofilos" class="form-label">Neutrófilos</label>
                    <input type="text" class="form-control mb-2" name="contagemNeutrofilos" id="contagemNeutrofilos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemLinfocitos" class="form-label">Linfócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemLinfocitos" id="contagemLinfocitos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemEosinofilos" class="form-label">Eosinófilos</label>
                    <input type="text" class="form-control mb-2" name="contagemEosinofilos" id="contagemEosinofilos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemMonocitos" class="form-label">Monócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemMonocitos" id="contagemMonocitos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemBasofilos" class="form-label">Basófilos</label>
                    <input type="text" class="form-control mb-2" name="contagemBasofilos" id="contagemBasofilos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemBlastos" class="form-label">Blastos</label>
                    <input type="text" class="form-control mb-2" name="contagemBlastos" id="contagemBlastos" disabled>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-2">
                    <label for="contagemPromielocitos" class="form-label">Prómielócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemPromielocitos" id="contagemPromielocitos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemMielocitos" class="form-label">Mielócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemMielocitos" id="contagemMielocitos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemMetamielocitos" class="form-label">Metamielócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemMetamielocitos"
                        id="contagemMetamielocitos" disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemBastonetes" class="form-label">Bastonetes</label>
                    <input type="text" class="form-control" name="contagemBastonetes" id="contagemBastonetes" disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemLinfatipicos" class="form-label">Linfócitos Atípicos</label>
                    <input type="text" class="form-control mb-2" name="contagemLinfatipicos" id="contagemLinfatipicos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemMonocitos" class="form-label">Monócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemMonocitos" id="contagemMonocitos"
                        disabled>
                </div>
            </div>

            <div class="row g-3 pb-3">
                <div class="col-md-2">
                    <label for="contagemPlasmaticos" class="form-label">Plasmócitos</label>
                    <input type="text" class="form-control mb-2" name="contagemPlasmaticos" id="contagemPlasmaticos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="contagemMieloblastos" class="form-label">Mieloblastos</label>
                    <input type="text" class="form-control mb-2" name="contagemMieloblastos" id="contagemMieloblastos"
                        disabled>
                </div>

                <div class="col-md-2">
                    <label for="loteCorante" class="form-label">Lote do corante utilizado:</label>
                    <input type="text" class="form-control mb-2" name="loteCorante" id="loteCorante" disabled>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
