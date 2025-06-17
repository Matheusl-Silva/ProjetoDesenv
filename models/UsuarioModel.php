<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/PessoaModel.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

class Usuario extends Pessoa
{
    private $senha;
    private $admin;

    public function __construct($nome = null, $email = null, $senha = null, $admin = 'N')
    {
        parent::__construct($nome, $email);
        $this->senha = $senha;
        $this->admin = $admin;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($valor)
    {
        $this->senha = $valor;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }
}

if (isset($_POST['reset'])) {
    require_once __DIR__ . '/../dao/UsuarioDAO.php';

    $email      = $_POST['email'];
    $usuarioDao = new UsuarioDAO();
    $usuario    = $usuarioDao->buscarUsuario($email);

    if ($usuario) {
        $nome             = $usuario['nome'];
        $senha_provisoria = "NOVASENHA@";
        $senha_hash       = $senha_provisoria;

        if ($usuarioDao->updatePassword($email, $senha_hash)) {
            // Configuração do PHPMailer
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mat860913@gmail.com';
            $mail->Password   = 'hugf bvav wmdc eaik';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom('mat860913@gmail.com', 'Sistema de Recuperação de Senha');
            $mail->addAddress($email, $nome);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body    = "
                <h2>Recuperação de Senha</h2>
                <p>Olá {$nome},</p>
                <p>Sua senha foi redefinida com sucesso.</p>
                <p>Sua nova senha provisória é: <strong>{$senha_provisoria}</strong></p>
                <p>Por favor, faça login e contate algum professor responsável para recuperar a senha</p>
                <p>Atenciosamente,<br>Sistema</p>
            ";

            if ($mail->send()) {
                header("Location: ../views/Auth/recover.php?msg=senha_enviada");
                exit;
            } else {
                header("Location: ../views/Auth/recover.php?error=email_error");
                exit;
            }
        } else {
            header("Location: ../views/Auth/recover.php?error=update_error");
            exit;
        }
    } else {
        header("Location: ../views/Auth/recover.php?error=user_not_found");
        exit;
    }
}
