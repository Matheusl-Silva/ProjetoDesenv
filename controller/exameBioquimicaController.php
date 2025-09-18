<?php

class ExameBioquimicaController
{
    public function VisualizarExame($id)
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameBioquimicaDao = new ExameBioquimicaDAO();
        $exame              = $exameBioquimicaDao->buscarExameCompletoPorId($id);

        if (!$exame) {
            $mensagem = "Exame de bioquimica não encontrado.";
            header("Location: /exames?mensagem=" . urlencode($mensagem));
            exit();
        }

        $nome_usuario = $auth->getNomeUsuario();
        require 'views/visualizarBioquimica.php';
    }

    public function excluir($idExame)
    {
        $exameBioquimicaDao = new ExameBioquimicaDAO();
        $result = $exameBioquimicaDao->excluir($idExame);
        return $result;
    }

    public function getPaciente($idExame)
    {
        $exameBioquimicaDAO = new ExameBioquimicaDAO();
        $exame = $exameBioquimicaDAO->buscarExameCompletoPorId($idExame);
        $idPaciente = $exame->getPaciente();

        return $idPaciente;
    }
}
