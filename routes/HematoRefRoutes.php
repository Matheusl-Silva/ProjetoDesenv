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
        $hematoRef->setChemaciaM($_POST["chemacia_m"]);
        $hematoRef->setChemaciaF($_POST["chemacia_f"]);
        $hematoRef->setChemaciaUnidade($_POST["chemacia_unidade"]);
        $hematoRef->setChemoglobinaM($_POST["chemoglobina_m"]);
        $hematoRef->setChemoglobinaF($_POST["chemoglobina_f"]);
        $hematoRef->setChemoglobinaUnidade($_POST["chemoglobina_unidade"]);
        $hematoRef->setChematocritoM($_POST["chematocrito_m"]);
        $hematoRef->setChematocritoF($_POST["chematocrito_f"]);
        $hematoRef->setChematocritoUnidade($_POST["chematocrito_unidade"]);
        $hematoRef->setCvcmM($_POST["cvcm_m"]);
        $hematoRef->setCvcmF($_POST["cvcm_f"]);
        $hematoRef->setCvcmUnidade($_POST["cvcm_unidade"]);
        $hematoRef->setChcmM($_POST["chcm_m"]);
        $hematoRef->setChcmF($_POST["chcm_f"]);
        $hematoRef->setChcmUnidade($_POST["chcm_unidade"]);
        $hematoRef->setCchcwM($_POST["cchcw_m"]);
        $hematoRef->setCchcwF($_POST["cchcw_f"]);
        $hematoRef->setCchcwUnidade($_POST["cchcw_unidade"]);
        $hematoRef->setCrdwM($_POST["crdw_m"]);
        $hematoRef->setCrdwF($_POST["crdw_f"]);
        $hematoRef->setCrdwUnidade($_POST["crdw_unidade"]);
        $hematoRef->setCleucocitosRelativo($_POST["cleucocitos_relativo"]);
        $hematoRef->setCleucocitosRelativoUnidade($_POST["cleucocitos_relativo_unidade"]);
        $hematoRef->setCleucocitosAbsoluto($_POST["cleucocitos_absoluto"]);
        $hematoRef->setCleucocitosAbsolutoUnidade($_POST["cleucocitos_absoluto_unidade"]);
        $hematoRef->setCneutrofilosRelativo($_POST["cneutrofilos_relativo"]);
        $hematoRef->setCneutrofilosRelativoUnidade($_POST["cneutrofilos_relativo_unidade"]);
        $hematoRef->setCneutrofilosAbsoluto($_POST["cneutrofilos_absoluto"]);
        $hematoRef->setCneutrofilosAbsolutoUnidade($_POST["cneutrofilos_absoluto_unidade"]);
        $hematoRef->setCblastosRelativo($_POST["cblastos_relativo"]);
        $hematoRef->setCblastosRelativoUnidade($_POST["cblastos_relativo_unidade"]);
        $hematoRef->setCblastosAbsoluto($_POST["cblastos_absoluto"]);
        $hematoRef->setCblastosAbsolutoUnidade($_POST["cblastos_absoluto_unidade"]);
        $hematoRef->setCpromielocitosRelativo($_POST["cpromielocitos_relativo"]);
        $hematoRef->setCpromielocitosRelativoUnidade($_POST["cpromielocitos_relativo_unidade"]);
        $hematoRef->setCpromielocitosAbsoluto($_POST["cpromielocitos_absoluto"]);
        $hematoRef->setCpromielocitosAbsolutoUnidade($_POST["cpromielocitos_absoluto_unidade"]);
        $hematoRef->setCmielocitosRelativo($_POST["cmielocitos_relativo"]);
        $hematoRef->setCmielocitosRelativoUnidade($_POST["cmielocitos_relativo_unidade"]);
        $hematoRef->setCmielocitosAbsoluto($_POST["cmielocitos_absoluto"]);
        $hematoRef->setCmielocitosAbsolutoUnidade($_POST["cmielocitos_absoluto_unidade"]);
        $hematoRef->setCmetamielocitosRelativo($_POST["cmetamielocitos_relativo"]);
        $hematoRef->setCmetamielocitosRelativoUnidade($_POST["cmetamielocitos_relativo_unidade"]);
        $hematoRef->setCmetamielocitosAbsoluto($_POST["cmetamielocitos_absoluto"]);
        $hematoRef->setCmetamielocitosAbsolutoUnidade($_POST["cmetamielocitos_absoluto_unidade"]);
        $hematoRef->setCbastonetesRelativo($_POST["cbastonetes_relativo"]);
        $hematoRef->setCbastonetesRelativoUnidade($_POST["cbastonetes_relativo_unidade"]);
        $hematoRef->setCbastonetesAbsoluto($_POST["cbastonetes_absoluto"]);
        $hematoRef->setCbastonetesAbsolutoUnidade($_POST["cbastonetes_absoluto_unidade"]);
        $hematoRef->setCsegmentadosRelativo($_POST["csegmentados_relativo"]);
        $hematoRef->setCsegmentadosRelativoUnidade($_POST["csegmentados_relativo_unidade"]);
        $hematoRef->setCsegmentadosAbsoluto($_POST["csegmentados_absoluto"]);
        $hematoRef->setCsegmentadosAbsolutoUnidade($_POST["csegmentados_absoluto_unidade"]);
        $hematoRef->setCeosinofilosRelativo($_POST["ceosinofilos_relativo"]);
        $hematoRef->setCeosinofilosRelativoUnidade($_POST["ceosinofilos_relativo_unidade"]);
        $hematoRef->setCeosinofilosAbsoluto($_POST["ceosinofilos_absoluto"]);
        $hematoRef->setCeosinofilosAbsolutoUnidade($_POST["ceosinofilos_absoluto_unidade"]);
        $hematoRef->setCbasofilosRelativo($_POST["cbasofilos_relativo"]);
        $hematoRef->setCbasofilosRelativoUnidade($_POST["cbasofilos_relativo_unidade"]);
        $hematoRef->setCbasofilosAbsoluto($_POST["cbasofilos_absoluto"]);
        $hematoRef->setCbasofilosAbsolutoUnidade($_POST["cbasofilos_absoluto_unidade"]);
        $hematoRef->setClinfocitosRelativo($_POST["clinfocitos_relativo"]);
        $hematoRef->setClinfocitosRelativoUnidade($_POST["clinfocitos_relativo_unidade"]);
        $hematoRef->setClinfocitosAbsoluto($_POST["clinfocitos_absoluto"]);
        $hematoRef->setClinfocitosAbsolutoUnidade($_POST["clinfocitos_absoluto_unidade"]);
        $hematoRef->setClinfocitosAtipicosRelativo($_POST["clinfocitos_atipicos_relativo"]);
        $hematoRef->setClinfocitosAtipicosRelativoUnidade($_POST["clinfocitos_atipicos_relativo_unidade"]);
        $hematoRef->setClinfocitosAtipicosAbsoluto($_POST["clinfocitos_atipicos_absoluto"]);
        $hematoRef->setClinfocitosAtipicosAbsolutoUnidade($_POST["clinfocitos_atipicos_absoluto_unidade"]);
        $hematoRef->setCmonocitosRelativo($_POST["cmonocitos_relativo"]);
        $hematoRef->setCmonocitosRelativoUnidade($_POST["cmonocitos_relativo_unidade"]);
        $hematoRef->setCmonocitosAbsoluto($_POST["cmonocitos_absoluto"]);
        $hematoRef->setCmonocitosAbsolutoUnidade($_POST["cmonocitos_absoluto_unidade"]);
        $hematoRef->setCmieloblastosRelativo($_POST["cmieloblastos_relativo"]);
        $hematoRef->setCmieloblastosRelativoUnidade($_POST["cmieloblastos_relativo_unidade"]);
        $hematoRef->setCmieloblastosAbsoluto($_POST["cmieloblastos_absoluto"]);
        $hematoRef->setCmieloblastosAbsolutoUnidade($_POST["cmieloblastos_absoluto_unidade"]);
        $hematoRef->setCoutrasCelulasRelativo($_POST["coutras_celulas_relativo"]);
        $hematoRef->setCoutrasCelulasRelativoUnidade($_POST["coutras_celulas_relativo_unidade"]);
        $hematoRef->setCoutrasCelulasAbsoluto($_POST["coutras_celulas_absoluto"]);
        $hematoRef->setCoutrasCelulasAbsolutoUnidade($_POST["coutras_celulas_absoluto_unidade"]);
        $hematoRef->setCcelulasLinfoidesRelativo($_POST["ccelulas_linfoides_relativo"]);
        $hematoRef->setCcelulasLinfoidesRelativoUnidade($_POST["ccelulas_linfoides_relativo_unidade"]);
        $hematoRef->setCcelulasLinfoidesAbsoluto($_POST["ccelulas_linfoides_absoluto"]);
        $hematoRef->setCcelulasLinfoidesAbsolutoUnidade($_POST["ccelulas_linfoides_absoluto_unidade"]);
        $hematoRef->setCcelulasMonocitoidesRelativo($_POST["ccelulas_monocitoides_relativo"]);
        $hematoRef->setCcelulasMonocitoidesRelativoUnidade($_POST["ccelulas_monocitoides_relativo_unidade"]);
        $hematoRef->setCcelulasMonocitoidesAbsoluto($_POST["ccelulas_monocitoides_absoluto"]);
        $hematoRef->setCcelulasMonocitoidesAbsolutoUnidade($_POST["ccelulas_monocitoides_absoluto_unidade"]);
        $hematoRef->setCplaquetas($_POST["cplaquetas"]);
        $hematoRef->setCplaquetasUnidade($_POST["cplaquetas_unidade"]);
        $hematoRef->setCvolumePlaquetarioMedio($_POST["cvolume_plaquetario_medio"]);
        $hematoRef->setCvolumePlaquetarioMedioUnidade($_POST["cvolume_plaquetario_medio_unidade"]);

        $sucesso = $hematoRefController->editar($hematoRef);

        if ($sucesso) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        header('Location: /hematoRef');
        exit;

    });

};
