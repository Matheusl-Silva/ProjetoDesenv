<?php
class PacienteController
{
    public function gerarFormCadastro()
    {
        $idPaciente     = null;
        $emailDuplicado = false;
        $erroCadastro   = false;

        if (isset($_SESSION["idpaciente"])) {
            $idPaciente = $_SESSION["idpaciente"];
        } elseif (isset($_SESSION["emailduplicado"])) {
            $emailDuplicado = true;
        } elseif (isset($_SESSION["errocadastro"])) {
            $erroCadastro = true;
        }

        require 'views/cadastropaciente.php';

        unset($_SESSION["idpaciente"]);
        unset($_SESSION["emailduplicado"]);
        unset($_SESSION["errocadastro"]);
    }

    public function gerarFormEdicao($idPaciente)
    {
        $pacienteDAO = new PacienteDAO();
        $paciente    = $pacienteDAO->buscarPaciente($idPaciente);
        $dateTime    = new DateTime($paciente->getDataNasc());
        $paciente->setDataNasc($dateTime->format('Y-m-d'));

        require 'views/editarpaciente.php';
        unset($_SESSION["flash"]);
    }

    public function gerarLista()
    {
        $pacienteDAO    = new PacienteDAO();
        $listaPacientes = $pacienteDAO->listarPacientes();

        require 'views/listapacientes.php';
    }

    public function gerarListaExames($idPaciente)
    {
        $hematoDAO = new ExameHematoDAO();
        $bioDAO = new ExameBioquimicaDAO();
        $pacienteDAO = new PacienteDAO();
        $auth = new Autenticacao();

        $paciente = $pacienteDAO->buscarPaciente($idPaciente);
        $examesHemato = $hematoDAO->buscarPorPacienteId($idPaciente);
        $examesBio = $bioDAO->buscarPorPacienteId($idPaciente);
        $exames = array_merge($examesHemato ?? array(), $examesBio ?? array());
        $nomeUsuario = $auth->getNomeUsuario();

        require 'views/listarExames.php';
    }

    public function cadastrar(Paciente $paciente)
    {
        $pacienteDAO = new PacienteDAO();
        $result      = $pacienteDAO->cadastrarPaciente($paciente);
        return $result;
    }

    public function atualizar(Paciente $paciente)
    {
        $pacienteDAO = new PacienteDAO();
        $result      = $pacienteDAO->atualizarPacientes($paciente);
        return $result;
    }

    public function verificarEmailExistente($email)
    {
        $pacienteDAO = new PacienteDAO();
        $result      = $pacienteDAO->verificarEmailExistente($email);
        if ($result) {
            return $result->getId();
        }

        return false;
    }

    public function excluir($idPaciente)
    {
        $pacienteDAO = new PacienteDAO();
        $result      = $pacienteDAO->excluirPaciente($idPaciente);
        return $result;
    }
}
