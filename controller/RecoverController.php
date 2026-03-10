<?php

use PHPMailer\PHPMailer\PHPMailer;

class RecoverController
{
    /**
     * Valida o formato do e-mail usando padrão RFC
     */
    private function validarEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Gera uma senha provisória aleatória e segura
     */
    private function gerarSenhaProvisoria($tamanho = 10)
    {
        $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $minusculas = 'abcdefghijklmnopqrstuvwxyz';
        $numeros    = '0123456789';
        $especiais  = '@#$%&*!';

        // Garante pelo menos 1 caractere de cada tipo
        $senha  = $maiusculas[random_int(0, strlen($maiusculas) - 1)];
        $senha .= $minusculas[random_int(0, strlen($minusculas) - 1)];
        $senha .= $numeros[random_int(0, strlen($numeros) - 1)];
        $senha .= $especiais[random_int(0, strlen($especiais) - 1)];

        // Preenche o restante com caracteres aleatórios
        $todos = $maiusculas . $minusculas . $numeros . $especiais;
        for ($i = strlen($senha); $i < $tamanho; $i++) {
            $senha .= $todos[random_int(0, strlen($todos) - 1)];
        }

        // Embaralha a senha para não ter padrão previsível
        return str_shuffle($senha);
    }

    /**
     * Gera o template HTML do e-mail de recuperação
     */
    private function gerarTemplateEmail($nome, $senhaProvisoria)
    {
        return '
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f7fa;">
            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 30px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
                <!-- Header -->
                <tr>
                    <td style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); padding: 30px 40px; text-align: center;">
                        <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 700;">🔐 Recuperação de Senha</h1>
                        <p style="color: rgba(255,255,255,0.85); margin: 8px 0 0; font-size: 14px;">Sistema Laboratorial</p>
                    </td>
                </tr>
                <!-- Body -->
                <tr>
                    <td style="padding: 35px 40px;">
                        <p style="font-size: 16px; color: #333; margin: 0 0 15px;">Olá <strong>' . htmlspecialchars($nome) . '</strong>,</p>
                        <p style="font-size: 14px; color: #555; line-height: 1.6; margin: 0 0 20px;">Recebemos uma solicitação para redefinir sua senha. Abaixo está sua nova senha provisória:</p>
                        
                        <!-- Senha Box -->
                        <div style="background-color: #e8f0fe; border: 2px dashed #0d6efd; border-radius: 8px; padding: 20px; text-align: center; margin: 25px 0;">
                            <p style="font-size: 12px; color: #666; margin: 0 0 8px; text-transform: uppercase; letter-spacing: 1px;">Sua nova senha provisória</p>
                            <p style="font-size: 28px; color: #0d6efd; font-weight: 700; margin: 0; font-family: monospace; letter-spacing: 3px;">' . htmlspecialchars($senhaProvisoria) . '</p>
                        </div>

                        <!-- Warning -->
                        <div style="background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px; padding: 15px; margin: 20px 0;">
                            <p style="font-size: 13px; color: #856404; margin: 0;">
                                ⚠️ <strong>Importante:</strong> Por questões de segurança, após fazer login com esta senha provisória, entre em contato com um professor responsável para redefinir sua senha permanente.
                            </p>
                        </div>

                        <p style="font-size: 13px; color: #888; margin: 20px 0 0; line-height: 1.5;">
                            Se você não solicitou esta recuperação de senha, por favor ignore este e-mail ou entre em contato com o suporte imediatamente.
                        </p>
                    </td>
                </tr>
                <!-- Footer -->
                <tr>
                    <td style="background-color: #f8f9fa; padding: 20px 40px; text-align: center; border-top: 1px solid #e9ecef;">
                        <p style="font-size: 12px; color: #aaa; margin: 0;">Este é um e-mail automático. Por favor, não responda.</p>
                        <p style="font-size: 12px; color: #aaa; margin: 5px 0 0;">© ' . date('Y') . ' Sistema Laboratorial — Todos os direitos reservados.</p>
                    </td>
                </tr>
            </table>
        </body>
        </html>';
    }

    /**
     * Processa a recuperação de senha por e-mail
     */
    public function RecoverEmail($email)
    {
        // Validação do formato do e-mail
        if (empty($email) || !$this->validarEmail($email)) {
            header("Location: /recover?error=invalid_email");
            exit;
        }

        $usuarioDao = new UsuarioDAO();
        $usuario    = $usuarioDao->verificarEmail($email);

        if ($usuario) {
            $nome             = $usuario->getNome();
            $senha_provisoria = $this->gerarSenhaProvisoria(10);
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

                $mail->setFrom('mat860913@gmail.com', 'Sistema Laboratorial');
                $mail->addAddress($email, $nome);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperação de Senha — Sistema Laboratorial';
                $mail->Body    = $this->gerarTemplateEmail($nome, $senha_provisoria);
                $mail->AltBody = "Olá {$nome}, sua nova senha provisória é: {$senha_provisoria}. Por favor, entre em contato com um professor responsável após o login para redefinir sua senha.";

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
