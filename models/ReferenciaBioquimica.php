<?php

class ReferenciaBioquimica
{
    private $id;
    private $bilirrubina_total;
    private $bilirrubina_total_unidade;
    private $bilirrubina_direta;
    private $bilirrubina_direta_unidade;
    private $proteina_total;
    private $proteina_total_unidade;
    private $albumina;
    private $albumina_unidade;
    private $amilase;
    private $amilase_unidade;
    private $tgo_transaminase_glutamico_oxalacetica_m;
    private $tgo_transaminase_glutamico_oxalacetica_f;
    private $tgo_transaminase_glutamico_oxalacetica_unidade;
    private $tgp_transaminase_glutamico_piruvica_m;
    private $tgp_transaminase_glutamico_piruvica_f;
    private $tgp_transaminase_glutamico_piruvica_unidade;
    private $gama_gt_glutamiltransferase_m;
    private $gama_gt_glutamiltransferase_f;
    private $gama_gt_glutamiltransferase_unidade;
    private $fosfatase_alcalina_m;
    private $fosfatase_alcalina_f;
    private $fosfatase_alcalina_unidade;
    private $creatina_quinase_ck_m;
    private $creatina_quinase_ck_f;
    private $creatina_quinase_ck_unidade;
    private $glicose;
    private $glicose_unidade;

    private $ferro_m_ate_40_anos;
    private $ferro_m_mais_de_40_anos;
    private $ferro_m_mais_de_60_anos;
    private $ferro_f_ate_40_anos;
    private $ferro_f_mais_de_40_anos;
    private $ferro_f_mais_de_60_anos;
    private $ferro_crianca;
    private $ferro_unidade;

    private $colesterol_total;
    private $colesterol_total_unidade;
    private $hdl_ate_19_anos;
    private $hdl_mais_de_20_anos;
    private $hdl_unidade;
    private $ldl_baixo_risco;
    private $ldl_risco_intermediario;
    private $ldl_alto_risco;
    private $ldl_muito_alto_risco;
    private $ldl_unidade;
    private $triglicerideos;
    private $triglicerideos_unidade;

    private $ureia_m_menos_de_50_anos;
    private $ureia_m_mais_de_50_anos;
    private $ureia_f_menos_de_50_anos;
    private $ureia_f_mais_de_50_anos;
    private $ureia_crianca;
    private $ureia_unidade;

    private $creatinina_m;
    private $creatinina_f;
    private $creatinina_crianca;
    private $creatinina_unidade;

    private $acido_urico_m_13_a_18_anos;
    private $acido_urico_m_mais_de_18_anos;
    private $acido_urico_f_1_a_9_anos;
    private $acido_urico_f_10_a_18_anos;
    private $acido_urico_f_mais_de_18_anos;
    private $acido_urico_unidade;

    private $pcr_proteina_c_reativa;
    private $pcr_proteina_c_reativa_unidade;

    private $calcio;
    private $calcio_unidade;

    private $ldh;
    private $ldh_unidade;

    private $magnesio_m;
    private $magnesio_f;
    private $magnesio_crianca;
    private $magnesio_unidade;

    private $fosforo_adulto;
    private $fosforo_1_a_3_anos;
    private $fosforo_4_a_12_anos;
    private $fosforo_13_a_15_anos;
    private $fosforo_16_a_18_anos;
    private $fosforo_unidade;

    // Getters e Setters
    public function getId() { return $this->id; }
    public function setId($valor) { $this->id = $valor; }

    public function getBilirrubinaTotal() { return $this->bilirrubina_total; }
    public function setBilirrubinaTotal($valor) { $this->bilirrubina_total = $valor; }

    public function getBilirrubinaTotalUnidade() { return $this->bilirrubina_total_unidade; }
    public function setBilirrubinaTotalUnidade($valor) { $this->bilirrubina_total_unidade = $valor; }

    public function getBilirrubinaDireta() { return $this->bilirrubina_direta; }
    public function setBilirrubinaDireta($valor) { $this->bilirrubina_direta = $valor; }

    public function getBilirrubinaDiretaUnidade() { return $this->bilirrubina_direta_unidade; }
    public function setBilirrubinaDiretaUnidade($valor) { $this->bilirrubina_direta_unidade = $valor; }

    public function getProteinaTotal() { return $this->proteina_total; }
    public function setProteinaTotal($valor) { $this->proteina_total = $valor; }

    public function getProteinaTotalUnidade() { return $this->proteina_total_unidade; }
    public function setProteinaTotalUnidade($valor) { $this->proteina_total_unidade = $valor; }

    public function getAlbumina() { return $this->albumina; }
    public function setAlbumina($valor) { $this->albumina = $valor; }

    public function getAlbuminaUnidade() { return $this->albumina_unidade; }
    public function setAlbuminaUnidade($valor) { $this->albumina_unidade = $valor; }

    public function getAmilase() { return $this->amilase; }
    public function setAmilase($valor) { $this->amilase = $valor; }

    public function getAmilaseUnidade() { return $this->amilase_unidade; }
    public function setAmilaseUnidade($valor) { $this->amilase_unidade = $valor; }

    public function getTgoTransaminaseGlutamicoOxalaceticaM() { return $this->tgo_transaminase_glutamico_oxalacetica_m; }
    public function setTgoTransaminaseGlutamicoOxalaceticaM($valor) { $this->tgo_transaminase_glutamico_oxalacetica_m = $valor; }

    public function getTgoTransaminaseGlutamicoOxalaceticaF() { return $this->tgo_transaminase_glutamico_oxalacetica_f; }
    public function setTgoTransaminaseGlutamicoOxalaceticaF($valor) { $this->tgo_transaminase_glutamico_oxalacetica_f = $valor; }

    public function getTgoTransaminaseGlutamicoOxalaceticaUnidade() { return $this->tgo_transaminase_glutamico_oxalacetica_unidade; }
    public function setTgoTransaminaseGlutamicoOxalaceticaUnidade($valor) { $this->tgo_transaminase_glutamico_oxalacetica_unidade = $valor; }

    public function getTgpTransaminaseGlutamicoPiruvicaM() { return $this->tgp_transaminase_glutamico_piruvica_m; }
    public function setTgpTransaminaseGlutamicoPiruvicaM($valor) { $this->tgp_transaminase_glutamico_piruvica_m = $valor; }

    public function getTgpTransaminaseGlutamicoPiruvicaF() { return $this->tgp_transaminase_glutamico_piruvica_f; }
    public function setTgpTransaminaseGlutamicoPiruvicaF($valor) { $this->tgp_transaminase_glutamico_piruvica_f = $valor; }

    public function getTgpTransaminaseGlutamicoPiruvicaUnidade() { return $this->tgp_transaminase_glutamico_piruvica_unidade; }
    public function setTgpTransaminaseGlutamicoPiruvicaUnidade($valor) { $this->tgp_transaminase_glutamico_piruvica_unidade = $valor; }

    public function getGamaGtGlutamiltransferaseM() { return $this->gama_gt_glutamiltransferase_m; }
    public function setGamaGtGlutamiltransferaseM($valor) { $this->gama_gt_glutamiltransferase_m = $valor; }

    public function getGamaGtGlutamiltransferaseF() { return $this->gama_gt_glutamiltransferase_f; }
    public function setGamaGtGlutamiltransferaseF($valor) { $this->gama_gt_glutamiltransferase_f = $valor; }

    public function getGamaGtGlutamiltransferaseUnidade() { return $this->gama_gt_glutamiltransferase_unidade; }
    public function setGamaGtGlutamiltransferaseUnidade($valor) { $this->gama_gt_glutamiltransferase_unidade = $valor; }

    public function getFosfataseAlcalinaM() { return $this->fosfatase_alcalina_m; }
    public function setFosfataseAlcalinaM($valor) { $this->fosfatase_alcalina_m = $valor; }

    public function getFosfataseAlcalinaF() { return $this->fosfatase_alcalina_f; }
    public function setFosfataseAlcalinaF($valor) { $this->fosfatase_alcalina_f = $valor; }

    public function getFosfataseAlcalinaUnidade() { return $this->fosfatase_alcalina_unidade; }
    public function setFosfataseAlcalinaUnidade($valor) { $this->fosfatase_alcalina_unidade = $valor; }

    public function getCreatinaQuinaseCkM() { return $this->creatina_quinase_ck_m; }
    public function setCreatinaQuinaseCkM($valor) { $this->creatina_quinase_ck_m = $valor; }

    public function getCreatinaQuinaseCkF() { return $this->creatina_quinase_ck_f; }
    public function setCreatinaQuinaseCkF($valor) { $this->creatina_quinase_ck_f = $valor; }

    public function getCreatinaQuinaseCkUnidade() { return $this->creatina_quinase_ck_unidade; }
    public function setCreatinaQuinaseCkUnidade($valor) { $this->creatina_quinase_ck_unidade = $valor; }

    public function getGlicose() { return $this->glicose; }
    public function setGlicose($valor) { $this->glicose = $valor; }

    public function getGlicoseUnidade() { return $this->glicose_unidade; }
    public function setGlicoseUnidade($valor) { $this->glicose_unidade = $valor; }

    // Getters e Setters do Ferro
    public function getFerroMAte40Anos() { return $this->ferro_m_ate_40_anos; }
    public function setFerroMAte40Anos($valor) { $this->ferro_m_ate_40_anos = $valor; }

    public function getFerroMMaisDe40Anos() { return $this->ferro_m_mais_de_40_anos; }
    public function setFerroMMaisDe40Anos($valor) { $this->ferro_m_mais_de_40_anos = $valor; }

    public function getFerroMMaisDe60Anos() { return $this->ferro_m_mais_de_60_anos; }
    public function setFerroMMaisDe60Anos($valor) { $this->ferro_m_mais_de_60_anos = $valor; }

    public function getFerroFAte40Anos() { return $this->ferro_f_ate_40_anos; }
    public function setFerroFAte40Anos($valor) { $this->ferro_f_ate_40_anos = $valor; }

    public function getFerroFMaisDe40Anos() { return $this->ferro_f_mais_de_40_anos; }
    public function setFerroFMaisDe40Anos($valor) { $this->ferro_f_mais_de_40_anos = $valor; }

    public function getFerroFMaisDe60Anos() { return $this->ferro_f_mais_de_60_anos; }
    public function setFerroFMaisDe60Anos($valor) { $this->ferro_f_mais_de_60_anos = $valor; }

    public function getFerroCrianca() { return $this->ferro_crianca; }
    public function setFerroCrianca($valor) { $this->ferro_crianca = $valor; }

    public function getFerroUnidade() { return $this->ferro_unidade; }
    public function setFerroUnidade($valor) { $this->ferro_unidade = $valor; }

    // Getters e Setters do Colesterol, HDL, LDL e Triglicerídeos
    public function getColesterolTotal() { return $this->colesterol_total; }
    public function setColesterolTotal($valor) { $this->colesterol_total = $valor; }

    public function getColesterolTotalUnidade() { return $this->colesterol_total_unidade; }
    public function setColesterolTotalUnidade($valor) { $this->colesterol_total_unidade = $valor; }

    public function getHdlAte19Anos() { return $this->hdl_ate_19_anos; }
    public function setHdlAte19Anos($valor) { $this->hdl_ate_19_anos = $valor; }

    public function getHdlMaisDe20Anos() { return $this->hdl_mais_de_20_anos; }
    public function setHdlMaisDe20Anos($valor) { $this->hdl_mais_de_20_anos = $valor; }

    public function getHdlUnidade() { return $this->hdl_unidade; }
    public function setHdlUnidade($valor) { $this->hdl_unidade = $valor; }

    public function getLdlBaixoRisco() { return $this->ldl_baixo_risco; }
    public function setLdlBaixoRisco($valor) { $this->ldl_baixo_risco = $valor; }

    public function getLdlRiscoIntermediario() { return $this->ldl_risco_intermediario; }
    public function setLdlRiscoIntermediario($valor) { $this->ldl_risco_intermediario = $valor; }

    public function getLdlAltoRisco() { return $this->ldl_alto_risco; }
    public function setLdlAltoRisco($valor) { $this->ldl_alto_risco = $valor; }

    public function getLdlMuitoAltoRisco() { return $this->ldl_muito_alto_risco; }
    public function setLdlMuitoAltoRisco($valor) { $this->ldl_muito_alto_risco = $valor; }

    public function getLdlUnidade() { return $this->ldl_unidade; }
    public function setLdlUnidade($valor) { $this->ldl_unidade = $valor; }

    public function getTriglicerideos() { return $this->triglicerideos; }
    public function setTriglicerideos($valor) { $this->triglicerideos = $valor; }

    public function getTriglicerideosUnidade() { return $this->triglicerideos_unidade; }
    public function setTriglicerideosUnidade($valor) { $this->triglicerideos_unidade = $valor; }

    // Getters e Setters da Ureia
    public function getUreiaMMenosDe50Anos() { return $this->ureia_m_menos_de_50_anos; }
    public function setUreiaMMenosDe50Anos($valor) { $this->ureia_m_menos_de_50_anos = $valor; }

    public function getUreiaMMaisDe50Anos() { return $this->ureia_m_mais_de_50_anos; }
    public function setUreiaMMaisDe50Anos($valor) { $this->ureia_m_mais_de_50_anos = $valor; }

    public function getUreiaFMenosDe50Anos() { return $this->ureia_f_menos_de_50_anos; }
    public function setUreiaFMenosDe50Anos($valor) { $this->ureia_f_menos_de_50_anos = $valor; }

    public function getUreiaFMaisDe50Anos() { return $this->ureia_f_mais_de_50_anos; }
    public function setUreiaFMaisDe50Anos($valor) { $this->ureia_f_mais_de_50_anos = $valor; }

    public function getUreiaCrianca() { return $this->ureia_crianca; }
    public function setUreiaCrianca($valor) { $this->ureia_crianca = $valor; }

    public function getUreiaUnidade() { return $this->ureia_unidade; }
    public function setUreiaUnidade($valor) { $this->ureia_unidade = $valor; }

    // Getters e Setters da Creatinina
    public function getCreatininaM() { return $this->creatinina_m; }
    public function setCreatininaM($valor) { $this->creatinina_m = $valor; }

    public function getCreatininaF() { return $this->creatinina_f; }
    public function setCreatininaF($valor) { $this->creatinina_f = $valor; }

    public function getCreatininaCrianca() { return $this->creatinina_crianca; }
    public function setCreatininaCrianca($valor) { $this->creatinina_crianca = $valor; }

    public function getCreatininaUnidade() { return $this->creatinina_unidade; }
    public function setCreatininaUnidade($valor) { $this->creatinina_unidade = $valor; }

    // Getters e Setters do Ácido Úrico
    public function getAcidoUricoM13a18Anos() { return $this->acido_urico_m_13_a_18_anos; }
    public function setAcidoUricoM13a18Anos($valor) { $this->acido_urico_m_13_a_18_anos = $valor; }

    public function getAcidoUricoMMaisDe18Anos() { return $this->acido_urico_m_mais_de_18_anos; }
    public function setAcidoUricoMMaisDe18Anos($valor) { $this->acido_urico_m_mais_de_18_anos = $valor; }

    public function getAcidoUricoF1a9Anos() {	return $this->acido_urico_f_1_a_9_anos; }
	public function setAcidoUricoF1a9Anos($valor) { $this->acido_urico_f_1_a_9_anos = $valor;	}

    public function getAcidoUricoF10a18Anos() { return $this->acido_urico_f_10_a_18_anos; }
    public function setAcidoUricoF10a18Anos($valor) { $this->acido_urico_f_10_a_18_anos = $valor; }

    public function getAcidoUricoFMaisDe18Anos() { return $this->acido_urico_f_mais_de_18_anos; }
    public function setAcidoUricoFMaisDe18Anos($valor) { $this->acido_urico_f_mais_de_18_anos = $valor; }

    public function getAcidoUricoUnidade() { return $this->acido_urico_unidade; }
    public function setAcidoUricoUnidade($valor) { $this->acido_urico_unidade = $valor; }

    // Getters e Setters do PCR
    public function getPcrProteinaCReativa() { return $this->pcr_proteina_c_reativa; }
    public function setPcrProteinaCReativa($valor) { $this->pcr_proteina_c_reativa = $valor; }

    public function getPcrProteinaCReativaUnidade() { return $this->pcr_proteina_c_reativa_unidade; }
    public function setPcrProteinaCReativaUnidade($valor) { $this->pcr_proteina_c_reativa_unidade = $valor; }

    // Getters e Setters do Cálcio
    public function getCalcio() { return $this->calcio; }
    public function setCalcio($valor) { $this->calcio = $valor; }

    public function getCalcioUnidade() { return $this->calcio_unidade; }
    public function setCalcioUnidade($valor) { $this->calcio_unidade = $valor; }

    // Getters e Setters do LDH
    public function getLdh() { return $this->ldh; }
    public function setLdh($valor) { $this->ldh = $valor; }

    public function getLdhUnidade() { return $this->ldh_unidade; }
    public function setLdhUnidade($valor) { $this->ldh_unidade = $valor; }

    // Getters e Setters do Magnésio
    public function getMagnesioM() { return $this->magnesio_m; }
    public function setMagnesioM($valor) { $this->magnesio_m = $valor; }

    public function getMagnesioF() { return $this->magnesio_f; }
    public function setMagnesioF($valor) { $this->magnesio_f = $valor; }

    public function getMagnesioCrianca() { return $this->magnesio_crianca; }
    public function setMagnesioCrianca($valor) { $this->magnesio_crianca = $valor; }

    public function getMagnesioUnidade() { return $this->magnesio_unidade; }
    public function setMagnesioUnidade($valor) { $this->magnesio_unidade = $valor; }

    // Getters e Setters do Fósforo
    public function getFosforoAdulto() { return $this->fosforo_adulto; }
    public function setFosforoAdulto($valor) { $this->fosforo_adulto = $valor; }

    public function getFosforo1a3Anos() { return $this->fosforo_1_a_3_anos; }
    public function setFosforo1a3Anos($valor) { $this->fosforo_1_a_3_anos = $valor; }

    public function getFosforo4a12Anos() { return $this->fosforo_4_a_12_anos; }
    public function setFosforo4a12Anos($valor) { $this->fosforo_4_a_12_anos = $valor; }

    public function getFosforo13a15Anos() { return $this->fosforo_13_a_15_anos; }
    public function setFosforo13a15Anos($valor) { $this->fosforo_13_a_15_anos = $valor; }

    public function getFosforo16a18Anos() { return $this->fosforo_16_a_18_anos; }
    public function setFosforo16a18Anos($valor) { $this->fosforo_16_a_18_anos = $valor; }

    public function getFosforoUnidade() { return $this->fosforo_unidade; }
    public function setFosforoUnidade($valor) { $this->fosforo_unidade = $valor; }
}