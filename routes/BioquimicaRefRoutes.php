<?php

return function (Router $router) {

    $router->get('/bioquimicaRef', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $bioquimicaController = new BioquimicaRefController();
        $bioquimicaController->VisualizarHematoRef();
    });

    $router->put('/bioquimicaRef', function () {

        $bioquimicaRef        = new ReferenciaBioquimica();
        $bioquimicaController = new BioquimicaRefController();

        $bioquimicaRef->setId($_POST['id'] ?? 1);
        $bioquimicaRef->setCbilirrubinaTotal($_POST['cbilirrubina_total']);
        $bioquimicaRef->setCbilirrubinaTotalUnidade($_POST['cbilirrubina_total_unidade']);
        $bioquimicaRef->setCbilirrubinaDireta($_POST['cbilirrubina_direta']);
        $bioquimicaRef->setCbilirrubinaDiretaUnidade($_POST['cbilirrubina_direta_unidade']);
        $bioquimicaRef->setCproteinaTotal($_POST['cproteina_total']);
        $bioquimicaRef->setCproteinaTotalUnidade($_POST['cproteina_total_unidade']);
        $bioquimicaRef->setCalbumina($_POST['calbumina']);
        $bioquimicaRef->setCalbuminaUnidade($_POST['calbumina_unidade']);
        $bioquimicaRef->setCamilase($_POST['camilase']);
        $bioquimicaRef->setCamilaseUnidade($_POST['camilase_unidade']);
        $bioquimicaRef->setCtgoTransaminaseGlutamicoOxalaceticaM($_POST['ctgo_transaminase_glutamico_oxalacetica_m']);
        $bioquimicaRef->setCtgoTransaminaseGlutamicoOxalaceticaF($_POST['ctgo_transaminase_glutamico_oxalacetica_f']);
        $bioquimicaRef->setCtgoTransaminaseGlutamicoOxalaceticaUnidade($_POST['ctgo_transaminase_glutamico_oxalacetica_unidade']);
        $bioquimicaRef->setCtgpTransaminaseGlutamicoPiruvicaM($_POST['ctgp_transaminase_glutamico_piruvica_m']);
        $bioquimicaRef->setCtgpTransaminaseGlutamicoPiruvicaF($_POST['ctgp_transaminase_glutamico_piruvica_f']);
        $bioquimicaRef->setCtgpTransaminaseGlutamicoPiruvicaUnidade($_POST['ctgp_transaminase_glutamico_piruvica_unidade']);
        $bioquimicaRef->setCgamaGtGlutamiltransferaseM($_POST['cgama_gt_glutamiltransferase_m']);
        $bioquimicaRef->setCgamaGtGlutamiltransferaseF($_POST['cgama_gt_glutamiltransferase_f']);
        $bioquimicaRef->setCgamaGtGlutamiltransferaseUnidade($_POST['cgama_gt_glutamiltransferase_unidade']);
        $bioquimicaRef->setCfosfataseAlcalinaM($_POST['cfosfatase_alcalina_m']);
        $bioquimicaRef->setCfosfataseAlcalinaF($_POST['cfosfatase_alcalina_f']);
        $bioquimicaRef->setCfosfataseAlcalinaUnidade($_POST['cfosfatase_alcalina_unidade']);
        $bioquimicaRef->setCcreatinaQuinaseCkM($_POST['ccreatina_quinase_ck_m']);
        $bioquimicaRef->setCcreatinaQuinaseCkF($_POST['ccreatina_quinase_ck_f']);
        $bioquimicaRef->setCcreatinaQuinaseCkUnidade($_POST['ccreatina_quinase_ck_unidade']);
        $bioquimicaRef->setCglicose($_POST['cglicose']);
        $bioquimicaRef->setCglicoseUnidade($_POST['cglicose_unidade']);
        $bioquimicaRef->setCferroMAte40Anos($_POST['cferro_m_ate_40_anos']);
        $bioquimicaRef->setCferroMMaisDe40Anos($_POST['cferro_m_mais_de_40_anos']);
        $bioquimicaRef->setCferroMMaisDe60Anos($_POST['cferro_m_mais_de_60_anos']);
        $bioquimicaRef->setCferroFAte40Anos($_POST['cferro_f_ate_40_anos']);
        $bioquimicaRef->setCferroFMaisDe40Anos($_POST['cferro_f_mais_de_40_anos']);
        $bioquimicaRef->setCferroFMaisDe60Anos($_POST['cferro_f_mais_de_60_anos']);
        $bioquimicaRef->setCferroCrianca($_POST['cferro_crianca']);
        $bioquimicaRef->setCferroUnidade($_POST['cferro_unidade']);
        $bioquimicaRef->setCcolesterolTotal($_POST['ccolesterol_total']);
        $bioquimicaRef->setCcolesterolTotalUnidade($_POST['ccolesterol_total_unidade']);
        $bioquimicaRef->setChdlAte19Anos($_POST['chdl_ate_19_anos']);
        $bioquimicaRef->setChdlMaisDe20Anos($_POST['chdl_mais_de_20_anos']);
        $bioquimicaRef->setChdlUnidade($_POST['chdl_unidade']);
        $bioquimicaRef->setCldlBaixoRisco($_POST['cldl_baixo_risco']);
        $bioquimicaRef->setCldlRiscoIntermediario($_POST['cldl_risco_intermediario']);
        $bioquimicaRef->setCldlAltoRisco($_POST['cldl_alto_risco']);
        $bioquimicaRef->setCldlMuitoAltoRisco($_POST['cldl_muito_alto_risco']);
        $bioquimicaRef->setCldlUnidade($_POST['cldl_unidade']);
        $bioquimicaRef->setCtriglicerideos($_POST['ctriglicerideos']);
        $bioquimicaRef->setCtriglicerideosUnidade($_POST['ctriglicerideos_unidade']);
        $bioquimicaRef->setCureiaMMenosDe50Anos($_POST['cureia_m_menos_de_50_anos']);
        $bioquimicaRef->setCureiaMMaisDe50Anos($_POST['cureia_m_mais_de_50_anos']);
        $bioquimicaRef->setCureiaFMenosDe50Anos($_POST['cureia_f_menos_de_50_anos']);
        $bioquimicaRef->setCureiaFMaisDe50Anos($_POST['cureia_f_mais_de_50_anos']);
        $bioquimicaRef->setCureiaCrianca($_POST['cureia_crianca']);
        $bioquimicaRef->setCureiaUnidade($_POST['cureia_unidade']);
        $bioquimicaRef->setCcreatininaM($_POST['ccreatinina_m']);
        $bioquimicaRef->setCcreatininaF($_POST['ccreatinina_f']);
        $bioquimicaRef->setCcreatininaCrianca($_POST['ccreatinina_crianca']);
        $bioquimicaRef->setCcreatininaUnidade($_POST['ccreatinina_unidade']);
        $bioquimicaRef->setCacidoUuricoM13A18Anos($_POST['cacido_urico_m_13_a_18_anos']);
        $bioquimicaRef->setCacidoUuricoMMaisDe18Anos($_POST['cacido_urico_m_mais_de_18_anos']);
        $bioquimicaRef->setCacidoUuricoF10A18Anos($_POST['cacido_urico_f_10_a_18_anos']);
        $bioquimicaRef->setCacidoUuricoFMaisDe18Anos($_POST['cacido_urico_f_mais_de_18_anos']);
        $bioquimicaRef->setCacidoUuricoUnidade($_POST['cacido_urico_unidade']);
        $bioquimicaRef->setCpcrProteinaCReativa($_POST['cpcr_proteina_c_reativa']);
        $bioquimicaRef->setCpcrProteinaCReativaUnidade($_POST['cpcr_proteina_c_reativa_unidade']);
        $bioquimicaRef->setCcalcio($_POST['ccalcio']);
        $bioquimicaRef->setCcalcioUnidade($_POST['ccalcio_unidade']);
        $bioquimicaRef->setCldh($_POST['cldh']);
        $bioquimicaRef->setCldhUnidade($_POST['cldh_unidade']);
        $bioquimicaRef->setCmagnesioM($_POST['cmagnesio_m']);
        $bioquimicaRef->setCmagnesioF($_POST['cmagnesio_f']);
        $bioquimicaRef->setCmagnesioCrianca($_POST['cmagnesio_crianca']);
        $bioquimicaRef->setCmagnesioUnidade($_POST['cmagnesio_unidade']);
        $bioquimicaRef->setCfosforoAdulto($_POST['cfosforo_adulto']);
        $bioquimicaRef->setCfosforo1A3Anos($_POST['cfosforo_1_a_3_anos']);
        $bioquimicaRef->setCfosforo4A12Anos($_POST['cfosforo_4_a_12_anos']);
        $bioquimicaRef->setCfosforo13A15Anos($_POST['cfosforo_13_a_15_anos']);
        $bioquimicaRef->setCfosforo16A18Anos($_POST['cfosforo_16_a_18_anos']);
        $bioquimicaRef->setCfosforoUnidade($_POST['cfosforo_unidade']);

        $sucesso = $bioquimicaController->editar($bioquimicaRef);

        if ($sucesso) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        header('Location: /hematoRef');
        exit;
    });

};
