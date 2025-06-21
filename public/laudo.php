<?php
include '../views/LaudoView.php';
require_once '../dao/ExameDAO.php';

if (isset($_GET["id"])) {
    $exameDAO = new ExameDAO();
    $exame    = $exameDAO->buscarExameCompletoPorId($_GET["id"]);
}

if (!$exame) {
    die("Exame não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <style>
    body {
      font-family: 'Courier New', Courier, monospace;
      margin: 40px;
      line-height: 1.6;
    }
    .header {
      text-align: center;
      margin-bottom: 30px;
    }
    .header h1 {
      margin-bottom: 10px;
    }
    .elemento {
      display: grid;
      grid-template-columns: 200px 1fr 100px 150px;
      align-items: baseline;
      margin-bottom: 2px;
      font-size: 14px;
    }
    .elemento .traco {
      border-bottom: 1px dotted black;
      margin: 0 5px;
    }
    .elemento .valor-unidade {
      text-align: right;
    }
    .elemento .referencia {
      text-align: right;
      padding-left: 15px;
      white-space: nowrap;
    }
    .header-logo {
      display: block;
      margin-left: auto;
      margin-right: auto;
      max-width: 400px;
      margin-bottom: 20px;
    }
    .secao {
      margin-bottom: 25px;
    }
    .secao h3 {
      padding-bottom: 5px;
      margin-bottom: 15px;
    }

    /* utilizado o @mdia print para qunado for dar o ctrl +p*/
    @media print {
      body {
        margin: 20px;
        font-size: 10pt;
      }
      .header-logo {
        max-width: 250px;
        margin-bottom: 10px;
      }
      .secao {
        margin-bottom: 15px;
      }
      .secao h3 {
        margin-bottom: 10px;
      }
      .elemento {
        grid-template-columns: 150px 1fr 80px 120px;
        font-size: 9pt;
      }
    }
  </style>
  <body>
    <?php
echo LaudoView::renderizarLaudo($exame);
?>
  </body>
</html>
