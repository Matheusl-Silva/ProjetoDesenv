<?php

return function (Router $router) {
    $router->get('/exameBio/listar/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameBioquimicaController = new ExameBioquimicaController();
        $exameBioquimicaController->VisualizarExame($id);
    });

    $router->delete('/exameBio/{id}', function ($id) {
        $exameBioquimicaController = new ExameBioquimicaController();
        $idPaciente                = $exameBioquimicaController->getPaciente($id);
        $exameBioquimicaController->excluir($id);

        header('Location: /exames?paciente=' . $idPaciente);
        exit;
    });

    $router->post('/cadastrarBioquimica/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameBioquimicaController = new ExameBioquimicaController();
        $exameBioquimicaController->gerarFormCadastro($id);

    });

    $router->get('/cadastrarBioquimica/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $exameBioquimicaController = new ExameBioquimicaController();
        $exameBioquimicaController->gerarFormCadastro($id);
    });

    $router->post('/exameBio', function () {

        $exameBioquimicaController = new ExameBioquimicaController();
        $exameBioquimica           = new ExameBioquimica();

        $exameBioquimica->setResponsavel($_POST["id_responsavel"]);
        $exameBioquimica->setPreceptor($_POST["id_preceptor"]);
        $exameBioquimica->setPaciente($_POST["id_paciente"]);
        $exameBioquimica->setData($_POST["data"]);
        $exameBioquimica->setTgoTransaminaseGlutamicoOxalacetica($_POST["ast"] ?? null);
        $exameBioquimica->setTgpTransaminaseGlutamicoPiruvica($_POST["alt"] ?? null);
        $exameBioquimica->setGamaGtGlutamiltransferase($_POST["ggt"] ?? null);
        $exameBioquimica->setBilirrubinaTotal($_POST["bilirrubina_total"] ?? null);
        $exameBioquimica->setBilirrubinaDireta($_POST["bilirrubina_direta"] ?? null);
        $exameBioquimica->setUreia($_POST["ureia"] ?? null);
        $exameBioquimica->setCreatinina($_POST["creatinina"] ?? null);
        $exameBioquimica->setProteinaTotal($_POST["proteina_total"] ?? null);
        $exameBioquimica->setAlbumina($_POST["albumina"] ?? null);
        $exameBioquimica->setAmilase($_POST["amilase"] ?? null);
        $exameBioquimica->setLdh($_POST["ldh"] ?? null);
        $exameBioquimica->setFosfataseAlcalina($_POST["fa"] ?? null);
        $exameBioquimica->setReatinaQuinaseCk($_POST["ck"] ?? null);
        $exameBioquimica->setColesterolTotal($_POST["col_total"] ?? null);
        $exameBioquimica->setHdl($_POST["hdl"] ?? null);
        $exameBioquimica->setLdl($_POST["ldl"] ?? null);
        $exameBioquimica->setTriglicerideos($_POST["triglicerideos"] ?? null);
        $exameBioquimica->setGlicose($_POST["glicose"] ?? null);
        $exameBioquimica->setFerro($_POST["ferro"] ?? null);
        $exameBioquimica->setCalcio($_POST["calcio"] ?? null);
        $exameBioquimica->setMagnesio($_POST["magnesio"] ?? null);
        $exameBioquimica->setFosforo($_POST["fosforo"] ?? null);
        $exameBioquimica->setAcidoUrico($_POST["acido_urico"] ?? null);
        $exameBioquimica->setPcrProteinaCReativa($_POST["pcr"] ?? null);
        $exameBioquimica->setObservacao($_POST["observacao"]);

        $result = $exameBioquimicaController->cadastrarExame($exameBioquimica);

        header('Location: /cadastrarBioquimica/' . $exameBioquimica->getPaciente() . '?sucesso=1&exame_id=' . $result);
        exit;

    });
};
