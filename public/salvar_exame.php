<?php
require_once '../database/ConexaoClass.php';
require_once '../dao/ExameDAO.php';
require_once '../models/AutenticacaoClass.php';

session_start();

$auth = new Autenticacao();
$auth->verificarLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bd = new Conexao();
    $mysqli = $bd->getConexao();

    $exameDAO = new ExameDAO($mysqli);

    $dados_exame = [
        'id_responsavel'    => $_POST['id_responsavel'],
        'id_preceptor'      => $_POST['id_preceptor'],
        'registro_paciente' => $_POST['registro_paciente'],
        'dentrada'          => $_POST['dentrada'],
        'dentrega'          => $_POST['dentrega'],
        'data'              => date('Y-m-d H:i:s', strtotime($_POST['data'])),
        'hemacia'           => empty($_POST['hemacia']) ? null : $_POST['hemacia'],
        'hemoglobina'       => empty($_POST['hemoglobina']) ? null : $_POST['hemoglobina'],
        'hematocrito'       => empty($_POST['hematocrito']) ? null : $_POST['hematocrito'],
        'vcm'               => empty($_POST['vcm']) ? null : $_POST['vcm'],
        'hcm'               => empty($_POST['hcm']) ? null : $_POST['hcm'],
        'chcm'              => empty($_POST['chcm']) ? null : $_POST['chcm'],
        'rdw'               => empty($_POST['rdw']) ? null : $_POST['rdw'],
        'leucocitos'        => empty($_POST['leucocitos']) ? null : $_POST['leucocitos'],
        'blastos'           => empty($_POST['blastos']) ? null : $_POST['blastos'],
        'promielocitos'     => empty($_POST['promielocitos']) ? null : $_POST['promielocitos'],
        'mielocitos'        => empty($_POST['mielocitos']) ? null : $_POST['mielocitos'],
        'metamielocitos'    => empty($_POST['metamielocitos']) ? null : $_POST['metamielocitos'],
        'bastonetes'        => empty($_POST['bastonetes']) ? null : $_POST['bastonetes'],
        'segmentados'       => empty($_POST['segmentados']) ? null : $_POST['segmentados'],
        'plaquetas'         => empty($_POST['plaquetas']) ? null : $_POST['plaquetas'],
        'plaquetarioMedio'  => empty($_POST['plaquetarioMedio']) ? null : $_POST['plaquetarioMedio'],
        'neutrofilos'       => empty($_POST['contagemNeutrofilos']) ? null : $_POST['contagemNeutrofilos'],
        'eosinofilos'       => empty($_POST['contagemEosinofilos']) ? null : $_POST['contagemEosinofilos'],
        'basofilos'         => empty($_POST['contagemBasofilos']) ? null : $_POST['contagemBasofilos'],
    ];

    if ($exameDAO->salvarExame($dados_exame)) {
        header("Location: examePrincipal.php?numero_paciente=" . $dados_exame['registro_paciente'] . "&status=sucesso");
    } else {
        header("Location: examePrincipal.php?numero_paciente=" . $dados_exame['registro_paciente'] . "&status=erro");
    }
    exit();

} else {
    header("Location: homeUsuario.php");
    exit();
}