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
                // Verifica se o email já existe
                $sql_verificar  = "SELECT * FROM usuarios WHERE email = ?";
                $stmt_verificar = $mysqli->prepare($sql_verificar);
                $stmt_verificar->bind_param("s", $email);
                $stmt_verificar->execute();
                $resultado = $stmt_verificar->get_result();

                if ($resultado->num_rows > 0) {
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
}
