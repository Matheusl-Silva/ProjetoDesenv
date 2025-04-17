<?php
include '../bd/conexao.php';

require_once '../comum/Funcao.php';

$auth = new Autenticacao();

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $auth->fazerLogin($_POST['email'], $_POST['senha']);

}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/login.css">
  <title>Login</title>
</head>

<body class="bg-info-subtle">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div id="alert"></div>
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
          <div class="card-header bg-body-tertiary text-center">
            <h2>Bem-vindo!</h2>
            <div class="logo-text text-primary">Por favor insira suas informações para acessar</div>
          </div>
          <div class="card-body bg-body-tertiary">
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="email" class="form-label">Email: <span style="color: red;">*</span></label>
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Insira seu e-mail"
                  required>
              </div>
              <div class="form-group">
                <label for="senha" class="form-label">Senha: <span style="color: red;">*</span></label>
                <input type="password" class="form-control mb-2" name="senha" placeholder="Insira sua senha" required
                  minlength="8">
              </div>
              <div class="col-12">
                <span>Esqueceu a senha?</span>
                <a href="recover.html">Recuperação de senha</a>
              </div>
              <button type="submit" class="btn btn-primary col-12 mt-3 mb-2" id="submit">Entrar</button>
              <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                <a href="../index.html">Voltar para a tela inicial</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  const alertLogin = (idDiv, idBotao) => {
    let espaco = document.getElementById(idDiv);
    let div = document.createElement("div");
    let botao = document.getElementById(idBotao);

    div.classList.add("alert");
    div.classList.add("alert-danger");


    let alert = document.createElement('p');
    alert.innerHTML = "Login ou senha inválidos!";

    let alertModal = new bootstrap.Modal(div);

    
  }
 
  alertLogin("alert", "submit");
  
</script>
</html>