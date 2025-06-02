<?php
require_once __DIR__ . '/../../models/UsuarioClass.php';
require_once __DIR__ . '/../../models/AutenticacaoClass.php';

class UsuarioController
{
    private $usuario;
    private $auth;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->auth    = new Autenticacao();
        $this->auth->verificarLogin();
        $this->auth->verificarAcessoAdmin();
    }

    public function index()
    {
        // Lista todos os usuários
        $usuarios = $this->usuario->listarUsuarios();
        require_once __DIR__ . '/../../views/usuarios/home.php';
    }

    public function editar()
    {
        $mensagem = '';
        $usuario  = null;

        if (isset($_POST['buscar_usuario']) && !empty($_POST['email'])) {
            $email    = $_POST['email'];
            $usuarios = $this->usuario->listarUsuarios();

            foreach ($usuarios as $user) {
                if ($user['email'] === $email) {
                    $usuario = $user;
                    break;
                }
            }

            if (!$usuario) {
                $mensagem = "Usuário não encontrado.";
            }
        }

        if (isset($_POST['excluir_usuario']) && !empty($_POST['email'])) {
            if ($this->usuario->excluirUsuario($_POST['email'])) {
                $mensagem = "Usuário excluído com sucesso!";
                header("refresh:2;url=index.php?controller=usuarios&action=editar");
            } else {
                $mensagem = "Erro ao excluir usuário.";
            }
        }

        if (isset($_POST['atualizar_usuario'])) {
            $nome  = $_POST['nomeUsuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $admin = $_POST['admin'];

            if ($this->usuario->atualizarUsuario($nome, $email, $senha, $admin)) {
                $mensagem = "Usuário atualizado com sucesso!";
                header("refresh:2;url=index.php?controller=usuarios&action=editar");
            } else {
                $mensagem = "Erro ao atualizar usuário.";
            }
        }

        require_once __DIR__ . '/../../views/usuarios/editar.php';
    }

    public function cadastrar()
    {
        $mensagem = '';

        if (isset($_POST['cadastrar_usuario'])) {
            $nome  = $_POST['nomeUsuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $admin = $_POST['admin'];

            if ($this->usuario->cadastrarUsuario($nome, $email, $senha, $admin)) {
                $mensagem = "Usuário cadastrado com sucesso!";
                header("refresh:2;url=index.php?controller=usuarios&action=index");
            } else {
                $mensagem = "Erro ao cadastrar usuário.";
            }
        }

        require_once __DIR__ . '/../../views/usuarios/cadastro.php';
    }
}
