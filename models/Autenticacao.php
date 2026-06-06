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
        global $mysqli;
        $this->mysqli = $mysqli;
    }

    public function verificarLogin()
    {
        // Verifica se o usuário está logado E tem token JWT válido
        $logado = isset($_SESSION['id'])
            && isset($_SESSION['nome'])
            && !empty($_SESSION['token']);

        // Redireciona para a página de login se não estiver logado
        if (!$logado) {
            $_SESSION = [];
            session_destroy();
            header("Location: /login");
            exit;
        }

        return $logado;
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
        header("Location: /login");
        exit;
    }

    public function isAdmin()
    {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === 'S';
    }

    public function verificarAcessoAdmin()
    {
        if (!$this->isAdmin()) {
            header("Location: /home");
            exit;
        }
    }
}
