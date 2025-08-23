<?php

use PHPMailer\PHPMailer\PHPMailer;

class RecoverController
{
    public function RecoverEmail($email)
    {

        $usuarioDao = new UsuarioDAO();
        $usuario    = $usuarioDao->buscarUsuario($email);

        if ($usuario) {
            $nome             = $usuario->getNome();
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
                    header("Location: /recover?msg=senha_enviada");
                    exit;
                } else {
                    header("Location: /recover?error=email_error");
                    exit;
                }
            } else {
                header("Location: /recover?error=update_error");
                exit;
            }
        } else {
            header("Location: /recover?error=user_not_found");
            exit;
        }
    }

}
