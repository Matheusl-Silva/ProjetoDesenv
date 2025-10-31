<?php

class ReferenciaBioquimica
{
    private $id;
    private $cbilirrubina_total;
    private $cbilirrubina_total_unidade;
    private $cbilirrubina_direta;
    private $cbilirrubina_direta_unidade;
    private $cproteina_total;
    private $cproteina_total_unidade;
    private $calbumina;
    private $calbumina_unidade;
    private $camilase;
    private $camilase_unidade;
    private $ctgo_transaminase_glutamico_oxalacetica_m;
    private $ctgo_transaminase_glutamico_oxalacetica_f;
    private $ctgo_transaminase_glutamico_oxalacetica_unidade;
    private $ctgp_transaminase_glutamico_piruvica_m;
    private $ctgp_transaminase_glutamico_piruvica_f;
    private $ctgp_transaminase_glutamico_piruvica_unidade;
    private $cgama_gt_glutamiltransferase_m;
    private $cgama_gt_glutamiltransferase_f;
    private $cgama_gt_glutamiltransferase_unidade;
    private $cfosfatase_alcalina_m;
    private $cfosfatase_alcalina_f;
    private $cfosfatase_alcalina_unidade;
    private $ccreatina_quinase_ck_m;
    private $ccreatina_quinase_ck_f;
    private $ccreatina_quinase_ck_unidade;
    private $cglicose;
    private $cglicose_unidade;
    private $cferro_m_ate_40_anos;
    private $cferro_m_mais_de_40_anos;
    private $cferro_m_mais_de_60_anos;
    private $cferro_f_ate_40_anos;
    private $cferro_f_mais_de_40_anos;
    private $cferro_f_mais_de_60_anos;
    private $cferro_crianca;
    private $cferro_unidade;
    private $ccolesterol_total;
    private $ccolesterol_total_unidade;
    private $chdl_ate_19_anos;
    private $chdl_mais_de_20_anos;
    private $chdl_unidade;
    private $cldl_baixo_risco;
    private $cldl_risco_intermediario;
    private $cldl_alto_risco;
    private $cldl_muito_alto_risco;
    private $cldl_unidade;
    private $ctriglicerideos;
    private $ctriglicerideos_unidade;
    private $cureia_m_menos_de_50_anos;
    private $cureia_m_mais_de_50_anos;
    private $cureia_f_menos_de_50_anos;
    private $cureia_f_mais_de_50_anos;
    private $cureia_crianca;
    private $cureia_unidade;
    private $ccreatinina_m;
    private $ccreatinina_f;
    private $ccreatinina_crianca;
    private $ccreatinina_unidade;
    private $cacido_urico_m_13_a_18_anos;
    private $cacido_urico_m_mais_de_18_anos;
    private $cacido_urico_f_10_a_18_anos;
    private $cacido_urico_f_mais_de_18_anos;
    private $cacido_urico_unidade;
    private $cpcr_proteina_c_reativa;
    private $cpcr_proteina_c_reativa_unidade;
    private $ccalcio;
    private $ccalcio_unidade;
    private $cldh;
    private $cldh_unidade;
    private $cmagnesio_m;
    private $cmagnesio_f;
    private $cmagnesio_crianca;
    private $cmagnesio_unidade;
    private $cfosforo_adulto;
    private $cfosforo_1_a_3_anos;
    private $cfosforo_4_a_12_anos;
    private $cfosforo_13_a_15_anos;
    private $cfosforo_16_a_18_anos;
    private $cfosforo_unidade;

    // Getters e Setters
    public function getId()
    {return $this->id;}
    public function setId($id)
    {$this->id = $id;}

    public function getCbilirrubinaTotal()
    {return $this->cbilirrubina_total;}
    public function setCbilirrubinaTotal($cbilirrubina_total)
    {$this->cbilirrubina_total = $cbilirrubina_total;}

    public function getCbilirrubinaTotalUnidade()
    {return $this->cbilirrubina_total_unidade;}
    public function setCbilirrubinaTotalUnidade($cbilirrubina_total_unidade)
    {$this->cbilirrubina_total_unidade = $cbilirrubina_total_unidade;}

    public function getCbilirrubinaDireta()
    {return $this->cbilirrubina_direta;}
    public function setCbilirrubinaDireta($cbilirrubina_direta)
    {$this->cbilirrubina_direta = $cbilirrubina_direta;}

    public function getCbilirrubinaDiretaUnidade()
    {return $this->cbilirrubina_direta_unidade;}
    public function setCbilirrubinaDiretaUnidade($cbilirrubina_direta_unidade)
    {$this->cbilirrubina_direta_unidade = $cbilirrubina_direta_unidade;}

    public function getCproteinaTotal()
    {return $this->cproteina_total;}
    public function setCproteinaTotal($cproteina_total)
    {$this->cproteina_total = $cproteina_total;}

    public function getCproteinaTotalUnidade()
    {return $this->cproteina_total_unidade;}
    public function setCproteinaTotalUnidade($cproteina_total_unidade)
    {$this->cproteina_total_unidade = $cproteina_total_unidade;}

    public function getCalbumina()
    {return $this->calbumina;}
    public function setCalbumina($calbumina)
    {$this->calbumina = $calbumina;}

    public function getCalbuminaUnidade()
    {return $this->calbumina_unidade;}
    public function setCalbuminaUnidade($calbumina_unidade)
    {$this->calbumina_unidade = $calbumina_unidade;}

    public function getCamilase()
    {return $this->camilase;}
    public function setCamilase($camilase)
    {$this->camilase = $camilase;}

    public function getCamilaseUnidade()
    {return $this->camilase_unidade;}
    public function setCamilaseUnidade($camilase_unidade)
    {$this->camilase_unidade = $camilase_unidade;}

    public function getCtgoTransaminaseGlutamicoOxalaceticaM()
    {return $this->ctgo_transaminase_glutamico_oxalacetica_m;}
    public function setCtgoTransaminaseGlutamicoOxalaceticaM($ctgo_transaminase_glutamico_oxalacetica_m)
    {$this->ctgo_transaminase_glutamico_oxalacetica_m = $ctgo_transaminase_glutamico_oxalacetica_m;}

    public function getCtgoTransaminaseGlutamicoOxalaceticaF()
    {return $this->ctgo_transaminase_glutamico_oxalacetica_f;}
    public function setCtgoTransaminaseGlutamicoOxalaceticaF($ctgo_transaminase_glutamico_oxalacetica_f)
    {$this->ctgo_transaminase_glutamico_oxalacetica_f = $ctgo_transaminase_glutamico_oxalacetica_f;}

    public function getCtgoTransaminaseGlutamicoOxalaceticaUnidade()
    {return $this->ctgo_transaminase_glutamico_oxalacetica_unidade;}
    public function setCtgoTransaminaseGlutamicoOxalaceticaUnidade($ctgo_transaminase_glutamico_oxalacetica_unidade)
    {$this->ctgo_transaminase_glutamico_oxalacetica_unidade = $ctgo_transaminase_glutamico_oxalacetica_unidade;}

    public function getCtgpTransaminaseGlutamicoPiruvicaM()
    {return $this->ctgp_transaminase_glutamico_piruvica_m;}
    public function setCtgpTransaminaseGlutamicoPiruvicaM($ctgp_transaminase_glutamico_piruvica_m)
    {$this->ctgp_transaminase_glutamico_piruvica_m = $ctgp_transaminase_glutamico_piruvica_m;}

    public function getCtgpTransaminaseGlutamicoPiruvicaF()
    {return $this->ctgp_transaminase_glutamico_piruvica_f;}
    public function setCtgpTransaminaseGlutamicoPiruvicaF($ctgp_transaminase_glutamico_piruvica_f)
    {$this->ctgp_transaminase_glutamico_piruvica_f = $ctgp_transaminase_glutamico_piruvica_f;}

    public function getCtgpTransaminaseGlutamicoPiruvicaUnidade()
    {return $this->ctgp_transaminase_glutamico_piruvica_unidade;}
    public function setCtgpTransaminaseGlutamicoPiruvicaUnidade($ctgp_transaminase_glutamico_piruvica_unidade)
    {$this->ctgp_transaminase_glutamico_piruvica_unidade = $ctgp_transaminase_glutamico_piruvica_unidade;}

    public function getCgamaGtGlutamiltransferaseM()
    {return $this->cgama_gt_glutamiltransferase_m;}
    public function setCgamaGtGlutamiltransferaseM($cgama_gt_glutamiltransferase_m)
    {$this->cgama_gt_glutamiltransferase_m = $cgama_gt_glutamiltransferase_m;}

    public function getCgamaGtGlutamiltransferaseF()
    {return $this->cgama_gt_glutamiltransferase_f;}
    public function setCgamaGtGlutamiltransferaseF($cgama_gt_glutamiltransferase_f)
    {$this->cgama_gt_glutamiltransferase_f = $cgama_gt_glutamiltransferase_f;}

    public function getCgamaGtGlutamiltransferaseUnidade()
    {return $this->cgama_gt_glutamiltransferase_unidade;}
    public function setCgamaGtGlutamiltransferaseUnidade($cgama_gt_glutamiltransferase_unidade)
    {$this->cgama_gt_glutamiltransferase_unidade = $cgama_gt_glutamiltransferase_unidade;}

    public function getCfosfataseAlcalinaM()
    {return $this->cfosfatase_alcalina_m;}
    public function setCfosfataseAlcalinaM($cfosfatase_alcalina_m)
    {$this->cfosfatase_alcalina_m = $cfosfatase_alcalina_m;}

    public function getCfosfataseAlcalinaF()
    {return $this->cfosfatase_alcalina_f;}
    public function setCfosfataseAlcalinaF($cfosfatase_alcalina_f)
    {$this->cfosfatase_alcalina_f = $cfosfatase_alcalina_f;}

    public function getCfosfataseAlcalinaUnidade()
    {return $this->cfosfatase_alcalina_unidade;}
    public function setCfosfataseAlcalinaUnidade($cfosfatase_alcalina_unidade)
    {$this->cfosfatase_alcalina_unidade = $cfosfatase_alcalina_unidade;}

    public function getCcreatinaQuinaseCkM()
    {return $this->ccreatina_quinase_ck_m;}
    public function setCcreatinaQuinaseCkM($ccreatina_quinase_ck_m)
    {$this->ccreatina_quinase_ck_m = $ccreatina_quinase_ck_m;}

    public function getCcreatinaQuinaseCkF()
    {return $this->ccreatina_quinase_ck_f;}
    public function setCcreatinaQuinaseCkF($ccreatina_quinase_ck_f)
    {$this->ccreatina_quinase_ck_f = $ccreatina_quinase_ck_f;}

    public function getCcreatinaQuinaseCkUnidade()
    {return $this->ccreatina_quinase_ck_unidade;}
    public function setCcreatinaQuinaseCkUnidade($ccreatina_quinase_ck_unidade)
    {$this->ccreatina_quinase_ck_unidade = $ccreatina_quinase_ck_unidade;}

    public function getCglicose()
    {return $this->cglicose;}
    public function setCglicose($cglicose)
    {$this->cglicose = $cglicose;}

    public function getCglicoseUnidade()
    {return $this->cglicose_unidade;}
    public function setCglicoseUnidade($cglicose_unidade)
    {$this->cglicose_unidade = $cglicose_unidade;}

    public function getCferroMAte40Anos()
    {return $this->cferro_m_ate_40_anos;}
    public function setCferroMAte40Anos($cferro_m_ate_40_anos)
    {$this->cferro_m_ate_40_anos = $cferro_m_ate_40_anos;}

    public function getCferroMMaisDe40Anos()
    {return $this->cferro_m_mais_de_40_anos;}
    public function setCferroMMaisDe40Anos($cferro_m_mais_de_40_anos)
    {$this->cferro_m_mais_de_40_anos = $cferro_m_mais_de_40_anos;}

    public function getCferroMMaisDe60Anos()
    {return $this->cferro_m_mais_de_60_anos;}
    public function setCferroMMaisDe60Anos($cferro_m_mais_de_60_anos)
    {$this->cferro_m_mais_de_60_anos = $cferro_m_mais_de_60_anos;}

    public function getCferroFAte40Anos()
    {return $this->cferro_f_ate_40_anos;}
    public function setCferroFAte40Anos($cferro_f_ate_40_anos)
    {$this->cferro_f_ate_40_anos = $cferro_f_ate_40_anos;}

    public function getCferroFMaisDe40Anos()
    {return $this->cferro_f_mais_de_40_anos;}
    public function setCferroFMaisDe40Anos($cferro_f_mais_de_40_anos)
    {$this->cferro_f_mais_de_40_anos = $cferro_f_mais_de_40_anos;}

    public function getCferroFMaisDe60Anos()
    {return $this->cferro_f_mais_de_60_anos;}
    public function setCferroFMaisDe60Anos($cferro_f_mais_de_60_anos)
    {$this->cferro_f_mais_de_60_anos = $cferro_f_mais_de_60_anos;}

    public function getCferroCrianca()
    {return $this->cferro_crianca;}
    public function setCferroCrianca($cferro_crianca)
    {$this->cferro_crianca = $cferro_crianca;}

    public function getCferroUnidade()
    {return $this->cferro_unidade;}
    public function setCferroUnidade($cferro_unidade)
    {$this->cferro_unidade = $cferro_unidade;}

    public function getCcolesterolTotal()
    {return $this->ccolesterol_total;}
    public function setCcolesterolTotal($ccolesterol_total)
    {$this->ccolesterol_total = $ccolesterol_total;}

    public function getCcolesterolTotalUnidade()
    {return $this->ccolesterol_total_unidade;}
    public function setCcolesterolTotalUnidade($ccolesterol_total_unidade)
    {$this->ccolesterol_total_unidade = $ccolesterol_total_unidade;}

    public function getChdlAte19Anos()
    {return $this->chdl_ate_19_anos;}
    public function setChdlAte19Anos($chdl_ate_19_anos)
    {$this->chdl_ate_19_anos = $chdl_ate_19_anos;}

    public function getChdlMaisDe20Anos()
    {return $this->chdl_mais_de_20_anos;}
    public function setChdlMaisDe20Anos($chdl_mais_de_20_anos)
    {$this->chdl_mais_de_20_anos = $chdl_mais_de_20_anos;}

    public function getChdlUnidade()
    {return $this->chdl_unidade;}
    public function setChdlUnidade($chdl_unidade)
    {$this->chdl_unidade = $chdl_unidade;}

    public function getCldlBaixoRisco()
    {return $this->cldl_baixo_risco;}
    public function setCldlBaixoRisco($cldl_baixo_risco)
    {$this->cldl_baixo_risco = $cldl_baixo_risco;}

    public function getCldlRiscoIntermediario()
    {return $this->cldl_risco_intermediario;}
    public function setCldlRiscoIntermediario($cldl_risco_intermediario)
    {$this->cldl_risco_intermediario = $cldl_risco_intermediario;}

    public function getCldlAltoRisco()
    {return $this->cldl_alto_risco;}
    public function setCldlAltoRisco($cldl_alto_risco)
    {$this->cldl_alto_risco = $cldl_alto_risco;}

    public function getCldlMuitoAltoRisco()
    {return $this->cldl_muito_alto_risco;}
    public function setCldlMuitoAltoRisco($cldl_muito_alto_risco)
    {$this->cldl_muito_alto_risco = $cldl_muito_alto_risco;}

    public function getCldlUnidade()
    {return $this->cldl_unidade;}
    public function setCldlUnidade($cldl_unidade)
    {$this->cldl_unidade = $cldl_unidade;}

    public function getCtriglicerideos()
    {return $this->ctriglicerideos;}
    public function setCtriglicerideos($ctriglicerideos)
    {$this->ctriglicerideos = $ctriglicerideos;}

    public function getCtriglicerideosUnidade()
    {return $this->ctriglicerideos_unidade;}
    public function setCtriglicerideosUnidade($ctriglicerideos_unidade)
    {$this->ctriglicerideos_unidade = $ctriglicerideos_unidade;}

    public function getCureiaMMenosDe50Anos()
    {return $this->cureia_m_menos_de_50_anos;}
    public function setCureiaMMenosDe50Anos($cureia_m_menos_de_50_anos)
    {$this->cureia_m_menos_de_50_anos = $cureia_m_menos_de_50_anos;}

    public function getCureiaMMaisDe50Anos()
    {return $this->cureia_m_mais_de_50_anos;}
    public function setCureiaMMaisDe50Anos($cureia_m_mais_de_50_anos)
    {$this->cureia_m_mais_de_50_anos = $cureia_m_mais_de_50_anos;}

    public function getCureiaFMenosDe50Anos()
    {return $this->cureia_f_menos_de_50_anos;}
    public function setCureiaFMenosDe50Anos($cureia_f_menos_de_50_anos)
    {$this->cureia_f_menos_de_50_anos = $cureia_f_menos_de_50_anos;}

    public function getCureiaFMaisDe50Anos()
    {return $this->cureia_f_mais_de_50_anos;}
    public function setCureiaFMaisDe50Anos($cureia_f_mais_de_50_anos)
    {$this->cureia_f_mais_de_50_anos = $cureia_f_mais_de_50_anos;}

    public function getCureiaCrianca()
    {return $this->cureia_crianca;}
    public function setCureiaCrianca($cureia_crianca)
    {$this->cureia_crianca = $cureia_crianca;}

    public function getCureiaUnidade()
    {return $this->cureia_unidade;}
    public function setCureiaUnidade($cureia_unidade)
    {$this->cureia_unidade = $cureia_unidade;}

    public function getCcreatininaM()
    {return $this->ccreatinina_m;}
    public function setCcreatininaM($ccreatinina_m)
    {$this->ccreatinina_m = $ccreatinina_m;}

    public function getCcreatininaF()
    {return $this->ccreatinina_f;}
    public function setCcreatininaF($ccreatinina_f)
    {$this->ccreatinina_f = $ccreatinina_f;}

    public function getCcreatininaCrianca()
    {return $this->ccreatinina_crianca;}
    public function setCcreatininaCrianca($ccreatinina_crianca)
    {$this->ccreatinina_crianca = $ccreatinina_crianca;}

    public function getCcreatininaUnidade()
    {return $this->ccreatinina_unidade;}
    public function setCcreatininaUnidade($ccreatinina_unidade)
    {$this->ccreatinina_unidade = $ccreatinina_unidade;}

    public function getCacidoUuricoM13A18Anos()
    {return $this->cacido_urico_m_13_a_18_anos;}
    public function setCacidoUuricoM13A18Anos($cacido_urico_m_13_a_18_anos)
    {$this->cacido_urico_m_13_a_18_anos = $cacido_urico_m_13_a_18_anos;}

    public function getCacidoUuricoMMaisDe18Anos()
    {return $this->cacido_urico_m_mais_de_18_anos;}
    public function setCacidoUuricoMMaisDe18Anos($cacido_urico_m_mais_de_18_anos)
    {$this->cacido_urico_m_mais_de_18_anos = $cacido_urico_m_mais_de_18_anos;}

    public function getCacidoUuricoF10A18Anos()
    {return $this->cacido_urico_f_10_a_18_anos;}
    public function setCacidoUuricoF10A18Anos($cacido_urico_f_10_a_18_anos)
    {$this->cacido_urico_f_10_a_18_anos = $cacido_urico_f_10_a_18_anos;}

    public function getCacidoUuricoFMaisDe18Anos()
    {return $this->cacido_urico_f_mais_de_18_anos;}
    public function setCacidoUuricoFMaisDe18Anos($cacido_urico_f_mais_de_18_anos)
    {$this->cacido_urico_f_mais_de_18_anos = $cacido_urico_f_mais_de_18_anos;}

    public function getCacidoUuricoUnidade()
    {return $this->cacido_urico_unidade;}
    public function setCacidoUuricoUnidade($cacido_urico_unidade)
    {$this->cacido_urico_unidade = $cacido_urico_unidade;}

    public function getCpcrProteinaCReativa()
    {return $this->cpcr_proteina_c_reativa;}
    public function setCpcrProteinaCReativa($cpcr_proteina_c_reativa)
    {$this->cpcr_proteina_c_reativa = $cpcr_proteina_c_reativa;}

    public function getCpcrProteinaCReativaUnidade()
    {return $this->cpcr_proteina_c_reativa_unidade;}
    public function setCpcrProteinaCReativaUnidade($cpcr_proteina_c_reativa_unidade)
    {$this->cpcr_proteina_c_reativa_unidade = $cpcr_proteina_c_reativa_unidade;}

    public function getCcalcio()
    {return $this->ccalcio;}
    public function setCcalcio($ccalcio)
    {$this->ccalcio = $ccalcio;}

    public function getCcalcioUnidade()
    {return $this->ccalcio_unidade;}
    public function setCcalcioUnidade($ccalcio_unidade)
    {$this->ccalcio_unidade = $ccalcio_unidade;}

    public function getCldh()
    {return $this->cldh;}
    public function setCldh($cldh)
    {$this->cldh = $cldh;}

    public function getCldhUnidade()
    {return $this->cldh_unidade;}
    public function setCldhUnidade($cldh_unidade)
    {$this->cldh_unidade = $cldh_unidade;}

    public function getCmagnesioM()
    {return $this->cmagnesio_m;}
    public function setCmagnesioM($cmagnesio_m)
    {$this->cmagnesio_m = $cmagnesio_m;}

    public function getCmagnesioF()
    {return $this->cmagnesio_f;}
    public function setCmagnesioF($cmagnesio_f)
    {$this->cmagnesio_f = $cmagnesio_f;}

    public function getCmagnesioCrianca()
    {return $this->cmagnesio_crianca;}
    public function setCmagnesioCrianca($cmagnesio_crianca)
    {$this->cmagnesio_crianca = $cmagnesio_crianca;}

    public function getCmagnesioUnidade()
    {return $this->cmagnesio_unidade;}
    public function setCmagnesioUnidade($cmagnesio_unidade)
    {$this->cmagnesio_unidade = $cmagnesio_unidade;}

    public function getCfosforoAdulto()
    {return $this->cfosforo_adulto;}
    public function setCfosforoAdulto($cfosforo_adulto)
    {$this->cfosforo_adulto = $cfosforo_adulto;}

    public function getCfosforo1A3Anos()
    {return $this->cfosforo_1_a_3_anos;}
    public function setCfosforo1A3Anos($cfosforo_1_a_3_anos)
    {$this->cfosforo_1_a_3_anos = $cfosforo_1_a_3_anos;}

    public function getCfosforo4A12Anos()
    {return $this->cfosforo_4_a_12_anos;}
    public function setCfosforo4A12Anos($cfosforo_4_a_12_anos)
    {$this->cfosforo_4_a_12_anos = $cfosforo_4_a_12_anos;}

    public function getCfosforo13A15Anos()
    {return $this->cfosforo_13_a_15_anos;}
    public function setCfosforo13A15Anos($cfosforo_13_a_15_anos)
    {$this->cfosforo_13_a_15_anos = $cfosforo_13_a_15_anos;}

    public function getCfosforo16A18Anos()
    {return $this->cfosforo_16_a_18_anos;}
    public function setCfosforo16A18Anos($cfosforo_16_a_18_anos)
    {$this->cfosforo_16_a_18_anos = $cfosforo_16_a_18_anos;}

    public function getCfosforoUnidade()
    {return $this->cfosforo_unidade;}
    public function setCfosforoUnidade($cfosforo_unidade)
    {$this->cfosforo_unidade = $cfosforo_unidade;}
}