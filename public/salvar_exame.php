<?php
require_once '../database/ConexaoClass.php';
require_once '../dao/ExameDAO.php';
require_once '../models/AutenticacaoClass.php';

session_start();

$auth = new Autenticacao();
$auth->verificarLogin();

//verifica se o método da requisição é POST, somente funcionando caso os dados tenham sido enviados
//através do método POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //cria conexão e uma instância de exameDAO
    $bd = new Conexao();
    $mysqli = $bd->getConexao();

    $exameDAO = new ExameDAO($mysqli);

    //cria um array $dados_exame e organiza todos os dados recebidos do formulário
    $dados_exame = [
        'id_responsavel'    => $_POST['id_responsavel'],
        'id_preceptor'      => $_POST['id_preceptor'],
        'registro_paciente' => $_POST['registro_paciente'],
        'dentrada'          => $_POST['dentrada'],
        'dentrega'          => $_POST['dentrega'],
        //formata data e hora para o padrão do bd
        'data'              => date('Y-m-d H:i:s', strtotime($_POST['data'])),
        //se os campos numéricos forem null, atribui o valor 0 à eles
        'hemacia'           => empty($_POST['hemacia']) ? 0 : $_POST['hemacia'],
        'hemoglobina'       => empty($_POST['hemoglobina']) ? 0 : $_POST['hemoglobina'],
        'hematocrito'       => empty($_POST['hematocrito']) ? 0 : $_POST['hematocrito'],
        'vcm'               => empty($_POST['vcm']) ? 0 : $_POST['vcm'],
        'hcm'               => empty($_POST['hcm']) ? 0 : $_POST['hcm'],
        'chcm'              => empty($_POST['chcm']) ? 0 : $_POST['chcm'],
        'rdw'               => empty($_POST['rdw']) ? 0 : $_POST['rdw'],
        'leucocitos'        => empty($_POST['leucocitos']) ? 0 : $_POST['leucocitos'],
        'blastos'           => empty($_POST['blastos']) ? 0 : $_POST['blastos'],
        'promielocitos'     => empty($_POST['promielocitos']) ? 0 : $_POST['promielocitos'],
        'mielocitos'        => empty($_POST['mielocitos']) ? 0 : $_POST['mielocitos'],
        'metamielocitos'    => empty($_POST['metamielocitos']) ? 0 : $_POST['metamielocitos'],
        'bastonetes'        => empty($_POST['bastonetes']) ? 0 : $_POST['bastonetes'],
        'segmentados'       => empty($_POST['segmentados']) ? 0 : $_POST['segmentados'],
        'plaquetas'         => empty($_POST['plaquetas']) ? 0 : $_POST['plaquetas'],
        'plaquetarioMedio'  => empty($_POST['plaquetarioMedio']) ? 0 : $_POST['plaquetarioMedio'],
        'neutrofilos'       => empty($_POST['contagemNeutrofilos']) ? 0 : $_POST['contagemNeutrofilos'],
        'eosinofilos'       => empty($_POST['contagemEosinofilos']) ? 0 : $_POST['contagemEosinofilos'],
        'basofilos'         => empty($_POST['contagemBasofilos']) ? 0 : $_POST['contagemBasofilos'],
    ];

    //chama o método salvarExame do exameDAO, passando o array com os dados organizados
    if ($exameDAO->salvarExame($dados_exame)) {
        header("Location: examePrincipal.php?numero_paciente=" . $dados_exame['registro_paciente'] . "&status=sucesso");
    } else {
        header("Location: examePrincipal.php?numero_paciente=" . $dados_exame['registro_paciente'] . "&status=erro");
    }
    //boas práticas, finaliza o script para garantir que nenhum outro código seja executado
    exit();

} else { //caso a requisição não seja POST, redireciona o usuário para a home
    header("Location: homeUsuario.php");
    exit();
}