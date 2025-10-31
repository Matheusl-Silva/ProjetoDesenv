<?php

return function (Router $router) {

    $router->get('/hematoRef', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $hematoRefController = new HematoRefController();
        $hematoRefController->VisualizarHematoRef();
    });

    $router->put('/hematoRef', function () {

        $hematoRef           = new ReferenciaHematologia();
        $hematoRefController = new HematoRefController();

        $hematoRef->setId($_POST["id"]);
        $hematoRef->setHemaciaM($_POST["chemacia_m"]);
        $hematoRef->setHemaciaF($_POST["chemacia_f"]);
        $hematoRef->setHemoglobinaM($_POST["chemoglobina_m"]);
        $hematoRef->setHemoglobinaF($_POST["chemoglobina_f"]);
        $hematoRef->setHematocritoM($_POST["chematocrito_m"]);
        $hematoRef->setHematocritoF($_POST["chematocrito_f"]);
        $hematoRef->setVcmM($_POST["cvcm_m"]);
        $hematoRef->setVcmF($_POST["cvcm_f"]);
        $hematoRef->setHcmM($_POST["chcm_m"]);
        $hematoRef->setHcmF($_POST["chcm_f"]);
        $hematoRef->setChcmM($_POST["cchcw_m"]);
        $hematoRef->setChcmF($_POST["cchcw_f"]);
        $hematoRef->setRdwM($_POST["crdw_m"]);
        $hematoRef->setRdwF($_POST["crdw_f"]);
        $hematoRef->setLeucocitosRelativo($_POST["cleucocitos_relativo"]);
        $hematoRef->setLeucocitosAbsoluto($_POST["cleucocitos_absoluto"]);
        $hematoRef->setNeutrofilosRelativo($_POST["cneutrofilos_relativo"]);
        $hematoRef->setNeutrofilosAbsoluto($_POST["cneutrofilos_absoluto"]);
        $hematoRef->setBlastosRelativo($_POST["cblastos_relativo"]);
        $hematoRef->setBlastosAbsoluto($_POST["cblastos_absoluto"]);
        $hematoRef->setPromielocitosRelativo($_POST["cpromielocitos_relativo"]);
        $hematoRef->setPromielocitosAbsoluto($_POST["cpromielocitos_absoluto"]);
        $hematoRef->setMielocitosRelativo($_POST["cmielocitos_relativo"]);
        $hematoRef->setMielocitosAbsoluto($_POST["cmielocitos_absoluto"]);
        $hematoRef->setMetamielocitosRelativo($_POST["cmetamielocitos_relativo"]);
        $hematoRef->setMetamielocitosAbsoluto($_POST["cmetamielocitos_absoluto"]);
        $hematoRef->setBastonetesRelativo($_POST["cbastonetes_relativo"]);
        $hematoRef->setBastonetesAbsoluto($_POST["cbastonetes_absoluto"]);
        $hematoRef->setSegmentadosRelativo($_POST["csegmentados_relativo"]);
        $hematoRef->setSegmentadosAbsoluto($_POST["csegmentados_absoluto"]);
        $hematoRef->setEosinofilosRelativo($_POST["ceosinofilos_relativo"]);
        $hematoRef->setEosinofilosAbsoluto($_POST["ceosinofilos_absoluto"]);
        $hematoRef->setBasofilosRelativo($_POST["cbasofilos_relativo"]);
        $hematoRef->setBasofilosAbsoluto($_POST["cbasofilos_absoluto"]);
        $hematoRef->setLinfocitosRelativo($_POST["clinfocitos_relativo"]);
        $hematoRef->setLinfocitosAbsoluto($_POST["clinfocitos_absoluto"]);
        $hematoRef->setLinfocitosAtipicosRelativo($_POST["clinfocitos_atipicos_relativo"]);
        $hematoRef->setLinfocitosAtipicosAbsoluto($_POST["clinfocitos_atipicos_absoluto"]);
        $hematoRef->setMonocitosRelativo($_POST["cmonocitos_relativo"]);
        $hematoRef->setMonocitosAbsoluto($_POST["cmonocitos_absoluto"]);
        $hematoRef->setMieloblastosRelativo($_POST["cmieloblastos_relativo"]);
        $hematoRef->setMieloblastosAbsoluto($_POST["cmieloblastos_absoluto"]);
        $hematoRef->setOutrasCelulasRelativo($_POST["coutras_celulas_relativo"]);
        $hematoRef->setOutrasCelulasAbsoluto($_POST["coutras_celulas_absoluto"]);
        $hematoRef->setCelulasLinfoidesRelativo($_POST["ccelulas_linfoides_relativo"]);
        $hematoRef->setCelulasLinfoidesAbsoluto($_POST["ccelulas_linfoides_absoluto"]);
        $hematoRef->setCelulasMonocitoidesRelativo($_POST["ccelulas_monocitoides_relativo"]);
        $hematoRef->setCelulasMonocitoidesAbsoluto($_POST["ccelulas_monocitoides_absoluto"]);
        $hematoRef->setPlaquetas($_POST["cplaquetas"]);
        $hematoRef->setVolumePlaquetarioMedio($_POST["cvolume_plaquetario_medio"]);
        $sucesso = $hematoRefController->editar($hematoRef);

        if ($sucesso) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        //var_dump($sucesso);

        header('Location: /hematoRef');
        exit;
    });
};
