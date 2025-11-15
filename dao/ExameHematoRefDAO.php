<?php
class ExameHematoRefDAO
{

    public function buscarReferenciaHematologica()
    {
        $url = "http://localhost:3000/hematoRef";

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "GET",
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        if ($result == false) {
            return false;
        }

        $response = json_decode($result, true);
        if (is_array($response) && count($response) > 0) {
            return $this->converterParaObj($response[0]);
        }
        return false;
    }

    public function atualizarReferencia(ReferenciaHematologia $referencia)
    {
        $url = "http://localhost:3000/hematoRef/1";

        $dados = [
            "hemacia_m"                      => $referencia->getHemaciaM(),
            "hemacia_f"                      => $referencia->getHemaciaF(),
            "hemoglobina_m"                  => $referencia->getHemoglobinaM(),
            "hemoglobina_f"                  => $referencia->getHemoglobinaF(),
            "hematocrito_m"                  => $referencia->getHematocritoM(),
            "hematocrito_f"                  => $referencia->getHematocritoF(),
            "vcm_m"                          => $referencia->getVcmM(),
            "vcm_f"                          => $referencia->getVcmF(),
            "hcm_m"                          => $referencia->getHcmM(),
            "hcm_f"                          => $referencia->getHcmF(),
            "chcm_m"                         => $referencia->getChcmM(),
            "chcm_f"                         => $referencia->getChcmF(),
            "rdw_m"                          => $referencia->getRdwM(),
            "rdw_f"                          => $referencia->getRdwF(),
            "leucocitos_relativo"            => $referencia->getLeucocitosRelativo(),
            "leucocitos_absoluto"            => $referencia->getLeucocitosAbsoluto(),
            "neutrofilos_relativo"           => $referencia->getNeutrofilosRelativo(),
            "neutrofilos_absoluto"           => $referencia->getNeutrofilosAbsoluto(),
            "blastos_relativo"               => $referencia->getBlastosRelativo(),
            "blastos_absoluto"               => $referencia->getBlastosAbsoluto(),
            "promielocitos_relativo"         => $referencia->getPromielocitosRelativo(),
            "promielocitos_absoluto"         => $referencia->getPromielocitosAbsoluto(),
            "mielocitos_relativo"            => $referencia->getMielocitosRelativo(),
            "mielocitos_absoluto"            => $referencia->getMielocitosAbsoluto(),
            "metamielocitos_relativo"        => $referencia->getMetamielocitosRelativo(),
            "metamielocitos_absoluto"        => $referencia->getMetamielocitosAbsoluto(),
            "bastonetes_relativo"            => $referencia->getBastonetesRelativo(),
            "bastonetes_absoluto"            => $referencia->getBastonetesAbsoluto(),
            "segmentados_relativo"           => $referencia->getSegmentadosRelativo(),
            "segmentados_absoluto"           => $referencia->getSegmentadosAbsoluto(),
            "eosinofilos_relativo"           => $referencia->getEosinofilosRelativo(),
            "eosinofilos_absoluto"           => $referencia->getEosinofilosAbsoluto(),
            "basofilos_relativo"             => $referencia->getBasofilosRelativo(),
            "basofilos_absoluto"             => $referencia->getBasofilosAbsoluto(),
            "linfocitos_relativo"            => $referencia->getLinfocitosRelativo(),
            "linfocitos_absoluto"            => $referencia->getLinfocitosAbsoluto(),
            "linfocitos_atipicos_relativo"   => $referencia->getLinfocitosAtipicosRelativo(),
            "linfocitos_atipicos_absoluto"   => $referencia->getLinfocitosAtipicosAbsoluto(),
            "monocitos_relativo"             => $referencia->getMonocitosRelativo(),
            "monocitos_absoluto"             => $referencia->getMonocitosAbsoluto(),
            "mieloblastos_relativo"          => $referencia->getMieloblastosRelativo(),
            "mieloblastos_absoluto"          => $referencia->getMieloblastosAbsoluto(),
            "outras_celulas_relativo"        => $referencia->getOutrasCelulasRelativo(),
            "outras_celulas_absoluto"        => $referencia->getOutrasCelulasAbsoluto(),
            "celulas_linfoides_relativo"     => $referencia->getCelulasLinfoidesRelativo(),
            "celulas_linfoides_absoluto"     => $referencia->getCelulasLinfoidesAbsoluto(),
            "celulas_monocitoides_relativo"  => $referencia->getCelulasMonocitoidesRelativo(),
            "celulas_monocitoides_absoluto"  => $referencia->getCelulasMonocitoidesAbsoluto(),
            "plaquetas"                      => $referencia->getPlaquetas(),
            "volume_plaquetario_medio"       => $referencia->getVolumePlaquetarioMedio(),
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
        $referencia = new ReferenciaHematologia();
        
        $referencia->setId($row['id'] ?? 1);
        $referencia->setHemaciaM($row['chemacia_m']);
        $referencia->setHemaciaF($row['chemacia_f']);
        $referencia->setHemoglobinaM($row['chemoglobina_m']);
        $referencia->setHemoglobinaF($row['chemoglobina_f']);
        $referencia->setHematocritoM($row['chematocrito_m']);
        $referencia->setHematocritoF($row['chematocrito_f']);
        $referencia->setVcmM($row['cvcm_m']);
        $referencia->setVcmF($row['cvcm_f']);
        $referencia->setHcmM($row['chcm_m']);
        $referencia->setHcmF($row['chcm_f']);
        $referencia->setChcmM($row['cchcw_m']);
        $referencia->setChcmF($row['cchcw_f']);
        $referencia->setRdwM($row['crdw_m']);
        $referencia->setRdwF($row['crdw_f']);
        $referencia->setLeucocitosRelativo($row['cleucocitos_relativo']);
        $referencia->setLeucocitosAbsoluto($row['cleucocitos_absoluto']);
        $referencia->setNeutrofilosRelativo($row['cneutrofilos_relativo']);
        $referencia->setNeutrofilosAbsoluto($row['cneutrofilos_absoluto']);
        $referencia->setBlastosRelativo($row['cblastos_relativo']);
        $referencia->setBlastosAbsoluto($row['cblastos_absoluto']);
        $referencia->setPromielocitosRelativo($row['cpromielocitos_relativo']);
        $referencia->setPromielocitosAbsoluto($row['cpromielocitos_absoluto']);
        $referencia->setMielocitosRelativo($row['cmielocitos_relativo']);
        $referencia->setMielocitosAbsoluto($row['cmielocitos_absoluto']);
        $referencia->setMetamielocitosRelativo($row['cmetamielocitos_relativo']);
        $referencia->setMetamielocitosAbsoluto($row['cmetamielocitos_absoluto']);
        $referencia->setBastonetesRelativo($row['cbastonetes_relativo']);
        $referencia->setBastonetesAbsoluto($row['cbastonetes_absoluto']);
        $referencia->setSegmentadosRelativo($row['csegmentados_relativo']);
        $referencia->setSegmentadosAbsoluto($row['csegmentados_absoluto']);
        $referencia->setEosinofilosRelativo($row['ceosinofilos_relativo']);
        $referencia->setEosinofilosAbsoluto($row['ceosinofilos_absoluto']);
        $referencia->setBasofilosRelativo($row['cbasofilos_relativo']);
        $referencia->setBasofilosAbsoluto($row['cbasofilos_absoluto']);
        $referencia->setLinfocitosRelativo($row['clinfocitos_relativo']);
        $referencia->setLinfocitosAbsoluto($row['clinfocitos_absoluto']);
        $referencia->setLinfocitosAtipicosRelativo($row['clinfocitos_atipicos_relativo']);
        $referencia->setLinfocitosAtipicosAbsoluto($row['clinfocitos_atipicos_absoluto']);
        $referencia->setMonocitosRelativo($row['cmonocitos_relativo']);
        $referencia->setMonocitosAbsoluto($row['cmonocitos_absoluto']);
        $referencia->setMieloblastosRelativo($row['cmieloblastos_relativo']);
        $referencia->setMieloblastosAbsoluto($row['cmieloblastos_absoluto']);
        $referencia->setOutrasCelulasRelativo($row['coutras_celulas_relativo']);
        $referencia->setOutrasCelulasAbsoluto($row['coutras_celulas_absoluto']);
        $referencia->setCelulasLinfoidesRelativo($row['ccelulas_linfoides_relativo']);
        $referencia->setCelulasLinfoidesAbsoluto($row['ccelulas_linfoides_absoluto']);
        $referencia->setCelulasMonocitoidesRelativo($row['ccelulas_monocitoides_relativo']);
        $referencia->setCelulasMonocitoidesAbsoluto($row['ccelulas_monocitoides_absoluto']);
        $referencia->setPlaquetas($row['cplaquetas']);
        $referencia->setVolumePlaquetarioMedio($row['cvolume_plaquetario_medio']);
        return $referencia;
    }
}
