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

    $router->put('/exameBio/{id}', function ($id) {
        $dadosExame = json_decode($_POST["dadosEdicao"], true);
        $exameBioquimico = new ExameBioquimica();
        $exameBioquimicaController = new ExameBioquimicaController();

        $exameBioquimico->setResponsavel($dadosExame["idResponsavel"]);
        $exameBioquimico->setPreceptor($dadosExame["idPreceptor"]);
        $exameBioquimico->setPaciente($dadosExame["idPaciente"]);
        $exameBioquimico->setData($dadosExame["dataExame"]);

        /*$exameBioquimico->setResponsavel(8);
        $exameBioquimico->setPreceptor(8);
        $exameBioquimico->setPaciente(1);
        $exameBioquimico->setData($dadosExame["dataExame"]);*/
        
        $exameBioquimico->setId($id);

        $exameBioquimico->setBilirrubinaTotal($dadosExame["bilirrubinaTotal"]);
        $exameBioquimico->setBilirrubinaDireta($dadosExame["bilirrubinaDireta"]);
        $exameBioquimico->setProteinaTotal($dadosExame["proteinaTotal"]);
        $exameBioquimico->setAlbumina($dadosExame["albumina"]);
        $exameBioquimico->setAmilase($dadosExame["amilase"]);
        $exameBioquimico->setTgoTransaminaseGlutamicoOxalacetica($dadosExame["tgo"]);
        $exameBioquimico->setTgpTransaminaseGlutamicoPiruvica($dadosExame["tgp"]);
        $exameBioquimico->setGamaGtGlutamiltransferase($dadosExame["gamaGt"]);
        $exameBioquimico->setFosfataseAlcalina($dadosExame["fosfataseAlcalina"]);
        $exameBioquimico->setReatinaQuinaseCk($dadosExame["ckCreatinaQuinase"]);
        $exameBioquimico->setGlicose($dadosExame["glicose"]);
        $exameBioquimico->setFerro($dadosExame["ferro"]);
        $exameBioquimico->setColesterolTotal($dadosExame["colesterolTotal"]);
        $exameBioquimico->setHdl($dadosExame["hdl"]);
        $exameBioquimico->setLdl($dadosExame["ldl"]);
        $exameBioquimico->setTriglicerideos($dadosExame["triglicerideos"]);
        $exameBioquimico->setUreia($dadosExame["ureia"]);
        $exameBioquimico->setCreatinina($dadosExame["creatinina"]);
        $exameBioquimico->setAcidoUrico($dadosExame["acidoUrico"]);
        $exameBioquimico->setPcrProteinaCReativa($dadosExame["pcrProteinaCReativa"]);
        $exameBioquimico->setCalcio($dadosExame["calcio"]);
        $exameBioquimico->setLdh($dadosExame["ldh"]);
        $exameBioquimico->setMagnesio($dadosExame["magnesio"]);
        $exameBioquimico->setFosforo($dadosExame["fosforo"]);


        $exameBioquimicaController->editar($exameBioquimico);

        header('Location: /exameBio/listar/' . $id);
        exit;
    });
};