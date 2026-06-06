<?php

class ExameHematoDAO
{
    public function buscarPorPacienteId($registroPaciente)
    {
        $r = ApiClient::get("/exameHemato/" . $registroPaciente);
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
        $r = ApiClient::get("/exameHemato/listar/" . $idExame);
        if ($r['status'] !== 200 || !$r['json']) {
            return null;
        }
        return $this->converterParaObj($r['json']);
    }

    public function cadastrarExame(ExameHemato $dadosExame)
    {
        $dados = [
            "hemacia"                => $dadosExame->getHemacia(),
            "hemoglobina"            => $dadosExame->getHemoglobina(),
            "hematocrito"            => $dadosExame->getHematocrito(),
            "vcm"                    => $dadosExame->getVcm(),
            "hcm"                    => $dadosExame->getHcm(),
            "chcm"                   => $dadosExame->getChcm(),
            "rdw"                    => $dadosExame->getRdw(),
            "leucocitos"             => $dadosExame->getLeucocitos(),
            "neutrofilos"            => $dadosExame->getNeutrofilos(),
            "blastos"                => $dadosExame->getBlastos(),
            "promielocitos"          => $dadosExame->getPromielocitos(),
            "mielocitos"             => $dadosExame->getMielocitos(),
            "metamielocitos"         => $dadosExame->getMetamielocitos(),
            "bastonetes"             => $dadosExame->getBastonetes(),
            "segmentados"            => $dadosExame->getSegmentados(),
            "eosinofilos"            => $dadosExame->getEosinofilos(),
            "basofilos"              => $dadosExame->getBasofilos(),
            "linfocitos"             => $dadosExame->getLinfocitos(),
            "linfocitosAtipicos"     => $dadosExame->getLinfocitosAtipicos(),
            "monocitos"              => $dadosExame->getMonocitos(),
            "mieloblastos"           => $dadosExame->getMieloblastos(),
            "outrasCelulas"          => $dadosExame->getOutrasCelulas(),
            "celulasLinfoides"       => $dadosExame->getCelulasLinfoides(),
            "celulasMonocitoides"    => $dadosExame->getCelulasMonocitoides(),
            "plaquetas"              => $dadosExame->getPlaquetas(),
            "volumePlaquetarioMedio" => $dadosExame->getVolumePlaquetarioMedio(),
            "dataExame"              => $dadosExame->getData(),
            "idResponsavel"          => $dadosExame->getIdResponsavel(),
            "idPreceptor"            => $dadosExame->getPreceptor(),
            "idPaciente"             => $dadosExame->getPaciente(),
        ];
        $r = ApiClient::post("/exameHemato/", $dados);
        if ($r['status'] >= 400) return false;
        return $r['json']['id'] ?? false;
    }

    public function editar(ExameHemato $exame)
    {
        $dados = [
            "hemacia"                => $exame->getHemacia(),
            "hemoglobina"            => $exame->getHemoglobina(),
            "hematocrito"            => $exame->getHematocrito(),
            "vcm"                    => $exame->getVcm(),
            "hcm"                    => $exame->getHcm(),
            "chcm"                   => $exame->getChcm(),
            "rdw"                    => $exame->getRdw(),
            "leucocitos"             => $exame->getLeucocitos(),
            "neutrofilos"            => $exame->getNeutrofilos(),
            "blastos"                => $exame->getBlastos(),
            "promielocitos"          => $exame->getPromielocitos(),
            "mielocitos"             => $exame->getMielocitos(),
            "metamielocitos"         => $exame->getMetamielocitos(),
            "bastonetes"             => $exame->getBastonetes(),
            "segmentados"            => $exame->getSegmentados(),
            "eosinofilos"            => $exame->getEosinofilos(),
            "basofilos"              => $exame->getBasofilos(),
            "linfocitos"             => $exame->getLinfocitos(),
            "linfocitosAtipicos"     => $exame->getLinfocitosAtipicos(),
            "monocitos"              => $exame->getMonocitos(),
            "mieloblastos"           => $exame->getMieloblastos(),
            "outrasCelulas"          => $exame->getOutrasCelulas(),
            "celulasLinfoides"       => $exame->getCelulasLinfoides(),
            "celulasMonocitoides"    => $exame->getCelulasMonocitoides(),
            "plaquetas"              => $exame->getPlaquetas(),
            "volplaquetariomedio"    => $exame->getVolumePlaquetarioMedio(),
            "dataExame"              => $exame->getData(),
            "id_responsavel"         => $exame->getIdResponsavel(),
            "id_preceptor"           => $exame->getPreceptor(),
            "id_paciente"            => $exame->getPaciente(),
        ];
        $r = ApiClient::put("/exameHemato/" . $exame->getId(), $dados);
        if ($r['status'] >= 400) return false;
        return $r['json'];
    }

    public function excluir($idExame)
    {
        $r = ApiClient::delete("/exameHemato/" . $idExame);
        if ($r['status'] >= 400) return false;
        return $r['json'];
    }

    private function converterParaObj($row)
    {
        $exameHemato = new ExameHemato();
        $exameHemato->setId($row['id']);
        $exameHemato->setHemacia($row['nhemacia']);
        $exameHemato->setHemoglobina($row['nhemoglobina']);
        $exameHemato->setHematocrito($row['nhematocrito']);
        $exameHemato->setVcm($row['nvcm']);
        $exameHemato->setHcm($row['nhcm']);
        $exameHemato->setChcm($row['nchcm']);
        $exameHemato->setRdw($row['nrdw']);
        $exameHemato->setLeucocitos($row['nleucocitos']);
        $exameHemato->setNeutrofilos($row['nneutrofilos']);
        $exameHemato->setBlastos($row['nblastos']);
        $exameHemato->setPromielocitos($row['npromielocitos']);
        $exameHemato->setMielocitos($row['nmielocitos']);
        $exameHemato->setMetamielocitos($row['nmetamielocitos']);
        $exameHemato->setBastonetes($row['nbastonetes']);
        $exameHemato->setSegmentados($row['nsegmentados']);
        $exameHemato->setEosinofilos($row['neosinofilos']);
        $exameHemato->setBasofilos($row['nbasofilos']);
        $exameHemato->setLinfocitos($row['nlinfocitos']);
        $exameHemato->setLinfocitosAtipicos($row['nlinfocitos_atipicos']);
        $exameHemato->setMonocitos($row['nmonocitos']);
        $exameHemato->setMieloblastos($row['nmieloblastos']);
        $exameHemato->setOutrasCelulas($row['noutras_celulas']);
        $exameHemato->setCelulasLinfoides($row['ncelulas_linfoides']);
        $exameHemato->setCelulasMonocitoides($row['ncelulas_monocitoides']);
        $exameHemato->setPlaquetas($row['nplaquetas']);
        $exameHemato->setVolumePlaquetarioMedio($row['nvolume_plaquetario_medio']);
        $exameHemato->setData($row['ddata_exame']);
        $exameHemato->setIdResponsavel($row['id_responsavel']);
        $exameHemato->setPreceptor($row['id_preceptor']);
        $exameHemato->setPaciente($row['id_paciente']);
        return $exameHemato;
    }
}
