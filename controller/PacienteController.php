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

    public function gerarListaExames()
    {
        $hematoDAO   = new ExameHematoDAO();
        $bioDAO      = new ExameBioquimicaDAO();
        $pacienteDAO = new PacienteDAO();
        $auth        = new Autenticacao();

        $nomeUsuario = $auth->getNomeUsuario();
        $mensagem    = '';
        $exames      = [];
        $paciente    = null; // Inicialize $paciente como null

        if (isset($_GET["paciente"])) {
            $paciente = $pacienteDAO->buscarPaciente($_GET["paciente"]);

            if ($paciente) {
                $examesHemato = $hematoDAO->buscarPorPacienteId($_GET["paciente"]);
                $examesBio    = $bioDAO->buscarPorPacienteId($_GET["paciente"]);

                // Processar exames de hematologia, adicionando a propriedade de tipo
                if ($examesHemato && is_array($examesHemato)) {
                    foreach ($examesHemato as $exame) {
                        if ($exame && method_exists($exame, 'getId')) {
                            // Adiciona a propriedade 'tipo' ao objeto do exame
                            $exame->setTipo('hematologia'); // Você precisa adicionar este método à classe ExameHemato
                            $exames[] = $exame;
                        }
                    }
                }

                // Processar exames de bioquímica, adicionando a propriedade de tipo
                if ($examesBio && is_array($examesBio)) {
                    foreach ($examesBio as $exame) {
                        if ($exame && method_exists($exame, 'getId')) {
                            // Adiciona a propriedade 'tipo' ao objeto do exame
                            $exame->setTipo('bioquimica'); // Você precisa adicionar este método à classe ExameBioquimica
                            $exames[] = $exame;
                        }
                    }
                }

                // Ordenar por data (mais recente primeiro)
                if (!empty($exames)) {
                    usort($exames, function ($a, $b) {
                        if (!$a || !$b || !method_exists($a, 'getData') || !method_exists($b, 'getData')) {
                            return 0;
                        }
                        return strtotime($b->getData()) - strtotime($a->getData());
                    });
                }
            } else {
                $mensagem = 'Paciente não encontrado.';
            }
        }

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
