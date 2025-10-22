<?php
class ExameHematoRefDAO
{
    private $baseUrl = "http://localhost:3000/referenciaHematologia";

    /**
     * Buscar os valores de referência da hematologia
     */
    public function buscarReferencia()
    {
        $url = $this->baseUrl;

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
            error_log("Erro ao buscar referência hematologia: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Atualizar os valores de referência da hematologia
     */
    public function atualizarReferencia(ReferenciaHematologia $referencia)
    {
        $url = $this->baseUrl . "/" . $referencia->getId();

        $dados = [
            "chemacia_m" => $referencia->getChemaciaM(),
            "chemacia_f" => $referencia->getChemaciaF(),
            "chemacia_unidade" => $referencia->getChemaciaUnidade(),
            "chemoglobina_m" => $referencia->getChemoglobinaM(),
            "chemoglobina_f" => $referencia->getChemoglobinaF(),
            "chemoglobina_unidade" => $referencia->getChemoglobinaUnidade(),
            "chematocrito_m" => $referencia->getChematocritoM(),
            "chematocrito_f" => $referencia->getChematocritoF(),
            "chematocrito_unidade" => $referencia->getChematocritoUnidade(),
            "cvcm_m" => $referencia->getCvcmM(),
            "cvcm_f" => $referencia->getCvcmF(),
            "cvcm_unidade" => $referencia->getCvcmUnidade(),
            "chcm_m" => $referencia->getChcmM(),
            "chcm_f" => $referencia->getChcmF(),
            "chcm_unidade" => $referencia->getChcmUnidade(),
            "cchcw_m" => $referencia->getCchcwM(),
            "cchcw_f" => $referencia->getCchcwF(),
            "cchcw_unidade" => $referencia->getCchcwUnidade(),
            "crdw_m" => $referencia->getCrdwM(),
            "crdw_f" => $referencia->getCrdwF(),
            "crdw_unidade" => $referencia->getCrdwUnidade(),
            "cleucocitos_relativo" => $referencia->getCleucocitosRelativo(),
            "cleucocitos_relativo_unidade" => $referencia->getCleucocitosRelativoUnidade(),
            "cleucocitos_absoluto" => $referencia->getCleucocitosAbsoluto(),
            "cleucocitos_absoluto_unidade" => $referencia->getCleucocitosAbsolutoUnidade(),
            "cneutrofilos_relativo" => $referencia->getCneutrofilosRelativo(),
            "cneutrofilos_relativo_unidade" => $referencia->getCneutrofilosRelativoUnidade(),
            "cneutrofilos_absoluto" => $referencia->getCneutrofilosAbsoluto(),
            "cneutrofilos_absoluto_unidade" => $referencia->getCneutrofilosAbsolutoUnidade(),
            "cblastos_relativo" => $referencia->getCblastosRelativo(),
            "cblastos_relativo_unidade" => $referencia->getCblastosRelativoUnidade(),
            "cblastos_absoluto" => $referencia->getCblastosAbsoluto(),
            "cblastos_absoluto_unidade" => $referencia->getCblastosAbsolutoUnidade(),
            "cpromielocitos_relativo" => $referencia->getCpromielocitosRelativo(),
            "cpromielocitos_relativo_unidade" => $referencia->getCpromielocitosRelativoUnidade(),
            "cpromielocitos_absoluto" => $referencia->getCpromielocitosAbsoluto(),
            "cpromielocitos_absoluto_unidade" => $referencia->getCpromielocitosAbsolutoUnidade(),
            "cmielocitos_relativo" => $referencia->getCmielocitosRelativo(),
            "cmielocitos_relativo_unidade" => $referencia->getCmielocitosRelativoUnidade(),
            "cmielocitos_absoluto" => $referencia->getCmielocitosAbsoluto(),
            "cmielocitos_absoluto_unidade" => $referencia->getCmielocitosAbsolutoUnidade(),
            "cmetamielocitos_relativo" => $referencia->getCmetamielocitosRelativo(),
            "cmetamielocitos_relativo_unidade" => $referencia->getCmetamielocitosRelativoUnidade(),
            "cmetamielocitos_absoluto" => $referencia->getCmetamielocitosAbsoluto(),
            "cmetamielocitos_absoluto_unidade" => $referencia->getCmetamielocitosAbsolutoUnidade(),
            "cbastonetes_relativo" => $referencia->getCbastonetesRelativo(),
            "cbastonetes_relativo_unidade" => $referencia->getCbastonetesRelativoUnidade(),
            "cbastonetes_absoluto" => $referencia->getCbastonetesAbsoluto(),
            "cbastonetes_absoluto_unidade" => $referencia->getCbastonetesAbsolutoUnidade(),
            "csegmentados_relativo" => $referencia->getCsegmentadosRelativo(),
            "csegmentados_relativo_unidade" => $referencia->getCsegmentadosRelativoUnidade(),
            "csegmentados_absoluto" => $referencia->getCsegmentadosAbsoluto(),
            "csegmentados_absoluto_unidade" => $referencia->getCsegmentadosAbsolutoUnidade(),
            "ceosinofilos_relativo" => $referencia->getCeosinofilosRelativo(),
            "ceosinofilos_relativo_unidade" => $referencia->getCeosinofilosRelativoUnidade(),
            "ceosinofilos_absoluto" => $referencia->getCeosinofilosAbsoluto(),
            "ceosinofilos_absoluto_unidade" => $referencia->getCeosinofilosAbsolutoUnidade(),
            "cbasofilos_relativo" => $referencia->getCbasofilosRelativo(),
            "cbasofilos_relativo_unidade" => $referencia->getCbasofilosRelativoUnidade(),
            "cbasofilos_absoluto" => $referencia->getCbasofilosAbsoluto(),
            "cbasofilos_absoluto_unidade" => $referencia->getCbasofilosAbsolutoUnidade(),
            "clinfocitos_relativo" => $referencia->getClinfocitosRelativo(),
            "clinfocitos_relativo_unidade" => $referencia->getClinfocitosRelativoUnidade(),
            "clinfocitos_absoluto" => $referencia->getClinfocitosAbsoluto(),
            "clinfocitos_absoluto_unidade" => $referencia->getClinfocitosAbsolutoUnidade(),
            "clinfocitos_atipicos_relativo" => $referencia->getClinfocitosAtipicosRelativo(),
            "clinfocitos_atipicos_relativo_unidade" => $referencia->getClinfocitosAtipicosRelativoUnidade(),
            "clinfocitos_atipicos_absoluto" => $referencia->getClinfocitosAtipicosAbsoluto(),
            "clinfocitos_atipicos_absoluto_unidade" => $referencia->getClinfocitosAtipicosAbsolutoUnidade(),
            "cmonocitos_relativo" => $referencia->getCmonocitosRelativo(),
            "cmonocitos_relativo_unidade" => $referencia->getCmonocitosRelativoUnidade(),
            "cmonocitos_absoluto" => $referencia->getCmonocitosAbsoluto(),
            "cmonocitos_absoluto_unidade" => $referencia->getCmonocitosAbsolutoUnidade(),
            "cmieloblastos_relativo" => $referencia->getCmieloblastosRelativo(),
            "cmieloblastos_relativo_unidade" => $referencia->getCmieloblastosRelativoUnidade(),
            "cmieloblastos_absoluto" => $referencia->getCmieloblastosAbsoluto(),
            "cmieloblastos_absoluto_unidade" => $referencia->getCmieloblastosAbsolutoUnidade(),
            "coutras_celulas_relativo" => $referencia->getCoutrasCelulasRelativo(),
            "coutras_celulas_relativo_unidade" => $referencia->getCoutrasCelulasRelativoUnidade(),
            "coutras_celulas_absoluto" => $referencia->getCoutrasCelulasAbsoluto(),
            "coutras_celulas_absoluto_unidade" => $referencia->getCoutrasCelulasAbsolutoUnidade(),
            "ccelulas_linfoides_relativo" => $referencia->getCcelulasLinfoidesRelativo(),
            "ccelulas_linfoides_relativo_unidade" => $referencia->getCcelulasLinfoidesRelativoUnidade(),
            "ccelulas_linfoides_absoluto" => $referencia->getCcelulasLinfoidesAbsoluto(),
            "ccelulas_linfoides_absoluto_unidade" => $referencia->getCcelulasLinfoidesAbsolutoUnidade(),
            "ccelulas_monocitoides_relativo" => $referencia->getCcelulasMonocitoidesRelativo(),
            "ccelulas_monocitoides_relativo_unidade" => $referencia->getCcelulasMonocitoidesRelativoUnidade(),
            "ccelulas_monocitoides_absoluto" => $referencia->getCcelulasMonocitoidesAbsoluto(),
            "ccelulas_monocitoides_absoluto_unidade" => $referencia->getCcelulasMonocitoidesAbsolutoUnidade(),
            "cplaquetas" => $referencia->getCplaquetas(),
            "cplaquetas_unidade" => $referencia->getCplaquetasUnidade(),
            "cvolume_plaquetario_medio" => $referencia->getCvolumePlaquetarioMedio(),
            "cvolume_plaquetario_medio_unidade" => $referencia->getCvolumePlaquetarioMedioUnidade()
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "PUT",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        return json_decode($result, true);
    }

    /**
     * Criar registro inicial de referência
     */
    public function criarReferenciaInicial()
    {
        $url = $this->baseUrl;

        $dados = [
            "id" => 1
            // Os demais campos usarão os valores padrão definidos no banco
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "POST",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        return json_decode($result, true);
    }

    /**
     * Excluir referência (se necessário)
     */
    public function excluir($id)
    {
        $url = $this->baseUrl . "/" . $id;

        $options = [
            'http' => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE",
            ],
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        return json_decode($result, true);
    }

    /**
     * Converter dados da API para objeto ReferenciaHematologia
     */
    private function converterParaObj($row)
    {
        $referencia = new ReferenciaHematologia();

        $referencia->setId($row['id'] ?? 1);
        $referencia->setChemaciaM($row['chemacia_m'] ?? '');
        $referencia->setChemaciaF($row['chemacia_f'] ?? '');
        $referencia->setChemaciaUnidade($row['chemacia_unidade'] ?? '');
        $referencia->setChemoglobinaM($row['chemoglobina_m'] ?? '');
        $referencia->setChemoglobinaF($row['chemoglobina_f'] ?? '');
        $referencia->setChemoglobinaUnidade($row['chemoglobina_unidade'] ?? '');
        $referencia->setChematocritoM($row['chematocrito_m'] ?? '');
        $referencia->setChematocritoF($row['chematocrito_f'] ?? '');
        $referencia->setChematocritoUnidade($row['chematocrito_unidade'] ?? '');
        $referencia->setCvcmM($row['cvcm_m'] ?? '');
        $referencia->setCvcmF($row['cvcm_f'] ?? '');
        $referencia->setCvcmUnidade($row['cvcm_unidade'] ?? '');
        $referencia->setChcmM($row['chcm_m'] ?? '');
        $referencia->setChcmF($row['chcm_f'] ?? '');
        $referencia->setChcmUnidade($row['chcm_unidade'] ?? '');
        $referencia->setCchcwM($row['cchcw_m'] ?? '');
        $referencia->setCchcwF($row['cchcw_f'] ?? '');
        $referencia->setCchcwUnidade($row['cchcw_unidade'] ?? '');
        $referencia->setCrdwM($row['crdw_m'] ?? '');
        $referencia->setCrdwF($row['crdw_f'] ?? '');
        $referencia->setCrdwUnidade($row['crdw_unidade'] ?? '');
        $referencia->setCleucocitosRelativo($row['cleucocitos_relativo'] ?? '');
        $referencia->setCleucocitosRelativoUnidade($row['cleucocitos_relativo_unidade'] ?? '');
        $referencia->setCleucocitosAbsoluto($row['cleucocitos_absoluto'] ?? '');
        $referencia->setCleucocitosAbsolutoUnidade($row['cleucocitos_absoluto_unidade'] ?? '');
        $referencia->setCneutrofilosRelativo($row['cneutrofilos_relativo'] ?? '');
        $referencia->setCneutrofilosRelativoUnidade($row['cneutrofilos_relativo_unidade'] ?? '');
        $referencia->setCneutrofilosAbsoluto($row['cneutrofilos_absoluto'] ?? '');
        $referencia->setCneutrofilosAbsolutoUnidade($row['cneutrofilos_absoluto_unidade'] ?? '');
        $referencia->setCblastosRelativo($row['cblastos_relativo'] ?? '');
        $referencia->setCblastosRelativoUnidade($row['cblastos_relativo_unidade'] ?? '');
        $referencia->setCblastosAbsoluto($row['cblastos_absoluto'] ?? '');
        $referencia->setCblastosAbsolutoUnidade($row['cblastos_absoluto_unidade'] ?? '');
        $referencia->setCpromielocitosRelativo($row['cpromielocitos_relativo'] ?? '');
        $referencia->setCpromielocitosRelativoUnidade($row['cpromielocitos_relativo_unidade'] ?? '');
        $referencia->setCpromielocitosAbsoluto($row['cpromielocitos_absoluto'] ?? '');
        $referencia->setCpromielocitosAbsolutoUnidade($row['cpromielocitos_absoluto_unidade'] ?? '');
        $referencia->setCmielocitosRelativo($row['cmielocitos_relativo'] ?? '');
        $referencia->setCmielocitosRelativoUnidade($row['cmielocitos_relativo_unidade'] ?? '');
        $referencia->setCmielocitosAbsoluto($row['cmielocitos_absoluto'] ?? '');
        $referencia->setCmielocitosAbsolutoUnidade($row['cmielocitos_absoluto_unidade'] ?? '');
        $referencia->setCmetamielocitosRelativo($row['cmetamielocitos_relativo'] ?? '');
        $referencia->setCmetamielocitosRelativoUnidade($row['cmetamielocitos_relativo_unidade'] ?? '');
        $referencia->setCmetamielocitosAbsoluto($row['cmetamielocitos_absoluto'] ?? '');
        $referencia->setCmetamielocitosAbsolutoUnidade($row['cmetamielocitos_absoluto_unidade'] ?? '');
        $referencia->setCbastonetesRelativo($row['cbastonetes_relativo'] ?? '');
        $referencia->setCbastonetesRelativoUnidade($row['cbastonetes_relativo_unidade'] ?? '');
        $referencia->setCbastonetesAbsoluto($row['cbastonetes_absoluto'] ?? '');
        $referencia->setCbastonetesAbsolutoUnidade($row['cbastonetes_absoluto_unidade'] ?? '');
        $referencia->setCsegmentadosRelativo($row['csegmentados_relativo'] ?? '');
        $referencia->setCsegmentadosRelativoUnidade($row['csegmentados_relativo_unidade'] ?? '');
        $referencia->setCsegmentadosAbsoluto($row['csegmentados_absoluto'] ?? '');
        $referencia->setCsegmentadosAbsolutoUnidade($row['csegmentados_absoluto_unidade'] ?? '');
        $referencia->setCeosinofilosRelativo($row['ceosinofilos_relativo'] ?? '');
        $referencia->setCeosinofilosRelativoUnidade($row['ceosinofilos_relativo_unidade'] ?? '');
        $referencia->setCeosinofilosAbsoluto($row['ceosinofilos_absoluto'] ?? '');
        $referencia->setCeosinofilosAbsolutoUnidade($row['ceosinofilos_absoluto_unidade'] ?? '');
        $referencia->setCbasofilosRelativo($row['cbasofilos_relativo'] ?? '');
        $referencia->setCbasofilosRelativoUnidade($row['cbasofilos_relativo_unidade'] ?? '');
        $referencia->setCbasofilosAbsoluto($row['cbasofilos_absoluto'] ?? '');
        $referencia->setCbasofilosAbsolutoUnidade($row['cbasofilos_absoluto_unidade'] ?? '');
        $referencia->setClinfocitosRelativo($row['clinfocitos_relativo'] ?? '');
        $referencia->setClinfocitosRelativoUnidade($row['clinfocitos_relativo_unidade'] ?? '');
        $referencia->setClinfocitosAbsoluto($row['clinfocitos_absoluto'] ?? '');
        $referencia->setClinfocitosAbsolutoUnidade($row['clinfocitos_absoluto_unidade'] ?? '');
        $referencia->setClinfocitosAtipicosRelativo($row['clinfocitos_atipicos_relativo'] ?? '');
        $referencia->setClinfocitosAtipicosRelativoUnidade($row['clinfocitos_atipicos_relativo_unidade'] ?? '');
        $referencia->setClinfocitosAtipicosAbsoluto($row['clinfocitos_atipicos_absoluto'] ?? '');
        $referencia->setClinfocitosAtipicosAbsolutoUnidade($row['clinfocitos_atipicos_absoluto_unidade'] ?? '');
        $referencia->setCmonocitosRelativo($row['cmonocitos_relativo'] ?? '');
        $referencia->setCmonocitosRelativoUnidade($row['cmonocitos_relativo_unidade'] ?? '');
        $referencia->setCmonocitosAbsoluto($row['cmonocitos_absoluto'] ?? '');
        $referencia->setCmonocitosAbsolutoUnidade($row['cmonocitos_absoluto_unidade'] ?? '');
        $referencia->setCmieloblastosRelativo($row['cmieloblastos_relativo'] ?? '');
        $referencia->setCmieloblastosRelativoUnidade($row['cmieloblastos_relativo_unidade'] ?? '');
        $referencia->setCmieloblastosAbsoluto($row['cmieloblastos_absoluto'] ?? '');
        $referencia->setCmieloblastosAbsolutoUnidade($row['cmieloblastos_absoluto_unidade'] ?? '');
        $referencia->setCoutrasCelulasRelativo($row['coutras_celulas_relativo'] ?? '');
        $referencia->setCoutrasCelulasRelativoUnidade($row['coutras_celulas_relativo_unidade'] ?? '');
        $referencia->setCoutrasCelulasAbsoluto($row['coutras_celulas_absoluto'] ?? '');
        $referencia->setCoutrasCelulasAbsolutoUnidade($row['coutras_celulas_absoluto_unidade'] ?? '');
        $referencia->setCcelulasLinfoidesRelativo($row['ccelulas_linfoides_relativo'] ?? '');
        $referencia->setCcelulasLinfoidesRelativoUnidade($row['ccelulas_linfoides_relativo_unidade'] ?? '');
        $referencia->setCcelulasLinfoidesAbsoluto($row['ccelulas_linfoides_absoluto'] ?? '');
        $referencia->setCcelulasLinfoidesAbsolutoUnidade($row['ccelulas_linfoides_absoluto_unidade'] ?? '');
        $referencia->setCcelulasMonocitoidesRelativo($row['ccelulas_monocitoides_relativo'] ?? '');
        $referencia->setCcelulasMonocitoidesRelativoUnidade($row['ccelulas_monocitoides_relativo_unidade'] ?? '');
        $referencia->setCcelulasMonocitoidesAbsoluto($row['ccelulas_monocitoides_absoluto'] ?? '');
        $referencia->setCcelulasMonocitoidesAbsolutoUnidade($row['ccelulas_monocitoides_absoluto_unidade'] ?? '');
        $referencia->setCplaquetas($row['cplaquetas'] ?? '');
        $referencia->setCplaquetasUnidade($row['cplaquetas_unidade'] ?? '');
        $referencia->setCvolumePlaquetarioMedio($row['cvolume_plaquetario_medio'] ?? '');
        $referencia->setCvolumePlaquetarioMedioUnidade($row['cvolume_plaquetario_medio_unidade'] ?? '');

        return $referencia;
    }
}