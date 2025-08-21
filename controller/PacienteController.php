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
        }else if(isset($_SESSION["errocadastro"])){
            $erroCadastro = true;
        }

        require 'views/cadastropaciente.php';

        unset($_SESSION["idpaciente"]);
        unset($_SESSION["emailduplicado"]);
        unset($_SESSION["errocadastro"]);
    }

    public function gerarFormEdicao($idPaciente){
        $pacienteDAO = new PacienteDAO();
        $paciente = $pacienteDAO->buscarPaciente($idPaciente);
        $dateTime = new DateTime($paciente->getDataNasc());
        $paciente->setDataNasc($dateTime->format('Y-m-d'));
        
        require 'views/editarpaciente.php';
    }

    public function gerarLista(){
        $pacienteDAO = new PacienteDAO();
        $listaPacientes = $pacienteDAO->listarPacientes();

        require 'views/listapacientes.php';
    }

    public function cadastrar(Paciente $paciente)
    {
        $pacienteDAO = new PacienteDAO();
        $result = $pacienteDAO->cadastrarPaciente($paciente);
        return $result;
    }

    public function atualizar(Paciente $paciente){
        $pacienteDAO = new PacienteDAO();
        $result = $pacienteDAO->atualizarPacientes($paciente);
        echo $result;
        print_r($result);
    }
}
