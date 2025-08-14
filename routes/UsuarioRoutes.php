<?php
return function(Router $router){
    $router->get('/cadastrar-usuario', function(){
        $usuarioController = new UsuarioController();
        $usuarioController->formCadastro();
    });
};