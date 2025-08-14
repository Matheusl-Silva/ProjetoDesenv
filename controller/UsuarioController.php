<?php
class UsuarioController
{
    public function formCadastro()
    {
        $db     = new Conexao();
        $mysqli = $db->getConexao();

        $usuarioDAO = new UsuarioDAO();

        $mensagem    = "";
        $tipo_alerta = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera os dados do formulário
            $nome          = trim($_POST['nomeUsuario']);
            $email         = trim($_POST['email']);
            $senha         = $_POST['senha'];
            $senhaConfirma = $_POST['senhaConfirma'];

            // Valida se as senhas são iguais
            if (strcmp($senha, $senhaConfirma) !== 0) {
                $mensagem    = "As senhas não conferem! Por favor, digite novamente.";
                $tipo_alerta = "danger";
            } else {
                // Verifica se o email já existe
                $sql_verificar  = "SELECT * FROM usuarios WHERE email = ?";
                $stmt_verificar = $mysqli->prepare($sql_verificar);
                $stmt_verificar->bind_param("s", $email);
                $stmt_verificar->execute();
                $resultado = $stmt_verificar->get_result();

                if ($resultado->num_rows > 0) {
                    $mensagem    = "Este e-mail já está cadastrado!";
                    $tipo_alerta = "warning";
                } else {

                    // Executa a query
                    $result = $usuarioDAO->cadastrarUsuario($nome, $email, $senha);

                    if ($result) {
                        $mensagem    = "Usuário cadastrado com sucesso!";
                        $tipo_alerta = "success";

                        // Redireciona após 2 segundos (opcional)
                        header("refresh:2;url=../views/Auth/login.php");
                    } else {
                        $mensagem    = "Erro ao cadastrar";
                        $tipo_alerta = "danger";
                    }
                }
                $stmt_verificar->close();
            }
        }
        $db->fecharConexao();

        require 'views/cadastro.php';
    }
}
