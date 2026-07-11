<?php
class ExameBioquimicaDAO
{
    public function buscarPorPacienteId($registroPaciente)
    {
        $r = ApiClient::get("/exameBio/" . $registroPaciente);
        if ($r['status'] !== 200 || !is_array($r['json'])) {
            return null;
        }
        $examesObj = [];
        foreach ($r['json'] as $exame) {
            $examesObj[] = @$this->converterParaObj($exame);
        }
        return $examesObj;
    }

    public function buscarExameCompletoPorId($idExame)
    {
        $r = ApiClient::get("/exameBio/listar/" . $idExame);
        if ($r['status'] !== 200 || !$r['json']) {
            return null;
        }
        return @$this->converterParaObj($r['json']);
    }

    public function excluir($idExame)
    {
        $r = ApiClient::delete("/exameBio/" . $idExame);
        if ($r['status'] >= 400) return false;
        return $r['json'];
    }

    public function cadastrarExame(ExameBioquimica $dadosExame)
    {
        $dados = [
            "bilirrubina_total"                      => $dadosExame->getBilirrubinaTotal(),
            "bilirrubina_direta"                     => $dadosExame->getBilirrubinaDireta(),
            "proteina_total"                         => $dadosExame->getProteinaTotal(),
            "albumina"                               => $dadosExame->getAlbumina(),
            "amilase"                                => $dadosExame->getAmilase(),
            "tgo_transaminase_glutamico_oxalacetica" => $dadosExame->getTgoTransaminaseGlutamicoOxalacetica(),
            "tgp_transaminase_glutamico_piruvica"    => $dadosExame->getTgpTransaminaseGlutamicoPiruvica(),
            "gama_gt_glutamiltransferase"            => $dadosExame->getGamaGtGlutamiltransferase(),
            "fosfatase_alcalina"                     => $dadosExame->getFosfataseAlcalina(),
            "reatina_quinase_ck"                     => $dadosExame->getReatinaQuinaseCk(),
            "glicose"                                => $dadosExame->getGlicose(),
            "ferro"                                  => $dadosExame->getFerro(),
            "colesterol_total"                       => $dadosExame->getColesterolTotal(),
            "hdl"                                    => $dadosExame->getHdl(),
            "ldl"                                    => $dadosExame->getLdl(),
            "triglicerideos"                         => $dadosExame->getTriglicerideos(),
            "ureia"                                  => $dadosExame->getUreia(),
            "creatinina"                             => $dadosExame->getCreatinina(),
            "acido_urico"                            => $dadosExame->getAcidoUrico(),
            "pcr_proteina_c_reativa"                 => $dadosExame->getPcrProteinaCReativa(),
            "calcio"                                 => $dadosExame->getCalcio(),
            "ldh"                                    => $dadosExame->getLdh(),
            "magnesio"                               => $dadosExame->getMagnesio(),
            "fosforo"                                => $dadosExame->getFosforo(),
            "observacao"                             => $dadosExame->getObservacao(),
            "data_exame"                             => $dadosExame->getData(),
            "id_responsavel"                         => $dadosExame->getResponsavel(),
            "id_preceptor"                           => $dadosExame->getPreceptor(),
            "id_paciente"                            => $dadosExame->getPaciente(),
            "tipo_exame"                             => $dadosExame->getTipo(),
        ];
        $r = ApiClient::post("/exameBio/", $dados);
        if ($r['status'] >= 400) return false;
        return $r['json']['id'] ?? false;
    }

    public function editar(ExameBioquimica $exame)
    {
        $dados = [
            "id_responsavel"                         => $exame->getResponsavel(),
            "id_preceptor"                           => $exame->getPreceptor(),
            "id_paciente"                            => $exame->getPaciente(),
            "data_exame"                             => $exame->getData(),
            "bilirrubina_total"                      => $exame->getBilirrubinaTotal(),
            "bilirrubina_direta"                     => $exame->getBilirrubinaDireta(),
            "proteina_total"                         => $exame->getProteinaTotal(),
            "albumina"                               => $exame->getAlbumina(),
            "amilase"                                => $exame->getAmilase(),
            "tgo_transaminase_glutamico_oxalacetica" => $exame->getTgoTransaminaseGlutamicoOxalacetica(),
            "tgp_transaminase_glutamico_piruvica"    => $exame->getTgpTransaminaseGlutamicoPiruvica(),
            "gama_gt_glutamiltransferase"            => $exame->getGamaGtGlutamiltransferase(),
            "fosfatase_alcalina"                     => $exame->getFosfataseAlcalina(),
            "reatina_quinase_ck"                     => $exame->getReatinaQuinaseCk(),
            "glicose"                                => $exame->getGlicose(),
            "ferro"                                  => $exame->getFerro(),
            "colesterol_total"                       => $exame->getColesterolTotal(),
            "hdl"                                    => $exame->getHdl(),
            "ldl"                                    => $exame->getLdl(),
            "triglicerideos"                         => $exame->getTriglicerideos(),
            "ureia"                                  => $exame->getUreia(),
            "creatinina"                             => $exame->getCreatinina(),
            "acido_urico"                            => $exame->getAcidoUrico(),
            "pcr_proteina_c_reativa"                 => $exame->getPcrProteinaCReativa(),
            "calcio"                                 => $exame->getCalcio(),
            "ldh"                                    => $exame->getLdh(),
            "magnesio"                               => $exame->getMagnesio(),
            "fosforo"                                => $exame->getFosforo(),
            "observacao"                             => $exame->getObservacao(),
        ];
        $r = ApiClient::put("/exameBio/" . $exame->getId(), $dados);
        if ($r['status'] >= 400) return false;
        return $r['json'];
    }

    private function converterParaObj($row)
    {
        $exameBio = new ExameBioquimica();
        $exameBio->setId($row['id']);
        $exameBio->setBilirrubinaTotal($row['nbilirrubina_total']);
        $exameBio->setBilirrubinaDireta($row['nbilirrubina_direta']);
        $exameBio->setProteinaTotal($row['nproteina_total']);
        $exameBio->setAlbumina($row['nalbumina']);
        $exameBio->setAmilase($row['namilase']);
        $exameBio->setTgoTransaminaseGlutamicoOxalacetica($row['ntgo_transaminase_glutamico_oxalacetica']);
        $exameBio->setTgpTransaminaseGlutamicoPiruvica($row['ntgp_transaminase_glutamico_piruvica']);
        $exameBio->setGamaGtGlutamiltransferase($row['ngama_gt_glutamiltransferase']);
        $exameBio->setFosfataseAlcalina($row['nfosfatase_alcalina']);
        $exameBio->setReatinaQuinaseCk($row['nreatina_quinase_ck']);
        $exameBio->setGlicose($row['nglicose']);
        $exameBio->setFerro($row['nferro']);
        $exameBio->setColesterolTotal($row['ncolesterol_total']);
        $exameBio->setHdl($row['nhdl']);
        $exameBio->setLdl($row['nldl']);
        $exameBio->setTriglicerideos($row['ntriglicerideos']);
        $exameBio->setUreia($row['nureia']);
        $exameBio->setCreatinina($row['ncreatinina']);
        $exameBio->setAcidoUrico($row['nacido_urico']);
        $exameBio->setPcrProteinaCReativa($row['npcr_proteina_c_reativa']);
        $exameBio->setCalcio($row['ncalcio']);
        $exameBio->setLdh($row['nldh']);
        $exameBio->setMagnesio($row['nmagnesio']);
        $exameBio->setFosforo($row['nfosforo']);
        $exameBio->setResponsavel($row['id_responsavel']);
        $exameBio->setPreceptor($row['id_preceptor']);
        $exameBio->setPaciente($row['id_paciente']);
        $exameBio->setData($row['ddata_exame']);
        $exameBio->setObservacao($row['cobservacao']);
        return $exameBio;
    }
}
