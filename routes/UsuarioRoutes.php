<?php
return function (Router $router) {
    $router->get('/cadastrarUsuario', function () {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarFormCadastro();
    });

    $router->get('/usuario', function () {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarLista();
    });

    $router->get('/usuario/{id}', function ($id) {
        $usuarioController = new UsuarioController();
        $usuarioController->gerarFormEdicao($id);
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

    $router->put('/usuario/{id}', function ($id) {
        $usuarioController = new UsuarioController();
        $usuario = new Usuario();

        if (!$usuarioController->verificarEmail($_POST["email"])) {
            $usuario->setNome($_POST["nomeUsuario"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setAdmin($_POST["admin"]);
            $usuario->setId($id);

            $usuarioController->editar($usuario);

            header('Location: /usuario');
            exit;
        } else {
            $_SESSION["flash"] = [
                "mensagem" => "Este e-mail já está cadastrado!",
                "tipo" => "warning"
            ];

            header('Location: /usuario/' . $id);
            exit;

            unset($_SESSION["flash"]);
        }
    });
};
