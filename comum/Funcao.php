<?php
class Autenticacao
{
    private $mysqli;

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Incluindo arquivo de conexão
        require_once "../bd/conexao.php";
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function verificarLogin()
    {
        // Verifica se o usuário está logado
        $logado = isset($_SESSION['id']) && isset($_SESSION['nome']);

        // Redireciona para a página de login se não estiver logado
        if (!$logado) {
            header("Location: login.php");
            exit;
        }

        return $logado;
    }

    public function fazerLogin($email, $senha)
    {
        // Validações
        if (strlen($senha) < 8) {
            echo "<script>alert('A senha deve contar no minímo 8 caracteres!')</script>";
            return false;
        } elseif (strlen($email) == 0) {
            echo "<script>alert('Preencha o email para entrar!')</script>";
            return false;
        } elseif (strlen($senha) == 0) {
            echo "<script>alert('O campo de senha é obrigatório!')</script>";
            return false;
        }

        // Limpar strings para evitar SQL injection
        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);

        // Consulta SQL
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        // Executa a consulta ou exibe erro
        ($sql_query = $this->mysqli->query($sql_code)) || die("Erro na consulta: " . $this->mysqli->error);

        $quantidade = $sql_query->num_rows;

        // Se encontrou usuário
        if ($quantidade == 1) {
            $usuarios = $sql_query->fetch_assoc();

            $_SESSION['id']   = $usuarios['id'];
            $_SESSION['nome'] = $usuarios['nome'];

            // Redireciona para a página principal
            header("Location: home-usuario.php");
            exit;

            return true;
        } else {
            echo "Falha ao logar!! E-mail ou senha incorretos!";
            return false;
        }
    }

    public function getNomeUsuario()
    {
        return isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
    }

    public function getIdUsuario()
    {
        return isset($_SESSION['id']) ? $_SESSION['id'] : '';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
