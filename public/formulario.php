<?php
include '../bd/conexaoClass.php';

$db     = new Conexao();
$mysqli = $db->getConexao();

$recebe_email = $_POST['email'];

$consultaEmail = mysqli_query(($mysqli), "SELECT * FROM usuarios WHERE email = '$recebe_email'");

if (mysqli_num_rows($consultaEmail) == 0) {
    header("location: formulario.php?email=$recebe_email&erro=1");
    exit;
} else {
    echo 'Este email está cadastro no banco de dados!';
}
$db->fecharConexao();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Perdeu a senha</h1>

  <?php
echo $_GET['email'];

?>

</body>
</html>
