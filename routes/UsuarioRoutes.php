<?php
return function (Router $router) {
    $router->get('/cadastrarUsuario', function () {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarFormCadastro();
    });

    $router->post('/usuario', function () {

        if (strcmp($_POST["senha"], $_POST["senhaConfirma"]) !== 0) {
            $_SESSION["flash"] = [
                "mensagem" => "As senhas não conferem! Por favor, digite novamente.",
                "tipo" => "danger"
            ];
        } else {
            $usuarioController = new UsuarioController();
            $usuario = new Usuario();
            $usuario->setNome($_POST["nomeUsuario"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);
            $usuarioController->cadastrarUsuario($usuario);
        }

        header('Location: /cadastrarUsuario');
        exit;
    });
};
