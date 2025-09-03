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

            $data = json_decode($response, true);
            if ($data) {
                return $data;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function buscarExameCompletoPorId($idExame)
    {
        $url = "http://localhost:3000/exameHemato/principal/" . $idExame;
        try {
            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }
            $data = json_decode($response, true);
            if ($data) {
                return $data;
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
            "dataExame"              => $dadosExame->getDataExame(),
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

    private function converterParaObj($row)
    {
        $exameHemato = new ExameHemato();

        $exameHemato->setId($row['id']);
        $exameHemato->setHemacia($row['hemacia']);
        $exameHemato->setHemoglobina($row['hemoglobina']);
        $exameHemato->setHematocrito($row['hematocrito']);
        $exameHemato->setVcm($row['vcm']);
        $exameHemato->setHcm($row['hcm']);
        $exameHemato->setChcm($row['chcm']);
        $exameHemato->setRdw($row['rdw']);
        $exameHemato->setLeucocitos($row['leucocitos']);
        $exameHemato->setNeutrofilos($row['neutrofilos']);
        $exameHemato->setBlastos($row['blastos']);
        $exameHemato->setPromielocitos($row['promielocitos']);
        $exameHemato->setMielocitos($row['mielocitos']);
        $exameHemato->setMetamielocitos($row['metamielocitos']);
        $exameHemato->setBastonetes($row['bastonetes']);
        $exameHemato->setSegmentados($row['segmentados']);
        $exameHemato->setEosinofilos($row['eosinofilos']);
        $exameHemato->setBasofilos($row['basofilos']);
        $exameHemato->setLinfocitos($row['linfocitos']);
        $exameHemato->setLinfocitosAtipicos($row['linfocitosAtipicos']);
        $exameHemato->setMonocitos($row['monocitos']);
        $exameHemato->setMieloblastos($row['mieloblastos']);
        $exameHemato->setOutrasCelulas($row['outrasCelulas']);
        $exameHemato->setCelulasLinfoides($row['celulasLinfoides']);
        $exameHemato->setCelulasMonocitoides($row['celulasMonocitoides']);
        $exameHemato->setPlaquetas($row['plaquetas']);
        $exameHemato->setVolumePlaquetarioMedio($row['volumePlaquetarioMedio']);
        $exameHemato->setDataExame($row['dataExame']);
        $exameHemato->setIdResponsavel($row['idResponsavel']);
        $exameHemato->setPreceptor($row['preceptor']);
        $exameHemato->setPaciente($row['paciente']);

        return $exameHemato;
    }
}
