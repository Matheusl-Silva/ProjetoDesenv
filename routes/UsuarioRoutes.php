<?php
return function(Router $router){
    $router->get('/cadastrarUsuario', function(){
        $usuarioController = new UsuarioController();
        $usuarioController->gerarFormCadastro();
    });

    $router->post('/usuario', function(){
        $usuarioController = new UsuarioController();
        $usuarioController->cadastrarUsuario($_POST["nomeUsuario"], $_POST["email"], $_POST["senha"]);

        header('Location: /cadastrarUsuario');
        exit;
    });
};