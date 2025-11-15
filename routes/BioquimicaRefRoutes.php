<?php

return function (Router $router) {

    $router->get('/bioquimicaRef', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $bioquimicaController = new BioquimicaRefController();
        $bioquimicaController->VisualizarBioquimicaRef();
    });

    $router->put('/bioquimicaRef', function () {

        $bioquimicaRef        = new ReferenciaBioquimica();
        $bioquimicaController = new BioquimicaRefController();

        $bioquimicaRef->setId($_POST['id'] ?? 1);
        $bioquimicaRef->setBilirrubinaTotal($_POST['cbilirrubina_total']);
        $bioquimicaRef->setBilirrubinaDireta($_POST['cbilirrubina_direta']);
        $bioquimicaRef->setProteinaTotal($_POST['cproteina_total']);
        $bioquimicaRef->setAlbumina($_POST['calbumina']);
        $bioquimicaRef->setAmilase($_POST['camilase']);
        $bioquimicaRef->setTgoTransaminaseGlutamicoOxalaceticaM($_POST['ctgo_transaminase_glutamico_oxalacetica_m']);
        $bioquimicaRef->setTgoTransaminaseGlutamicoOxalaceticaF($_POST['ctgo_transaminase_glutamico_oxalacetica_f']);
        $bioquimicaRef->setTgpTransaminaseGlutamicoPiruvicaM($_POST['ctgp_transaminase_glutamico_piruvica_m']);
        $bioquimicaRef->setTgpTransaminaseGlutamicoPiruvicaF($_POST['ctgp_transaminase_glutamico_piruvica_f']);
        $bioquimicaRef->setGamaGtGlutamiltransferaseM($_POST['cgama_gt_glutamiltransferase_m']);
        $bioquimicaRef->setGamaGtGlutamiltransferaseF($_POST['cgama_gt_glutamiltransferase_f']);
        $bioquimicaRef->setFosfataseAlcalinaM($_POST['cfosfatase_alcalina_m']);
        $bioquimicaRef->setFosfataseAlcalinaF($_POST['cfosfatase_alcalina_f']);
        $bioquimicaRef->setCreatinaQuinaseCkM($_POST['ccreatina_quinase_ck_m']);
        $bioquimicaRef->setCreatinaQuinaseCkF($_POST['ccreatina_quinase_ck_f']);
        $bioquimicaRef->setGlicose($_POST['cglicose']);
        $bioquimicaRef->setFerroMAte40Anos($_POST['cferro_m_ate_40_anos']);
        $bioquimicaRef->setFerroMMaisDe40Anos($_POST['cferro_m_mais_de_40_anos']);
        $bioquimicaRef->setFerroMMaisDe60Anos($_POST['cferro_m_mais_de_60_anos']);
        $bioquimicaRef->setFerroFAte40Anos($_POST['cferro_f_ate_40_anos']);
        $bioquimicaRef->setFerroFMaisDe40Anos($_POST['cferro_f_mais_de_40_anos']);
        $bioquimicaRef->setFerroFMaisDe60Anos($_POST['cferro_f_mais_de_60_anos']);
        $bioquimicaRef->setFerroCrianca($_POST['cferro_crianca']);
        $bioquimicaRef->setColesterolTotal($_POST['ccolesterol_total']);
        $bioquimicaRef->setHdlAte19Anos($_POST['chdl_ate_19_anos']);
        $bioquimicaRef->setHdlMaisDe20Anos($_POST['chdl_mais_de_20_anos']);
        $bioquimicaRef->setLdlBaixoRisco($_POST['cldl_baixo_risco']);
        $bioquimicaRef->setLdlRiscoIntermediario($_POST['cldl_risco_intermediario']);
        $bioquimicaRef->setLdlAltoRisco($_POST['cldl_alto_risco']);
        $bioquimicaRef->setLdlMuitoAltoRisco($_POST['cldl_muito_alto_risco']);
        $bioquimicaRef->setTriglicerideos($_POST['ctriglicerideos']);
        $bioquimicaRef->setUreiaMMenosDe50Anos($_POST['cureia_m_menos_de_50_anos']);
        $bioquimicaRef->setUreiaMMaisDe50Anos($_POST['cureia_m_mais_de_50_anos']);
        $bioquimicaRef->setUreiaFMenosDe50Anos($_POST['cureia_f_menos_de_50_anos']);
        $bioquimicaRef->setUreiaFMaisDe50Anos($_POST['cureia_f_mais_de_50_anos']);
        $bioquimicaRef->setUreiaCrianca($_POST['cureia_crianca']);
        $bioquimicaRef->setCreatininaM($_POST['ccreatinina_m']);
        $bioquimicaRef->setCreatininaF($_POST['ccreatinina_f']);
        $bioquimicaRef->setCreatininaCrianca($_POST['ccreatinina_crianca']);
        $bioquimicaRef->setAcidoUricoM13a18Anos($_POST['cacido_urico_m_13_a_18_anos']);
        $bioquimicaRef->setAcidoUricoMMaisDe18Anos($_POST['cacido_urico_m_mais_de_18_anos']);
        $bioquimicaRef->setAcidoUricoF10a18Anos($_POST['cacido_urico_f_10_a_18_anos']);
        $bioquimicaRef->setAcidoUricoFMaisDe18Anos($_POST['cacido_urico_f_mais_de_18_anos']);
        $bioquimicaRef->setPcrProteinaCReativa($_POST['cpcr_proteina_c_reativa']);
        $bioquimicaRef->setCalcio($_POST['ccalcio']);
        $bioquimicaRef->setLdh($_POST['cldh']);
        $bioquimicaRef->setMagnesioM($_POST['cmagnesio_m']);
        $bioquimicaRef->setMagnesioF($_POST['cmagnesio_f']);
        $bioquimicaRef->setMagnesioCrianca($_POST['cmagnesio_crianca']);
        $bioquimicaRef->setFosforoAdulto($_POST['cfosforo_adulto']);
        $bioquimicaRef->setFosforo1a3Anos($_POST['cfosforo_1_a_3_anos']);
        $bioquimicaRef->setFosforo4a12Anos($_POST['cfosforo_4_a_12_anos']);
        $bioquimicaRef->setFosforo13a15Anos($_POST['cfosforo_13_a_15_anos']);
        $bioquimicaRef->setFosforo16a18Anos($_POST['cfosforo_16_a_18_anos']);

        $sucesso = $bioquimicaController->editar($bioquimicaRef);

        if ($sucesso) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        header('Location: /bioquimicaRef');
        exit;
    });
};
