<?php
class UsuarioController
{
    public function gerarFormCadastro()
    {
        $mensagem    = '';
        $tipo_alerta = '';

        if (isset($_SESSION["flash"])) {
            $mensagem    = $_SESSION["flash"]["mensagem"];
            $tipo_alerta = $_SESSION["flash"]["tipo"];
        }
        require 'views/cadastro.php';
        unset($_SESSION["flash"]);
    }

    public function gerarLista()
    {
        $usuarioDAO    = new UsuarioDAO();
        $listaUsuarios = $usuarioDAO->listarUsuarios();

        require 'views/listarusuarios.php';
    }

    public function gerarFormEdicao($id)
    {
        $usuarioDAO = new UsuarioDAO();
        $usuario    = $usuarioDAO->buscarUsuario($id);

        require 'views/editarusuario.php';
    }

    public function gerarHome()
    {
        $auth        = new Autenticacao();
        $nomeUsuario = $auth->getNomeUsuario();
        require 'views/homeUsuario.php';
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        $db     = new Conexao();
        $mysqli = $db->getConexao();

        $usuarioDAO = new UsuarioDAO();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Verifica se o email já existe
            $resultado = $usuarioDAO->verificarEmail($usuario->getEmail());

            if ($resultado) {
                $_SESSION["flash"] = [
                    "mensagem" => "Este e-mail já está cadastrado!",
                    "tipo"     => "warning",
                ];
                return false;
            } else {
                // Executa a query
                $result = $usuarioDAO->cadastrarUsuario($usuario);
                if (!$result) {
                    $_SESSION["flash"] = [
                        "mensagem" => "Erro ao cadastrar",
                        "tipo"     => "danger",
                    ];
                    return false;
                } else {
                    $_SESSION["flash"] = [
                        "mensagem" => "Usuário cadastrado com sucesso!",
                        "tipo"     => "success",
                    ];
                    return true;
                }
            }
        }
    }

    public function login($email, $senha)
    {
        $usuarioDAO = new UsuarioDAO();
        $resposta   = null;
        if (!empty($email) && !empty($senha)) {
            $resposta = $usuarioDAO->login($email, $senha);
        }
        if ($resposta && !empty($resposta['token']) && !empty($resposta['usuario'])) {
            $usuario             = $resposta['usuario'];
            $_SESSION['id']      = $usuario->getId();
            $_SESSION['nome']    = $usuario->getNome();
            $_SESSION['admin']   = $usuario->getAdmin();
            $_SESSION['email']   = $usuario->getEmail();
            $_SESSION['token']   = $resposta['token'];
            return true;
        }
        $loginInvalido = true;
        require 'views/login.php';
        return false;
    }

    public function editar(Usuario $usuario)
    {
        $usuarioDAO = new UsuarioDAO();
        $result     = $usuarioDAO->atualizarUsuario($usuario);
        return $result;
    }

    public function verificarEmail($email)
    {
        $usuarioDAO = new UsuarioDAO();
        $result     = $usuarioDAO->verificarEmail($email);
        if ($result) {
            return $result->getId();
        }

        return false;
    }

    public function excluir($id)
    {
        $usuarioDAO = new UsuarioDAO();
        $result     = $usuarioDAO->excluirUsuario($id);
        return $result;
    }
}
