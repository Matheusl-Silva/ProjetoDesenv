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
        return $this->converterParaObj($response);
    }

    public function atualizarReferencia(ReferenciaBioquimica $referencia)
    {
        $url = "http://localhost:3000/bioquimicaRef/" . $referencia->getId();

        $dados = [
            "cbilirrubina_total"                              => $referencia->getCbilirrubinaTotal(),
            "cbilirrubina_total_unidade"                      => $referencia->getCbilirrubinaTotalUnidade(),
            "cbilirrubina_direta"                             => $referencia->getCbilirrubinaDireta(),
            "cbilirrubina_direta_unidade"                     => $referencia->getCbilirrubinaDiretaUnidade(),
            "cproteina_total"                                 => $referencia->getCproteinaTotal(),
            "cproteina_total_unidade"                         => $referencia->getCproteinaTotalUnidade(),
            "calbumina"                                       => $referencia->getCalbumina(),
            "calbumina_unidade"                               => $referencia->getCalbuminaUnidade(),
            "camilase"                                        => $referencia->getCamilase(),
            "camilase_unidade"                                => $referencia->getCamilaseUnidade(),
            "ctgo_transaminase_glutamico_oxalacetica_m"       => $referencia->getCtgoTransaminaseGlutamicoOxalaceticaM(),
            "ctgo_transaminase_glutamico_oxalacetica_f"       => $referencia->getCtgoTransaminaseGlutamicoOxalaceticaF(),
            "ctgo_transaminase_glutamico_oxalacetica_unidade" => $referencia->getCtgoTransaminaseGlutamicoOxalaceticaUnidade(),
            "ctgp_transaminase_glutamico_piruvica_m"          => $referencia->getCtgpTransaminaseGlutamicoPiruvicaM(),
            "ctgp_transaminase_glutamico_piruvica_f"          => $referencia->getCtgpTransaminaseGlutamicoPiruvicaF(),
            "ctgp_transaminase_glutamico_piruvica_unidade"    => $referencia->getCtgpTransaminaseGlutamicoPiruvicaUnidade(),
            "cgama_gt_glutamiltransferase_m"                  => $referencia->getCgamaGtGlutamiltransferaseM(),
            "cgama_gt_glutamiltransferase_f"                  => $referencia->getCgamaGtGlutamiltransferaseF(),
            "cgama_gt_glutamiltransferase_unidade"            => $referencia->getCgamaGtGlutamiltransferaseUnidade(),
            "cfosfatase_alcalina_m"                           => $referencia->getCfosfataseAlcalinaM(),
            "cfosfatase_alcalina_f"                           => $referencia->getCfosfataseAlcalinaF(),
            "cfosfatase_alcalina_unidade"                     => $referencia->getCfosfataseAlcalinaUnidade(),
            "ccreatina_quinase_ck_m"                          => $referencia->getCcreatinaQuinaseCkM(),
            "ccreatina_quinase_ck_f"                          => $referencia->getCcreatinaQuinaseCkF(),
            "ccreatina_quinase_ck_unidade"                    => $referencia->getCcreatinaQuinaseCkUnidade(),
            "cglicose"                                        => $referencia->getCglicose(),
            "cglicose_unidade"                                => $referencia->getCglicoseUnidade(),
            "cferro_m_ate_40_anos"                            => $referencia->getCferroMAte40Anos(),
            "cferro_m_mais_de_40_anos"                        => $referencia->getCferroMMaisDe40Anos(),
            "cferro_m_mais_de_60_anos"                        => $referencia->getCferroMMaisDe60Anos(),
            "cferro_f_ate_40_anos"                            => $referencia->getCferroFAte40Anos(),
            "cferro_f_mais_de_40_anos"                        => $referencia->getCferroFMaisDe40Anos(),
            "cferro_f_mais_de_60_anos"                        => $referencia->getCferroFMaisDe60Anos(),
            "cferro_crianca"                                  => $referencia->getCferroCrianca(),
            "cferro_unidade"                                  => $referencia->getCferroUnidade(),
            "ccolesterol_total"                               => $referencia->getCcolesterolTotal(),
            "ccolesterol_total_unidade"                       => $referencia->getCcolesterolTotalUnidade(),
            "chdl_ate_19_anos"                                => $referencia->getChdlAte19Anos(),
            "chdl_mais_de_20_anos"                            => $referencia->getChdlMaisDe20Anos(),
            "chdl_unidade"                                    => $referencia->getChdlUnidade(),
            "cldl_baixo_risco"                                => $referencia->getCldlBaixoRisco(),
            "cldl_risco_intermediario"                        => $referencia->getCldlRiscoIntermediario(),
            "cldl_alto_risco"                                 => $referencia->getCldlAltoRisco(),
            "cldl_muito_alto_risco"                           => $referencia->getCldlMuitoAltoRisco(),
            "cldl_unidade"                                    => $referencia->getCldlUnidade(),
            "ctriglicerideos"                                 => $referencia->getCtriglicerideos(),
            "ctriglicerideos_unidade"                         => $referencia->getCtriglicerideosUnidade(),
            "cureia_m_menos_de_50_anos"                       => $referencia->getCureiaMMenosDe50Anos(),
            "cureia_m_mais_de_50_anos"                        => $referencia->getCureiaMMaisDe50Anos(),
            "cureia_f_menos_de_50_anos"                       => $referencia->getCureiaFMenosDe50Anos(),
            "cureia_f_mais_de_50_anos"                        => $referencia->getCureiaFMaisDe50Anos(),
            "cureia_crianca"                                  => $referencia->getCureiaCrianca(),
            "cureia_unidade"                                  => $referencia->getCureiaUnidade(),
            "ccreatinina_m"                                   => $referencia->getCcreatininaM(),
            "ccreatinina_f"                                   => $referencia->getCcreatininaF(),
            "ccreatinina_crianca"                             => $referencia->getCcreatininaCrianca(),
            "ccreatinina_unidade"                             => $referencia->getCcreatininaUnidade(),
            "cacido_urico_m_13_a_18_anos"                     => $referencia->getCacidoUuricoM13A18Anos(),
            "cacido_urico_m_mais_de_18_anos"                  => $referencia->getCacidoUuricoMMaisDe18Anos(),
            "cacido_urico_f_10_a_18_anos"                     => $referencia->getCacidoUuricoF10A18Anos(),
            "cacido_urico_f_mais_de_18_anos"                  => $referencia->getCacidoUuricoFMaisDe18Anos(),
            "cacido_urico_unidade"                            => $referencia->getCacidoUuricoUnidade(),
            "cpcr_proteina_c_reativa"                         => $referencia->getCpcrProteinaCReativa(),
            "cpcr_proteina_c_reativa_unidade"                 => $referencia->getCpcrProteinaCReativaUnidade(),
            "ccalcio"                                         => $referencia->getCcalcio(),
            "ccalcio_unidade"                                 => $referencia->getCcalcioUnidade(),
            "cldh"                                            => $referencia->getCldh(),
            "cldh_unidade"                                    => $referencia->getCldhUnidade(),
            "cmagnesio_m"                                     => $referencia->getCmagnesioM(),
            "cmagnesio_f"                                     => $referencia->getCmagnesioF(),
            "cmagnesio_crianca"                               => $referencia->getCmagnesioCrianca(),
            "cmagnesio_unidade"                               => $referencia->getCmagnesioUnidade(),
            "cfosforo_adulto"                                 => $referencia->getCfosforoAdulto(),
            "cfosforo_1_a_3_anos"                             => $referencia->getCfosforo1A3Anos(),
            "cfosforo_4_a_12_anos"                            => $referencia->getCfosforo4A12Anos(),
            "cfosforo_13_a_15_anos"                           => $referencia->getCfosforo13A15Anos(),
            "cfosforo_16_a_18_anos"                           => $referencia->getCfosforo16A18Anos(),
            "cfosforo_unidade"                                => $referencia->getCfosforoUnidade(),
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
        $referencia->setCbilirrubinaTotal($row['cbilirrubina_total']);
        $referencia->setCbilirrubinaTotalUnidade($row['cbilirrubina_total_unidade']);
        $referencia->setCbilirrubinaDireta($row['cbilirrubina_direta']);
        $referencia->setCbilirrubinaDiretaUnidade($row['cbilirrubina_direta_unidade']);
        $referencia->setCproteinaTotal($row['cproteina_total']);
        $referencia->setCproteinaTotalUnidade($row['cproteina_total_unidade']);
        $referencia->setCalbumina($row['calbumina']);
        $referencia->setCalbuminaUnidade($row['calbumina_unidade']);
        $referencia->setCamilase($row['camilase']);
        $referencia->setCamilaseUnidade($row['camilase_unidade']);
        $referencia->setCtgoTransaminaseGlutamicoOxalaceticaM($row['ctgo_transaminase_glutamico_oxalacetica_m']);
        $referencia->setCtgoTransaminaseGlutamicoOxalaceticaF($row['ctgo_transaminase_glutamico_oxalacetica_f']);
        $referencia->setCtgoTransaminaseGlutamicoOxalaceticaUnidade($row['ctgo_transaminase_glutamico_oxalacetica_unidade']);
        $referencia->setCtgpTransaminaseGlutamicoPiruvicaM($row['ctgp_transaminase_glutamico_piruvica_m']);
        $referencia->setCtgpTransaminaseGlutamicoPiruvicaF($row['ctgp_transaminase_glutamico_piruvica_f']);
        $referencia->setCtgpTransaminaseGlutamicoPiruvicaUnidade($row['ctgp_transaminase_glutamico_piruvica_unidade']);
        $referencia->setCgamaGtGlutamiltransferaseM($row['cgama_gt_glutamiltransferase_m']);
        $referencia->setCgamaGtGlutamiltransferaseF($row['cgama_gt_glutamiltransferase_f']);
        $referencia->setCgamaGtGlutamiltransferaseUnidade($row['cgama_gt_glutamiltransferase_unidade']);
        $referencia->setCfosfataseAlcalinaM($row['cfosfatase_alcalina_m']);
        $referencia->setCfosfataseAlcalinaF($row['cfosfatase_alcalina_f']);
        $referencia->setCfosfataseAlcalinaUnidade($row['cfosfatase_alcalina_unidade']);
        $referencia->setCcreatinaQuinaseCkM($row['ccreatina_quinase_ck_m']);
        $referencia->setCcreatinaQuinaseCkF($row['ccreatina_quinase_ck_f']);
        $referencia->setCcreatinaQuinaseCkUnidade($row['ccreatina_quinase_ck_unidade']);
        $referencia->setCglicose($row['cglicose']);
        $referencia->setCglicoseUnidade($row['cglicose_unidade']);
        $referencia->setCferroMAte40Anos($row['cferro_m_ate_40_anos']);
        $referencia->setCferroMMaisDe40Anos($row['cferro_m_mais_de_40_anos']);
        $referencia->setCferroMMaisDe60Anos($row['cferro_m_mais_de_60_anos']);
        $referencia->setCferroFAte40Anos($row['cferro_f_ate_40_anos']);
        $referencia->setCferroFMaisDe40Anos($row['cferro_f_mais_de_40_anos']);
        $referencia->setCferroFMaisDe60Anos($row['cferro_f_mais_de_60_anos']);
        $referencia->setCferroCrianca($row['cferro_crianca']);
        $referencia->setCferroUnidade($row['cferro_unidade']);
        $referencia->setCcolesterolTotal($row['ccolesterol_total']);
        $referencia->setCcolesterolTotalUnidade($row['ccolesterol_total_unidade']);
        $referencia->setChdlAte19Anos($row['chdl_ate_19_anos']);
        $referencia->setChdlMaisDe20Anos($row['chdl_mais_de_20_anos']);
        $referencia->setChdlUnidade($row['chdl_unidade']);
        $referencia->setCldlBaixoRisco($row['cldl_baixo_risco']);
        $referencia->setCldlRiscoIntermediario($row['cldl_risco_intermediario']);
        $referencia->setCldlAltoRisco($row['cldl_alto_risco']);
        $referencia->setCldlMuitoAltoRisco($row['cldl_muito_alto_risco']);
        $referencia->setCldlUnidade($row['cldl_unidade']);
        $referencia->setCtriglicerideos($row['ctriglicerideos']);
        $referencia->setCtriglicerideosUnidade($row['ctriglicerideos_unidade']);
        $referencia->setCureiaMMenosDe50Anos($row['cureia_m_menos_de_50_anos']);
        $referencia->setCureiaMMaisDe50Anos($row['cureia_m_mais_de_50_anos']);
        $referencia->setCureiaFMenosDe50Anos($row['cureia_f_menos_de_50_anos']);
        $referencia->setCureiaFMaisDe50Anos($row['cureia_f_mais_de_50_anos']);
        $referencia->setCureiaCrianca($row['cureia_crianca']);
        $referencia->setCureiaUnidade($row['cureia_unidade']);
        $referencia->setCcreatininaM($row['ccreatinina_m']);
        $referencia->setCcreatininaF($row['ccreatinina_f']);
        $referencia->setCcreatininaCrianca($row['ccreatinina_crianca']);
        $referencia->setCcreatininaUnidade($row['ccreatinina_unidade']);
        $referencia->setCacidoUuricoM13A18Anos($row['cacido_urico_m_13_a_18_anos']);
        $referencia->setCacidoUuricoMMaisDe18Anos($row['cacido_urico_m_mais_de_18_anos']);
        $referencia->setCacidoUuricoF10A18Anos($row['cacido_urico_f_10_a_18_anos']);
        $referencia->setCacidoUuricoFMaisDe18Anos($row['cacido_urico_f_mais_de_18_anos']);
        $referencia->setCacidoUuricoUnidade($row['cacido_urico_unidade']);
        $referencia->setCpcrProteinaCReativa($row['cpcr_proteina_c_reativa']);
        $referencia->setCpcrProteinaCReativaUnidade($row['cpcr_proteina_c_reativa_unidade']);
        $referencia->setCcalcio($row['ccalcio']);
        $referencia->setCcalcioUnidade($row['ccalcio_unidade']);
        $referencia->setCldh($row['cldh']);
        $referencia->setCldhUnidade($row['cldh_unidade']);
        $referencia->setCmagnesioM($row['cmagnesio_m']);
        $referencia->setCmagnesioF($row['cmagnesio_f']);
        $referencia->setCmagnesioCrianca($row['cmagnesio_crianca']);
        $referencia->setCmagnesioUnidade($row['cmagnesio_unidade']);
        $referencia->setCfosforoAdulto($row['cfosforo_adulto']);
        $referencia->setCfosforo1A3Anos($row['cfosforo_1_a_3_anos']);
        $referencia->setCfosforo4A12Anos($row['cfosforo_4_a_12_anos']);
        $referencia->setCfosforo13A15Anos($row['cfosforo_13_a_15_anos']);
        $referencia->setCfosforo16A18Anos($row['cfosforo_16_a_18_anos']);
        $referencia->setCfosforoUnidade($row['cfosforo_unidade']);

        return $referencia;
    }
}
