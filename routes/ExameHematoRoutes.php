<?php
return function (Router $router) {
    $router->get('/exameHemato/listar/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameHematoController = new ExameHematoController();
        $exameHematoController->VisualizarExame($id);
    });

    $router->delete('/exameHemato/{id}', function ($id) {
        $exameHematoController = new ExameHematoController();
        $exameHematoController->excluir($id);

        header('Location: /exames?paciente=' . $id);
        exit;
    });
};
