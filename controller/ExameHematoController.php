<?php

class ExameHematoController
{
    public function VisualizarExame($id)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameHematoDAO = new ExameHematoDAO();
        $exame          = $exameHematoDAO->buscarExameCompletoPorId($id);

        if (!$exame) {
            $mensagem = "Exame de hematologia não encontrado.";
            header("Location: /exames?mensagem=" . urlencode($mensagem));
            exit();
        }

        $nome_usuario = $auth->getNomeUsuario();
        require 'views/visualizarExameHemato.php';
    }

    public function excluir($idExame)
    {
        $exameHematoDAO = new ExameHematoDAO();
        $result         = $exameHematoDAO->excluir($idExame);
        return $result;
    }

    public function getPaciente($idExame)
    {
        $exameHematoDAO = new ExameHematoDAO();
        $exame          = $exameHematoDAO->buscarExameCompletoPorId($idExame);
        $idPaciente     = $exame->getPaciente();

        return $idPaciente;
    }

    public function cadastrarExame(ExameHemato $exameHemato)
    {
        $exameHematoDAO = new ExameHematoDAO();
        $result         = $exameHematoDAO->cadastrarExame($exameHemato);
        return $result;

    }

    public function editar(ExameHemato $exame){
        $exameHematoDAO = new ExameHematoDAO();
        $result = $exameHematoDAO->editar($exame);
        return $result;
    }

    public function gerarFormCadastro($idPaciente)
    {

        $auth = new Autenticacao();
        $auth->verificarLogin();
        $nome_usuario = $auth->getNomeUsuario();
        $idExame      = null;

        $usuarioDAO = new UsuarioDAO();
        $usuario    = $usuarioDAO->listarUsuarios();

        $pacienteDAO = new PacienteDAO();
        $paciente    = $pacienteDAO->buscarPaciente($idPaciente);

        if (isset($_SESSION["idExame"])) {
            $idExame = $_SESSION["idExame"];
        }

        unset($_SESSION["idExame"]);

        require 'views/cadastrarHematologia.php';
    }
}
