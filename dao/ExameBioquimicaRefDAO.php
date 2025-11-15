<?php
class ExameBioquimicaRefDAO
{

    public function buscarReferenciaBioquimica()
    {
        $url    = "http://localhost:3000/bioquimicaRef";
        $result = file_get_contents($url);

        if ($result == false) {
            return false;
        }

        $response = json_decode($result, true);
        return $this->converterParaObj($response[0]);
    }

    public function atualizarReferencia(ReferenciaBioquimica $referencia)
    {
        $url = "http://localhost:3000/bioquimicaRef/";

        $dados = [
            "bilirrubina_total"             => $referencia->getBilirrubinaTotal(),
            "bilirrubina_direta"            => $referencia->getBilirrubinaDireta(),
            "proteina_total"                => $referencia->getProteinaTotal(),
            "albumina"                      => $referencia->getAlbumina(),
            "amilase"                       => $referencia->getAmilase(),
            "tgo_transaminase_glutamico_oxalacetica_m" => $referencia->getTgoTransaminaseGlutamicoOxalaceticaM(),
            "tgo_transaminase_glutamico_oxalacetica_f" => $referencia->getTgoTransaminaseGlutamicoOxalaceticaF(),
            "tgp_transaminase_glutamico_piruvica_m"    => $referencia->getTgpTransaminaseGlutamicoPiruvicaM(),
            "tgp_transaminase_glutamico_piruvica_f"    => $referencia->getTgpTransaminaseGlutamicoPiruvicaF(),
            "gama_gt_glutamiltransferase_m"             => $referencia->getGamaGtGlutamiltransferaseM(),
            "gama_gt_glutamiltransferase_f"             => $referencia->getGamaGtGlutamiltransferaseF(),
            "fosfatase_alcalina_m"                      => $referencia->getFosfataseAlcalinaM(),
            "fosfatase_alcalina_f"                      => $referencia->getFosfataseAlcalinaF(),
            "creatina_quinase_ck_m"                     => $referencia->getCreatinaQuinaseCkM(),
            "creatina_quinase_ck_f"                     => $referencia->getCreatinaQuinaseCkF(),
            "glicose"                                   => $referencia->getGlicose(),
            "ferro_m_ate_40_anos"                       => $referencia->getFerroMAte40Anos(),
            "ferro_m_mais_de_40_anos"                   => $referencia->getFerroMMaisDe40Anos(),
            "ferro_m_mais_de_60_anos"                   => $referencia->getFerroMMaisDe60Anos(),
            "ferro_f_ate_40_anos"                       => $referencia->getFerroFAte40Anos(),
            "ferro_f_mais_de_40_anos"                   => $referencia->getFerroFMaisDe40Anos(),
            "ferro_f_mais_de_60_anos"                   => $referencia->getFerroFMaisDe60Anos(),
            "ferro_crianca"                             => $referencia->getFerroCrianca(),
            "colesterol_total"                          => $referencia->getColesterolTotal(),
            "hdl_ate_19_anos"                           => $referencia->getHdlAte19Anos(),
            "hdl_mais_de_20_anos"                       => $referencia->getHdlMaisDe20Anos(),
            "ldl_baixo_risco"                           => $referencia->getLdlBaixoRisco(),
            "ldl_risco_intermediario"                   => $referencia->getLdlRiscoIntermediario(),
            "ldl_alto_risco"                            => $referencia->getLdlAltoRisco(),
            "ldl_muito_alto_risco"                      => $referencia->getLdlMuitoAltoRisco(),
            "triglicerideos"                            => $referencia->getTriglicerideos(),
            "ureia_m_menos_de_50_anos"                  => $referencia->getUreiaMMenosDe50Anos(),
            "ureia_m_mais_de_50_anos"                   => $referencia->getUreiaMMaisDe50Anos(),
            "ureia_f_menos_de_50_anos"                  => $referencia->getUreiaFMenosDe50Anos(),
            "ureia_f_mais_de_50_anos"                   => $referencia->getUreiaFMaisDe50Anos(),
            "ureia_crianca"                             => $referencia->getUreiaCrianca(),
            "creatinina_m"                              => $referencia->getCreatininaM(),
            "creatinina_f"                              => $referencia->getCreatininaF(),
            "creatinina_crianca"                        => $referencia->getCreatininaCrianca(),
            "acido_urico_m_13_a_18_anos"               => $referencia->getAcidoUricoM13A18Anos(),
            "acido_urico_m_mais_de_18_anos"            => $referencia->getAcidoUricoMMaisDe18Anos(),
            "acido_urico_f_10_a_18_anos"               => $referencia->getAcidoUricoF10A18Anos(),
            "acido_urico_f_mais_de_18_anos"            => $referencia->getAcidoUricoFMaisDe18Anos(),
            "pcr_proteina_c_reativa"                    => $referencia->getPcrProteinaCReativa(),
            "calcio"                                    => $referencia->getCalcio(),
            "ldh"                                       => $referencia->getLdh(),
            "magnesio_m"                                => $referencia->getMagnesioM(),
            "magnesio_f"                                => $referencia->getMagnesioF(),
            "magnesio_crianca"                          => $referencia->getMagnesioCrianca(),
            "fosforo_adulto"                            => $referencia->getFosforoAdulto(),
            "fosforo_1_a_3_anos"                        => $referencia->getFosforo1A3Anos(),
            "fosforo_4_a_12_anos"                       => $referencia->getFosforo4A12Anos(),
            "fosforo_13_a_15_anos"                      => $referencia->getFosforo13A15Anos(),
            "fosforo_16_a_18_anos"                      => $referencia->getFosforo16A18Anos(),
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "PUT",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if ($result == false) {
            return ["erro" => "Falha na requisição PUT"];
        }

        return json_decode($result, true);
    }

    private function converterParaObj($row)
    {
        $referencia = new ReferenciaBioquimica();

        $referencia->setId($row['id'] ?? 1);
        $referencia->setBilirrubinaTotal($row['cbilirrubina_total']);
        $referencia->setBilirrubinaDireta($row['cbilirrubina_direta']);
        $referencia->setProteinaTotal($row['cproteina_total']);
        $referencia->setAlbumina($row['calbumina']);
        $referencia->setAmilase($row['camilase']);
        $referencia->setTgoTransaminaseGlutamicoOxalaceticaM($row['ctgo_transaminase_glutamico_oxalacetica_m']);
        $referencia->setTgoTransaminaseGlutamicoOxalaceticaF($row['ctgo_transaminase_glutamico_oxalacetica_f']);
        $referencia->setTgpTransaminaseGlutamicoPiruvicaM($row['ctgp_transaminase_glutamico_piruvica_m']);
        $referencia->setTgpTransaminaseGlutamicoPiruvicaF($row['ctgp_transaminase_glutamico_piruvica_f']);
        $referencia->setGamaGtGlutamiltransferaseM($row['cgama_gt_glutamiltransferase_m']);
        $referencia->setGamaGtGlutamiltransferaseF($row['cgama_gt_glutamiltransferase_f']);
        $referencia->setFosfataseAlcalinaM($row['cfosfatase_alcalina_m']);
        $referencia->setFosfataseAlcalinaF($row['cfosfatase_alcalina_f']);
        $referencia->setCreatinaQuinaseCkM($row['ccreatina_quinase_ck_m']);
        $referencia->setCreatinaQuinaseCkF($row['ccreatina_quinase_ck_f']);
        $referencia->setGlicose($row['cglicose']);
        $referencia->setFerroMAte40Anos($row['cferro_m_ate_40_anos']);
        $referencia->setFerroMMaisDe40Anos($row['cferro_m_mais_de_40_anos']);
        $referencia->setFerroMMaisDe60Anos($row['cferro_m_mais_de_60_anos']);
        $referencia->setFerroFAte40Anos($row['cferro_f_ate_40_anos']);
        $referencia->setFerroFMaisDe40Anos($row['cferro_f_mais_de_40_anos']);
        $referencia->setFerroFMaisDe60Anos($row['cferro_f_mais_de_60_anos']);
        $referencia->setFerroCrianca($row['cferro_crianca']);
        $referencia->setColesterolTotal($row['ccolesterol_total']);
        $referencia->setHdlAte19Anos($row['chdl_ate_19_anos']);
        $referencia->setHdlMaisDe20Anos($row['chdl_mais_de_20_anos']);
        $referencia->setLdlBaixoRisco($row['cldl_baixo_risco']);
        $referencia->setLdlRiscoIntermediario($row['cldl_risco_intermediario']);
        $referencia->setLdlAltoRisco($row['cldl_alto_risco']);
        $referencia->setLdlMuitoAltoRisco($row['cldl_muito_alto_risco']);
        $referencia->setTriglicerideos($row['ctriglicerideos']);
        $referencia->setUreiaMMenosDe50Anos($row['cureia_m_menos_de_50_anos']);
        $referencia->setUreiaMMaisDe50Anos($row['cureia_m_mais_de_50_anos']);
        $referencia->setUreiaFMenosDe50Anos($row['cureia_f_menos_de_50_anos']);
        $referencia->setUreiaFMaisDe50Anos($row['cureia_f_mais_de_50_anos']);
        $referencia->setUreiaCrianca($row['cureia_crianca']);
        $referencia->setCreatininaM($row['ccreatinina_m']);
        $referencia->setCreatininaF($row['ccreatinina_f']);
        $referencia->setCreatininaCrianca($row['ccreatinina_crianca']);
        $referencia->setAcidoUricoM13A18Anos($row['cacido_urico_m_13_a_18_anos']);
        $referencia->setAcidoUricoMMaisDe18Anos($row['cacido_urico_m_mais_de_18_anos']);
        $referencia->setAcidoUricoF10A18Anos($row['cacido_urico_f_10_a_18_anos']);
        $referencia->setAcidoUricoFMaisDe18Anos($row['cacido_urico_f_mais_de_18_anos']);
        $referencia->setPcrProteinaCReativa($row['cpcr_proteina_c_reativa']);
        $referencia->setCalcio($row['ccalcio']);
        $referencia->setLdh($row['cldh']);
        $referencia->setMagnesioM($row['cmagnesio_m']);
        $referencia->setMagnesioF($row['cmagnesio_f']);
        $referencia->setMagnesioCrianca($row['cmagnesio_crianca']);
        $referencia->setFosforoAdulto($row['cfosforo_adulto']);
        $referencia->setFosforo1A3Anos($row['cfosforo_1_a_3_anos']);
        $referencia->setFosforo4A12Anos($row['cfosforo_4_a_12_anos']);
        $referencia->setFosforo13A15Anos($row['cfosforo_13_a_15_anos']);
        $referencia->setFosforo16A18Anos($row['cfosforo_16_a_18_anos']);

        return $referencia;
    }
}
