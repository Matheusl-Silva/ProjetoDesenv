<?php
return function (Router $router) {
    $router->get('/login', function () {

        $db     = new Conexao();
        $mysqli = $db->getConexao();

        $auth = new Autenticacao();

        $loginInvalido = '';
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $resultado = $auth->fazerLogin($_POST['email'], $_POST['senha']);
            if ($resultado === false) {
                $loginInvalido = true;
            } else {
                $loginInvalido = false;
            }
        }

        $db->fecharConexao();

        require 'views/login.php';
    });

    $router->post('/login', function(){
        $usuarioController = new UsuarioController();
        $result = $usuarioController->login($_POST["email"], $_POST["senha"]);
        if($result){
            header('Location: /home');
            exit;
        }
    });
};
