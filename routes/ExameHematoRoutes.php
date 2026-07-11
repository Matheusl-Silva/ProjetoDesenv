<?php
return function (Router $router) {
    $router->get('/exameHemato/listar/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameHematoController = new ExameHematoController();
        $exameHematoController->VisualizarExame($id);
    });

    $router->delete('/exameHemato/{id}', function ($id) {
        $exameHematoController = new ExameHematoController();
        $idPaciente            = $exameHematoController->getPaciente($id); //Tem um jeito melhor de fazer?
        $exameHematoController->excluir($id);

        header('Location: /exames?paciente=' . $idPaciente);
        exit;
    });

    $router->get('/cadastrarHematologia/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $exameHematoController = new ExameHematoController();
        $exameHematoController->gerarFormCadastro($id);
    });

    $router->post('/exameHemato', function () {

        $exameHematoController = new ExameHematoController();
        $exameHemato           = new ExameHemato();

        $exameHemato->setIdResponsavel($_POST["id_responsavel"]);
        $exameHemato->setPreceptor($_POST["id_preceptor"]);
        $exameHemato->setPaciente($_POST["id_paciente"]);
        $exameHemato->setData(substr($_POST["data"], 0, 10));
        $exameHemato->setHemacia($_POST["hemacia"]);
        $exameHemato->setHemoglobina($_POST["hemoglobina"]);
        $exameHemato->setHematocrito($_POST["hematocrito"]);
        $exameHemato->setVcm($_POST["vcm"]);
        $exameHemato->setHcm($_POST["hcm"]);
        $exameHemato->setChcm($_POST["chcm"]);
        $exameHemato->setRdw($_POST["rdw"]);
        $exameHemato->setLeucocitos($_POST["leucocitos"]);
        $exameHemato->setLinfocitos($_POST["linfocitos"]);
        $exameHemato->setLinfocitosAtipicos($_POST["linfocitos_atipicos"]);
        $exameHemato->setBlastos($_POST["blastos"]);
        $exameHemato->setPromielocitos($_POST["promielocitos"]);
        $exameHemato->setMielocitos($_POST["mielocitos"]);
        $exameHemato->setMetamielocitos($_POST["metamielocitos"]);
        $exameHemato->setBastonetes($_POST["bastonetes"]);
        $exameHemato->setSegmentados($_POST["segmentados"]);
        $exameHemato->setMonocitos($_POST["monocitos"]);
        $exameHemato->setEosinofilos($_POST["eosinofilos"]);
        $exameHemato->setMieloblastos($_POST["mieloblastos"]);
        $exameHemato->setBasofilos($_POST["basofilos"]);
        $exameHemato->setCelulasLinfoides($_POST["celulas_linfoides"]);
        $exameHemato->setCelulasMonocitoides($_POST["celulas_monocitoides"]);
        $exameHemato->setOutrasCelulas($_POST["outras_celulas"]);
        $exameHemato->setPlaquetas($_POST["plaquetas"]);
        $exameHemato->setVolumePlaquetarioMedio($_POST["volumePlaquetarioMedio"]);
        $exameHemato->setNeutrofilos($_POST["neutrofilos"]);

        $result = $exameHematoController->cadastrarExame($exameHemato);

        if (!empty($result['ok'])) {
            header('Location: /cadastrarHematologia/' . $exameHemato->getPaciente() . '?sucesso=1&exame_id=' . $result['id']);
        } else {
            $erro = $result['erro'] ?? 'Erro ao cadastrar exame.';
            header('Location: /cadastrarHematologia/' . $exameHemato->getPaciente() . '?erro=' . urlencode($erro));
        }
        exit;
    });

    $router->put('/exameHemato/{id}', function ($id) {
        $exameHematoController = new ExameHematoController();
        $exameHemato           = new ExameHemato();

        $dadosExame = json_decode($_POST["dadosEdicao"], true);

        $exameHemato->setId($id); //certo?

        $exameHemato->setIdResponsavel($dadosExame["idResponsavel"]);
        $exameHemato->setPreceptor($dadosExame["idPreceptor"]);
        $exameHemato->setPaciente($dadosExame["idPaciente"]);
        $exameHemato->setData(substr($dadosExame["dataExame"], 0, 10));
        $exameHemato->setHemacia($dadosExame["hemacia"]);
        $exameHemato->setHemoglobina($dadosExame["hemoglobina"]);
        $exameHemato->setHematocrito($dadosExame["hematocrito"]);
        $exameHemato->setVcm($dadosExame["vcm"]);
        $exameHemato->setHcm($dadosExame["hcm"]);
        $exameHemato->setChcm($dadosExame["chcm"]);
        $exameHemato->setRdw($dadosExame["rdw"]);
        $exameHemato->setLeucocitos($dadosExame["leucocitos"]);
        $exameHemato->setLinfocitos($dadosExame["linfocitos"]);
        $exameHemato->setLinfocitosAtipicos($dadosExame["linfocitosAtipicos"]);
        $exameHemato->setBlastos($dadosExame["blastos"]);
        $exameHemato->setPromielocitos($dadosExame["promielocitos"]);
        $exameHemato->setMielocitos($dadosExame["mielocitos"]);
        $exameHemato->setMetamielocitos($dadosExame["metamielocitos"]);
        $exameHemato->setBastonetes($dadosExame["bastonetes"]);
        $exameHemato->setSegmentados($dadosExame["segmentados"]);
        $exameHemato->setMonocitos($dadosExame["monocitos"]);
        $exameHemato->setEosinofilos($dadosExame["eosinofilos"]);
        $exameHemato->setMieloblastos($dadosExame["mieloblastos"]);
        $exameHemato->setBasofilos($dadosExame["basofilos"]);
        $exameHemato->setCelulasLinfoides($dadosExame["celulasLinfoides"]);
        $exameHemato->setCelulasMonocitoides($dadosExame["celulasMonocitoides"]);
        $exameHemato->setOutrasCelulas($dadosExame["outrasCelulas"]);
        $exameHemato->setPlaquetas($dadosExame["plaquetas"]);
        $exameHemato->setVolumePlaquetarioMedio($dadosExame["volumePlaquetarioMedio"]);
        $exameHemato->setNeutrofilos($dadosExame["neutrofilos"]);

        $exameHematoController->editar($exameHemato);

        header('Location: /exameHemato/listar/' . $id);
        exit;
    });
};
