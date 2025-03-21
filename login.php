<?php
include 'conexao.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['senha']) < 8) {
        echo "<script>alert('A senha deve ter no mínimo 8 caracteres!')</script>";
        return;
    } elseif (strlen($_POST['senha']) == 0) {
        echo "<script>alert('Preencha a senha!!')</script>";
        return;
    }

    if (strlen($_POST['email']) == 0) {
        echo "<script>alert('O campo email é obrigatório!')</script>";
        return;
    } else {

        //funcao para limpar string SQL injection
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        // se der algum problema o mesmo vai dar um die e mostrar o erro
        ($sql_query = $mysqli->query($sql_code)) || die("Erro na consulta: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        //Session utilizada pois continua valida por um determinado tempo, sem que precise ficar relogando

        if ($quantidade == 1) {

            $usuarios = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id']   = $usuarios['id'];
            $_SESSION['nome'] = $usuarios['nome'];

            //redirect para a pagina principal

            header("Location: home.php");

        } else {
            echo "Falha ao logar!! E-mail ou senha incorretos!";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
  </head>
  <body class="bg-info-subtle">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header bg-body-tertiary text-center">
              <h2>Bem-vindo!</h2>
              <div class="logo-text text-primary">Por favor insira suas informações para acessar</div>
            </div>
            <div class="card-body bg-body-tertiary">
              <form action="" method="POST">
                <div class="form-group mb-2" id="metodo">
                    <span>Método:</span>
                    <input class="m-1" type="radio" id="rademail" name="metodo" checked>
                    <label for="rademail">E-mail</label>
                    <input class="m-1" type="radio" id="radcartao" name="metodo">
                    <label for="radcartao">Cartão SUS</label>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email: <span style="color: red;">*</span></label>
                  <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Insira seu e-mail">
                </div>
                <div class="form-group">
                  <label for="senha" class="form-label">Senha: <span style="color: red;">*</span></label>
                  <input type="password" class="form-control mb-2" name="senha" placeholder="Insira sua senha" minlength="8">
                </div>
                <div class="col-12">
                  <span>Esqueceu a senha?</span>
                  <a href="recover.html">Recuperação de senha</a>
                </div>
                <button type="submit" class="btn btn-primary col-12 mt-3 mb-2">Entrar</button>
                <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                  <a href="index.html">Voltar para a tela inicial</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
