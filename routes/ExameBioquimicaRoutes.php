<?php

return function (Router $router) {
    $router->get('/exameBio/listar/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameBioquimicaController = new exameBioquimicaController();
        $exameBioquimicaController->VisualizarExame($id);

    });
};
