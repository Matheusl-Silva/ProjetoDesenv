<?php
return function (Router $router) {
    $router->get('/login', function () {
        require 'views/login.php';
    });

    $router->post('/login', function () {
        $usuarioController = new UsuarioController();
        $result            = $usuarioController->login($_POST["email"], $_POST["senha"]);
        if ($result) {
            header('Location: /home');
            exit;
        }
    });

    $router->post('/logout', function () {
        $_SESSION = array();
        session_destroy();
        header("Location: /login");
        exit;
    });

    $router->get('/home', function () {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarHome();
    });

    $router->get('/recover', function () {
        require 'views/Auth/recover.php';
    });

    $router->post('/recover', function () {
        $emailRecover = new RecoverController();
        $emailRecover->RecoverEmail($_POST['email']);
    });
};
