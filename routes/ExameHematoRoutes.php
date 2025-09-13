<?php
return function (Router $router) {
    $router->get('/examesHemato/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameHematoController = new ExameHematoController();
        $exameHematoController->VisualizarExame($id);
    });
};
