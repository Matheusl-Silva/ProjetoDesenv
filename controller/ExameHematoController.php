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

    public function cadastrarExame($id)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameHematoDAO = new ExameHematoDAO();
        $exame          = $exameHematoDAO->cadastrarExame($id);

        if (!$exame) {
            $mensagem = "Erro ao cadastrar exame de hematologia.";
            header("Location: /exames?mensagem=" . urlencode($mensagem));
            exit();
        }

        $nome_usuario = $auth->getNomeUsuario();
        require 'views/cadastrarHematologia.php';
    }
    
    public function excluir($idExame)
    {
        $exameHematoDAO = new ExameHematoDAO();
        $result = $exameHematoDAO->excluir($idExame);
        return $result;
    }
}
