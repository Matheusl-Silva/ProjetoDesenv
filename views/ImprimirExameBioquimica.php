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

$exameBioDAO = new ExameBioquimicaDAO();
$exame = $exameBioDAO->buscarExameCompletoPorId($idExame);

$bioRefDAO = new ExameBioquimicaRefDAO();
$referencia = $bioRefDAO->buscarReferenciaBioquimica();
if (!$referencia) {
    $referencia = new ReferenciaBioquimica();
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
    <title>Laudo - Exame de Bioquímica</title>
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
            margin: 8px 0 3px 0;
            text-transform: uppercase;
            font-size: 8pt;
        }

        .tabela-header {
            display: grid;
            grid-template-columns: 200px 80px 100px 320px;
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
            grid-template-columns: 200px 80px 100px 320px;
            margin-bottom: 2px;
            font-size: 7pt;
            align-items: center;
        }

        .linha-resultado .nome {
            text-align: left;
        }

        .linha-resultado .unidade {
            text-align: left;
            padding-left: 5px;
        }

        .linha-resultado .valor {
            text-align: center;
            font-weight: bold;
        }

        .linha-resultado .referencia {
            text-align: left;
            padding-left: 10px;
            font-size: 6.5pt;
            line-height: 1.3;
        }

        .observacao {
            margin-top: 10px;
            font-size: 6pt;
            line-height: 1.2;
        }

        .footer {
            margin-top: 10px;
            padding-top: 5px;
            border-top: 1px solid #000;
            text-align: center;
            font-size: 5.5pt;
            line-height: 1.2;
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
        EXAME: <span style="color: #0066cc;">BIOQUÍMICA</span>
    </div>
    <div class="subtitulo">
        Material: Soro/Método: Automático
    </div>

    <div class="resultado-titulo">RESULTADO:</div>

    <?php
    // Definir categorias e seus campos
    $categorias = [
        'FUNÇÃO HEPÁTICA' => [
            ['metodo' => 'getTgoTransaminaseGlutamicoOxalacetica', 'label' => 'TGO (AST)', 'unidade' => 'U/L', 'ref' => "F: {$referencia->getTgoTransaminaseGlutamicoOxalaceticaF()} • M: {$referencia->getTgoTransaminaseGlutamicoOxalaceticaM()}"],
            ['metodo' => 'getTgpTransaminaseGlutamicoPiruvica', 'label' => 'TGP (ALT)', 'unidade' => 'U/L', 'ref' => "F: {$referencia->getTgpTransaminaseGlutamicoPiruvicaF()} • M: {$referencia->getTgpTransaminaseGlutamicoPiruvicaM()}"],
            ['metodo' => 'getGamaGtGlutamiltransferase', 'label' => 'Gama GT', 'unidade' => 'U/L', 'ref' => "F: {$referencia->getGamaGtGlutamiltransferaseF()} • M: {$referencia->getGamaGtGlutamiltransferaseM()}"],
            ['metodo' => 'getBilirrubinaTotal', 'label' => 'Bilirrubina Total', 'unidade' => 'mg/dL', 'ref' => $referencia->getBilirrubinaTotal()],
            ['metodo' => 'getBilirrubinaDireta', 'label' => 'Bilirrubina Direta', 'unidade' => 'mg/dL', 'ref' => $referencia->getBilirrubinaDireta()],
        ],
        'FUNÇÃO RENAL' => [
            ['metodo' => 'getUreia', 'label' => 'Ureia', 'unidade' => 'mg/dL', 'ref' => "F: < 50 anos: {$referencia->getUreiaFMenosDe50Anos()} • > 50 anos: {$referencia->getUreiaFMaisDe50Anos()} | M: < 50 anos: {$referencia->getUreiaMMenosDe50Anos()} • > 50 anos: {$referencia->getUreiaMMaisDe50Anos()}"],
            ['metodo' => 'getCreatinina', 'label' => 'Creatinina', 'unidade' => 'mg/dL', 'ref' => "F: {$referencia->getCreatininaF()} • M: {$referencia->getCreatininaM()}"],
        ],
        'PROTEÍNAS E ENZIMAS' => [
            ['metodo' => 'getProteinaTotal', 'label' => 'Proteína Total', 'unidade' => 'g/dL', 'ref' => $referencia->getProteinaTotal()],
            ['metodo' => 'getAlbumina', 'label' => 'Albumina', 'unidade' => 'g/dL', 'ref' => $referencia->getAlbumina()],
            ['metodo' => 'getAmilase', 'label' => 'Amilase', 'unidade' => 'U/L', 'ref' => $referencia->getAmilase()],
            ['metodo' => 'getLdh', 'label' => 'LDH', 'unidade' => 'U/L', 'ref' => $referencia->getLdh()],
            ['metodo' => 'getFosfataseAlcalina', 'label' => 'Fosfatase Alcalina', 'unidade' => 'U/L', 'ref' => "F: {$referencia->getFosfataseAlcalinaF()} • M: {$referencia->getFosfataseAlcalinaM()}"],
            ['metodo' => 'getReatinaQuinaseCk', 'label' => 'CK (Creatina Quinase)', 'unidade' => 'U/L', 'ref' => "F: {$referencia->getCreatinaQuinaseCkF()} • M: {$referencia->getCreatinaQuinaseCkM()}"],
        ],
        'PERFIL LIPÍDICO' => [
            ['metodo' => 'getColesterolTotal', 'label' => 'Colesterol Total', 'unidade' => 'mg/dL', 'ref' => $referencia->getColesterolTotal()],
            ['metodo' => 'getHdl', 'label' => 'HDL', 'unidade' => 'mg/dL', 'ref' => "Até 19 anos: {$referencia->getHdlAte19Anos()} • > 20 anos: {$referencia->getHdlMaisDe20Anos()}"],
            ['metodo' => 'getLdl', 'label' => 'LDL', 'unidade' => 'mg/dL', 'ref' => "Baixo risco: {$referencia->getLdlBaixoRisco()} • Risco intermediário: {$referencia->getLdlRiscoIntermediario()} • Alto risco: {$referencia->getLdlAltoRisco()}"],
            ['metodo' => 'getTriglicerideos', 'label' => 'Triglicerídeos', 'unidade' => 'mg/dL', 'ref' => $referencia->getTriglicerideos()],
        ],
        'METABOLISMO E MINERAIS' => [
            ['metodo' => 'getGlicose', 'label' => 'Glicose', 'unidade' => 'mg/dL', 'ref' => $referencia->getGlicose()],
            ['metodo' => 'getFerro', 'label' => 'Ferro', 'unidade' => 'µg/dL', 'ref' => "F: Até 40 anos: {$referencia->getFerroFAte40Anos()} • > 40 anos: {$referencia->getFerroFMaisDe40Anos()} | M: Até 40 anos: {$referencia->getFerroMAte40Anos()} • > 40 anos: {$referencia->getFerroMMaisDe40Anos()}"],
            ['metodo' => 'getCalcio', 'label' => 'Cálcio', 'unidade' => 'mg/dL', 'ref' => $referencia->getCalcio()],
            ['metodo' => 'getMagnesio', 'label' => 'Magnésio', 'unidade' => 'mg/dL', 'ref' => "F: {$referencia->getMagnesioF()} • M: {$referencia->getMagnesioM()}"],
            ['metodo' => 'getFosforo', 'label' => 'Fósforo', 'unidade' => 'mg/dL', 'ref' => "Adulto: {$referencia->getFosforoAdulto()} • 1-3 anos: {$referencia->getFosforo1a3Anos()} • 4-12 anos: {$referencia->getFosforo4a12Anos()}"],
            ['metodo' => 'getAcidoUrico', 'label' => 'Ácido Úrico', 'unidade' => 'mg/dL', 'ref' => "F: 1-9 anos: {$referencia->getAcidoUricoF1a9Anos()} • > 18 anos: {$referencia->getAcidoUricoFMaisDe18Anos()} | M: > 18 anos: {$referencia->getAcidoUricoMMaisDe18Anos()}"],
        ],
        'MARCADORES INFLAMATÓRIOS' => [
            ['metodo' => 'getPcrProteinaCReativa', 'label' => 'PCR (Proteína C Reativa)', 'unidade' => 'mg/L', 'ref' => $referencia->getPcrProteinaCReativa()],
        ],
    ];

    // Iterar sobre cada categoria
    foreach ($categorias as $tituloCategoria => $campos) {
        // Verificar se há pelo menos um valor preenchido nesta categoria
        $temValor = false;
        foreach ($campos as $campo) {
            $metodo = $campo['metodo'];
            $valor = $exame->$metodo();
            if ($valor !== null && $valor !== '' && $valor != 0) {
                $temValor = true;
                break;
            }
        }

        // Se não há valores, pular esta categoria
        if (!$temValor) {
            continue;
        }

        // Exibir título da categoria
        echo '<div class="secao-titulo" style="margin-top: 6px;">' . $tituloCategoria . '</div>';
        echo '<div class="tabela-header">';
        echo '<div></div>';
        echo '<div>UNIDADE</div>';
        echo '<div>RESULTADO</div>';
        echo '<div style="text-align: left; padding-left: 10px;">VALORES DE REFERÊNCIA</div>';
        echo '</div>';

        // Exibir campos da categoria
        foreach ($campos as $campo) {
            $metodo = $campo['metodo'];
            $valor = $exame->$metodo();
            
            // Só exibir se tiver valor
            if ($valor !== null && $valor !== '' && $valor != 0) {
                echo '<div class="linha-resultado">';
                echo '<div class="nome">' . str_pad($campo['label'], 25, '.') . ':</div>';
                echo '<div class="unidade">' . $campo['unidade'] . '</div>';
                echo '<div class="valor">' . htmlspecialchars($valor) . '</div>';
                echo '<div class="referencia">' . $campo['ref'] . '</div>';
                echo '</div>';
            }
        }
    }
    ?>

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
