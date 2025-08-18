<?php
return function (Router $router) {
    $router->get('/login', function () {
        require 'views/login.php';
    });

    $router->post('/login', function () {
        $usuarioController = new UsuarioController();
        $result = $usuarioController->login($_POST["email"], $_POST["senha"]);
        if ($result) {
            header('Location: /home');
            exit;
        }
    });

    $router->get('/home', function () {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarHome();
    });
};
