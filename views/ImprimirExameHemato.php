<?php
session_start();

spl_autoload_register(function ($class) {
    $pastas = ['controller', 'dao', 'models', 'database'];
    
    foreach ($pastas as $pasta) {
        $caminho = __DIR__ . "/../$pasta/$class.php";
        if (file_exists($caminho)) {
            require_once $caminho;
            return;
        }
    }
});

$idExame = $_GET['id'];

$exameHematoDAO = new ExameHematoDAO();
$exame = $exameHematoDAO->buscarExameCompletoPorId($idExame);

$hematoRefDAO = new ExameHematoRefDAO();
$referencia = $hematoRefDAO->buscarReferenciaHematologica();
if (!$referencia) {
    $referencia = new ReferenciaHematologia();
}

$pacienteDAO = new PacienteDAO();
$paciente = $pacienteDAO->buscarPaciente($exame->getPaciente());

$dataExame = date('d/m/Y H:i', strtotime($exame->getData()));

$idade = '';
if ($paciente && $paciente->getDataNasc()) {
    $dataNasc = new DateTime($paciente->getDataNasc());
    $hoje = new DateTime();
    $idade = $hoje->diff($dataNasc)->y . ' anos';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laudo - Exame de Hematologia</title>
    <style>
        @media print {
            @page {
                margin: 0.8cm;
            }
            body {
                margin: 0;
                padding: 0;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', monospace;
            font-size: 9pt;
            line-height: 1.2;
            color: #000;
            padding: 10px;
            background: white;
        }

        .header {
            margin-bottom: 8px;
            border-bottom: 3px solid #003d7a;
            padding-bottom: 5px;
        }

        .header-logo {
            max-width: 150px;
            margin-bottom: 3px;
        }

        .info-paciente {
            border-top: 3px solid #003d7a;
            border-bottom: 3px solid #003d7a;
            padding: 5px 0;
            margin: 5px 0;
            font-size: 8pt;
        }

        .info-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 1px;
        }

        .info-label {
            font-weight: normal;
        }

        .titulo-exame {
            margin: 8px 0 3px 0;
            font-weight: bold;
            font-size: 9pt;
        }

        .subtitulo {
            font-size: 8pt;
            margin-bottom: 8px;
        }

        .resultado-titulo {
            font-weight: bold;
            margin: 8px 0 3px 0;
            font-size: 9pt;
        }

        .secao-titulo {
            font-weight: bold;
            margin: 12px 0 5px 0;
            text-transform: uppercase;
            font-size: 9pt;
        }

        .tabela-header {
            display: grid;
            grid-template-columns: 200px 100px 250px 150px;
            font-weight: bold;
            margin-bottom: 3px;
            font-size: 8pt;
            text-align: center;
        }

        .tabela-header div:first-child {
            text-align: left;
        }

        .linha-resultado {
            display: grid;
            grid-template-columns: 200px 100px 250px 150px;
            margin-bottom: 1px;
            font-size: 8pt;
        }

        .linha-resultado .nome {
            text-align: left;
        }

        .linha-resultado .unidade {
            text-align: left;
            padding-left: 10px;
        }

        .linha-resultado .valor {
            text-align: right;
            padding-right: 20px;
        }

        .linha-resultado .referencia {
            text-align: right;
        }

        .pontos {
            display: inline-block;
            border-bottom: 1px dotted #000;
            width: 100%;
            margin: 0 5px;
        }

        .observacao {
            margin-top: 15px;
            font-size: 7pt;
            line-height: 1.2;
        }

        .footer {
            margin-top: 15px;
            padding-top: 8px;
            border-top: 1px solid #000;
            text-align: center;
            font-size: 6pt;
            line-height: 1.3;
        }
    </style>
</head>
<body>
    <div class="header">
        <img class="header-logo" src="../assets/img/LogoPositivo.png" alt="Logo Universidade Positivo">
    </div>

    <div class="info-paciente">
        <div class="info-row">
            <div><span class="info-label">Paciente: <?php echo $paciente ? htmlspecialchars($paciente->getNome()) : 'N/A'; ?></span></div>
            <div><span class="info-label">Nome Social:</span></div>
        </div>
        <div class="info-row">
            <div><span class="info-label">Idade: <?php echo $idade; ?></span></div>
            <div></div>
        </div>
        <div class="info-row">
            <div><span class="info-label">CPF: <?php echo $paciente ? htmlspecialchars($paciente->getCpf()) : 'N/A'; ?></span></div>
            <div></div>
        </div>
        <div class="info-row">
            <div><span class="info-label">Data: <?php echo $dataExame; ?></span></div>
        </div>
    </div>

    <div class="titulo-exame">
        EXAME: <span style="color: #0066cc;">HEMOGRAMA COMPLETO</span>
    </div>
    <div class="subtitulo">
        Material: Sangue total/Método: Automático
    </div>

    <div class="resultado-titulo">RESULTADO:</div>

    <!-- ERITROGRAMA -->
    <div class="secao-titulo">ERITROGRAMA</div>
    <div class="tabela-header">
        <div></div>
        <div>RESULTADO</div>
        <div style="text-align: center;">VALORES DE REFERÊNCIA</div>
        <div></div>
    </div>
    <div class="tabela-header" style="font-weight: normal; font-size: 8pt; margin-top: -3px;">
        <div></div>
        <div></div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; text-align: center;">
            <div>FEMININO</div>
            <div>MASCULINO</div>
        </div>
        <div></div>
    </div>

    <div class="linha-resultado">
        <div class="nome">Hemácias..................:</div>
        <div class="unidade">milhões/µL</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getHemacia() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getHemaciaF() ? $referencia->getHemaciaF() : '') . ' ' . ($referencia->getHemaciaM() ? $referencia->getHemaciaM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Hemoglobina.............:</div>
        <div class="unidade">g/dL</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getHemoglobina() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getHemoglobinaF() ? $referencia->getHemoglobinaF() : '') . ' ' . ($referencia->getHemoglobinaM() ? $referencia->getHemoglobinaM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Hematócrito.............:</div>
        <div class="unidade">%</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getHematocrito() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getHematocritoF() ? $referencia->getHematocritoF() : '') . ' ' . ($referencia->getHematocritoM() ? $referencia->getHematocritoM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">V.C.M...................:</div>
        <div class="unidade">fL</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getVcm() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getVcmF() ? $referencia->getVcmF() : '') . ' ' . ($referencia->getVcmM() ? $referencia->getVcmM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">H.C.M...................:</div>
        <div class="unidade">pg</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getHcm() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getHcmF() ? $referencia->getHcmF() : '') . ' ' . ($referencia->getHcmM() ? $referencia->getHcmM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">C.H.C.M.................:</div>
        <div class="unidade">%</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getChcm() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getChcmF() ? $referencia->getChcmF() : '') . ' ' . ($referencia->getChcmM() ? $referencia->getChcmM() : ''); ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">R.D.W...................:</div>
        <div class="unidade">%</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getRdw() ?? ''); ?></div>
        <div class="referencia"><?php echo ($referencia->getRdwF() ? $referencia->getRdwF() : '') . ' ' . ($referencia->getRdwM() ? $referencia->getRdwM() : ''); ?></div>
    </div>

    <!-- LEUCOGRAMA -->
    <div class="secao-titulo" style="margin-top: 10px;">LEUCOGRAMA</div>
    <div class="tabela-header">
        <div></div>
        <div>RESULTADO</div>
        <div style="text-align: center;">VALORES DE REFERÊNCIA</div>
        <div></div>
    </div>

    <div class="linha-resultado">
        <div class="nome">Leucócitos..............:</div>
        <div class="unidade">µL</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getLeucocitos() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getLeucocitosAbsoluto() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Neutrófilos.............:</div>
        <div class="unidade"></div>
        <div class="valor"><?php echo htmlspecialchars($exame->getNeutrofilos() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getNeutrofilosRelativo() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Linfócitos..............:</div>
        <div class="unidade"></div>
        <div class="valor"></div>
        <div class="referencia"><?php echo $referencia->getLinfocitosRelativo() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Monócitos...............:</div>
        <div class="unidade"></div>
        <div class="valor"></div>
        <div class="referencia"><?php echo $referencia->getMonocitosRelativo() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Eosinófilos.............:</div>
        <div class="unidade"></div>
        <div class="valor"><?php echo htmlspecialchars($exame->getEosinofilos() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getEosinofilosRelativo() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Basófilos...............:</div>
        <div class="unidade"></div>
        <div class="valor"><?php echo htmlspecialchars($exame->getBasofilos() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getBasofilosRelativo() ?: ''; ?></div>
    </div>
    <div class="linha-resultado">
        <div class="nome">Bastonetes..............:</div>
        <div class="unidade"></div>
        <div class="valor"><?php echo htmlspecialchars($exame->getBastonetes() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getBastonetesRelativo() ?: ''; ?></div>
    </div>

    <!-- PLAQUETOGRAMA -->
    <div class="secao-titulo" style="margin-top: 10px;">PLAQUETOGRAMA</div>
    <div class="tabela-header">
        <div></div>
        <div></div>
        <div style="text-align: center;">VALORES DE REFERÊNCIA</div>
        <div></div>
    </div>

    <div class="linha-resultado">
        <div class="nome">Contagem de plaquetas...:</div>
        <div class="unidade">mil/µL</div>
        <div class="valor"><?php echo htmlspecialchars($exame->getPlaquetas() ?? ''); ?></div>
        <div class="referencia"><?php echo $referencia->getPlaquetas() ?: ''; ?></div>
    </div>

    <div class="observacao">
        OBS: Este laudo é estritamente destinado a fins acadêmicos e, portanto, não possui validade legal.
    </div>

    <div class="footer">
        LEAC – LABORATÓRIO DE ENSINO DE ANÁLISES CLÍNICAS. UNIVERSIDADE POSITIVO.<br>
        RUA: JOÃO ROGÉRIO RIBEIRO BONESI, 150 – LONDRINA/ PR. CEP: 86047-625.
    </div>

    <script>
        // Abre automaticamente a janela de impressão quando a página carrega
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
