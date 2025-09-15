<?php

return function (Router $router) {
    $router->get('/exames', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarListaExames();

    });

};
