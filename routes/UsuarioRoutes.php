<?php
return function(Router $router){
    $router->get('/cadastrarUsuario', function(){
        $usuarioController = new UsuarioController();
        $usuarioController->formCadastro();
    });

    $router->post('/usuario', function(){
        $usuarioController = new UsuarioController();
        $result = $usuarioController->cadastrarUsuario($_POST["nomeUsuario"], $_POST["email"], $_POST["senha"]);

        if($result){
            header('Location: /login');
        }else{
            header('Location: /cadastrarUsuario');
        }
        exit;
    });
};