<?php
class PacienteController
{
    public function gerarFormCadastro()
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $idPaciente = null;
        $emailDuplicado = false;
        $erroCadastro = false;

        if (isset($_SESSION["idpaciente"])) {
            $idPaciente = $_SESSION["idpaciente"];
        }else if(isset($_SESSION["emailduplicado"])){
            $emailDuplicado = true;
        }else{
            $erroCadastro = true;
        }

        require 'views/cadastropaciente.php';

        unset($_SESSION["idpaciente"]);
        unset($_SESSION["emailduplicado"]);
        unset($_SESSION["errocadastro"]);
    }

    public function cadastrar($paciente)
    {
        $pacienteDAO = new PacienteDAO();
        $result = $pacienteDAO->cadastrarPaciente($paciente);
        return $result;
    }
}
