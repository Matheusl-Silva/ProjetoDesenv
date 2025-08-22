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

    public function gerarLista(){
        $usuarioDAO = new UsuarioDAO();
        $listaUsuarios = $usuarioDAO->listarUsuarios();

        require 'views/listarusuarios.php';
    }
    
    public function gerarFormEdicao($id){
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->buscarUsuario($id);

        require 'views/editarusuario.php';
    }

    public function gerarHome()
    {
        $auth = new Autenticacao();
        $auth->verificarLogin();
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
            //$stmt_verificar->close();
        }
        //$db->fecharConexao();
    }

    public function login($email, $senha)
    {
        $usuarioDAO = new UsuarioDAO();
        if (!empty($email) && !empty($senha)) {
            $usuario = $usuarioDAO->login($email, $senha);
        }
        if ($usuario) {
            $_SESSION['id']    = $usuario->getId();
            $_SESSION['nome']  = $usuario->getNome();
            $_SESSION['admin'] = $usuario->getAdmin();
            return true;
        }
        $loginInvalido = true;
        require '/login';
        return false;
    }
}
