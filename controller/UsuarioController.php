<?php
class UsuarioController
{
    public function formCadastro()
    {
        session_start();

        $mensagem = '';
        $tipo_alerta = '';

        if (isset($_SESSION["flash"])) {
            $mensagem = $_SESSION["flash"]["mensagem"];
            $tipo_alerta = $_SESSION["flash"]["tipo"];
        }
        require 'views/cadastro.php';
        unset($_SESSION["flash"]);
    }

    public function cadastrarUsuario($nome, $email, $senha)
    {
        $db     = new Conexao();
        $mysqli = $db->getConexao();

        $usuarioDAO = new UsuarioDAO();

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera os dados do formulário
            $nome          = trim($_POST['nomeUsuario']);
            $email         = trim($_POST['email']);
            $senha         = $_POST['senha'];
            $senhaConfirma = $_POST['senhaConfirma'];

            // Valida se as senhas são iguais
            if (strcmp($senha, $senhaConfirma) !== 0) {
                $_SESSION["flash"] = [
                    "mensagem" => "As senhas não conferem! Por favor, digite novamente.",
                    "tipo" => "danger"
                ];
                return false;
            } else {
                //Verifica se o email já existe
                $resultado = $usuarioDAO->verificarEmail($email);

                if ($resultado) {
                    $_SESSION["flash"] = [
                        "mensagem" => "Este e-mail já está cadastrado!",
                        "tipo" => "warning"
                    ];
                    return false;
                } else {
                    // Executa a query
                    $result = $usuarioDAO->cadastrarUsuario($nome, $email, $senha);

                    if (!$result) {
                        $_SESSION["flash"] = [
                            "mensagem" => "Erro ao cadastrar",
                            "tipo" => "danger"
                        ];
                        return false;
                    } else {
                        $_SESSION["flash"] = [
                            "mensagem" => "Usuário cadastrado com sucesso!",
                            "tipo" => "success"
                        ];
                        return true;
                    }
                }
                //$stmt_verificar->close();
            }
        }
        //$db->fecharConexao();
    }

    public function login($email, $senha)
    {
        $usuarioDAO = new UsuarioDAO();
        if(!empty($email) && !empty($senha)){
            $usuario = $usuarioDAO->login($email, $senha);
        }
        if ($usuario) {
            $_SESSION['id']    = $usuario->getId();
            $_SESSION['nome']  = $usuario->getNome();
            $_SESSION['admin'] = $usuario->getAdmin();
            return true;
        }
        $loginInvalido = true;
        require 'views/login.php';
        return false;
    }
}
