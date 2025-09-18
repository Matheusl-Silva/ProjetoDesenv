<?php

class ExameHematoDAO
{
    public function buscarPorPacienteId($registroPaciente)
    {
        $url = "http://localhost:3000/exameHemato/" . $registroPaciente;

        try {

            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }

            $data      = json_decode($response, true);
            $examesObj = [];
            if ($data) {
                foreach ($data as $exame) {
                    $examesObj[] = @$this->converterParaObj($exame);
                }
                return $examesObj;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function buscarExameCompletoPorId($idExame)
    {
        $url = "http://localhost:3000/exameHemato/listar/" . $idExame;
        try {
            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }
            $data = json_decode($response, true);
            if ($data) {

                return $this->converterParaObj($data);
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function cadastrarExame(ExameHemato $dadosExame)
    {
        $url = "http://localhost:3000/exameHemato/";

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
            "preceptor"              => $dadosExame->getPreceptor(),
            "paciente"               => $dadosExame->getPaciente(),
        ];
        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);

        return isset($response['id']) ? $response['id'] : false;
    }

    public function excluir($idExame)
    {
        $url = "http://localhost:3000/exameHemato/" . $idExame;

        $options = [
            'http' => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "DELETE"
            ]
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        if($result === false) return false;

        return json_decode($result, true);
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
