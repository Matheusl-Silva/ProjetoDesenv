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

    public function gerarFormCadastro()
    {
        $idExame = null;

        if (isset($_SESSION["idExame"])) {
            $idExame = $_SESSION["idExame"];
        }

        unset($_SESSION["idExame"]);

        require 'views/cadastrarExameHemato.php';
    }
}
