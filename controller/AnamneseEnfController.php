<?php

class AnamneseEnfController
{
    public function VisualizarExame($id)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $usuarioDAO = new UsuarioDAO();

        $anamneseDAO = new AnamneseDAO();
        $anamnese    = $anamneseDAO->buscarExameCompletoPorId($id);

        if (!$anamnese) {
            $mensagem = "Anamnese de enfermagem não encontrada.";
            header("Location: /exames?mensagem=" . urlencode($mensagem));
            exit();
        }

        $responsavel = null;
        $preceptor = null;
        $nome_usuario = $auth->getNomeUsuario();
        require 'views/visualizarAnamneseEnf.php';
    }

    public function excluir($idAnamnese)
    {
        $anamneseDAO = new AnamneseDAO();
        $result      = $anamneseDAO->excluir($idAnamnese);
        return $result;
    }

    public function getPaciente($idAnamnese)
    {
        $anamneseDAO = new AnamneseDAO();
        $anamnese    = $anamneseDAO->buscarExameCompletoPorId($idAnamnese);
        $idPaciente  = $anamnese->getIdPaciente(); // Era getPaciente(), mas o getter é getIdPaciente() na AnamneseEnf

        return $idPaciente;
    }

    public function cadastrarAnamnese(AnamneseEnf $anamnese)
    {
        $anamneseDAO = new AnamneseDAO();
        $result      = $anamneseDAO->cadastrarExame($anamnese);
        return $result;

    }

    public function editarAnamnese(AnamneseEnf $anamnese){
        $anamneseDAO = new AnamneseDAO();
        $result = $anamneseDAO->editar($anamnese);
        return $result;
    }

    public function gerarFormCadastro($idPaciente)
    {

        $auth = new Autenticacao();
        $auth->verificarLogin();
        $nome_usuario = $auth->getNomeUsuario();
        $idAnamnese   = null;

        $usuarioDAO = new UsuarioDAO();
        $usuario    = $usuarioDAO->listarUsuarios();

        $pacienteDAO = new PacienteDAO();
        $paciente    = $pacienteDAO->buscarPaciente($idPaciente);

        if (isset($_SESSION["idExame"])) {
            $idAnamnese = $_SESSION["idAnamnese"];
        }

        unset($_SESSION["idAnamnese"]);

        require 'views/cadastrarAnamneseEnf.php';
    }
}
