<?php

class AnamneseDAO
{
    public function buscarPorPacienteId($registroPaciente)
    {
        $url = "http://localhost:3000/anamneseEnf/paciente/" . $registroPaciente;

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
        $url = "http://localhost:3000/anamneseEnf/" . $idExame;
        try {
            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }
            $data = json_decode($response, true);
            if ($data) {
                $row = isset($data[0]) ? $data[0] : $data;
                return $this->converterParaObj($row);
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function cadastrarExame(AnamneseEnf $dadosExame)
    {
        $url = "http://localhost:3000/anamneseEnf/";

        $dados = [
            "queixa" => $dadosExame->getQueixa(),
            "inicioSintomas" => $dadosExame->getInicioSintomas(),
            "frequencia" => $dadosExame->getFrequencia(),
            "localizacaoDaDor" => $dadosExame->getLocalizacaoDaDor(),
            "cardiopatia" => $dadosExame->getCardiopatia(),
            "hipertensao" => $dadosExame->getHipertensao(),
            "diabetes" => $dadosExame->getDiabetes(),
            "cancer" => $dadosExame->getCancer(),
            "cirurgias" => $dadosExame->getCirurgias(),
            "outrasDoencas" => $dadosExame->getOutrasDoencas(),
            "alergias" => $dadosExame->getAlergias(),
            "medicamento" => $dadosExame->getMedicamento(),
            "refeicoesAoDia" => $dadosExame->getRefeicoesAoDia(),
            "eliminacaoUrinaria" => $dadosExame->getEliminacaoUrinaria(),
            "eliminacaoIntestinal" => $dadosExame->getEliminacaoIntestinal(),
            "cicloMenstrual" => $dadosExame->getCicloMenstrual(),
            "sonoERepouso" => $dadosExame->getSonoERepouso(),
            "horasDeSono" => $dadosExame->getHorasDeSono(),
            "frequenciaFumo" => $dadosExame->getFrequenciaFumo(),
            "frequenciaDrogas" => $dadosExame->getFrequenciaDrogas(),
            "frequenciaAlcool" => $dadosExame->getFrequenciaAlcool(),
            "frequenciaExercicios" => $dadosExame->getFrequenciaExercicios(),
            "lazer" => $dadosExame->getLazer(),
            "saneamentoBasico" => $dadosExame->getSaneamentoBasico(),
            "animaisDomesticos" => $dadosExame->getAnimaisDomesticos(),
            "postoDeSaude" => $dadosExame->getPostoDeSaude(),
            "doencaFamiliar" => $dadosExame->getDoencaFamiliar(),
            "tratamentoDoencaFamiliar" => $dadosExame->getTratamentoDoencaFamiliar(),
            "idPaciente" => $dadosExame->getIdPaciente(),
            "data" => $dadosExame->getData(),
        ];
        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);

        return isset($response['id']) ? $response['id'] : false;
    }

    public function editar(AnamneseEnf $exame)
    {
        $url = "http://localhost:3000/anamneseEnf/" . $exame->getId();

        $dados = [
            "queixa" => $exame->getQueixa(),
            "inicioSintomas" => $exame->getInicioSintomas(),
            "frequencia" => $exame->getFrequencia(),
            "localizacaoDaDor" => $exame->getLocalizacaoDaDor(),
            "cardiopatia" => $exame->getCardiopatia(),
            "hipertensao" => $exame->getHipertensao(),
            "diabetes" => $exame->getDiabetes(),
            "cancer" => $exame->getCancer(),
            "cirurgias" => $exame->getCirurgias(),
            "outrasDoencas" => $exame->getOutrasDoencas(),
            "alergias" => $exame->getAlergias(),
            "medicamento" => $exame->getMedicamento(),
            "refeicoesAoDia" => $exame->getRefeicoesAoDia(),
            "eliminacaoUrinaria" => $exame->getEliminacaoUrinaria(),
            "eliminacaoIntestinal" => $exame->getEliminacaoIntestinal(),
            "cicloMenstrual" => $exame->getCicloMenstrual(),
            "sonoERepouso" => $exame->getSonoERepouso(),
            "horasDeSono" => $exame->getHorasDeSono(),
            "frequenciaFumo" => $exame->getFrequenciaFumo(),
            "frequenciaDrogas" => $exame->getFrequenciaDrogas(),
            "frequenciaAlcool" => $exame->getFrequenciaAlcool(),
            "frequenciaExercicios" => $exame->getFrequenciaExercicios(),
            "lazer" => $exame->getLazer(),
            "saneamentoBasico" => $exame->getSaneamentoBasico(),
            "animaisDomesticos" => $exame->getAnimaisDomesticos(),
            "postoDeSaude" => $exame->getPostoDeSaude(),
            "doencaFamiliar" => $exame->getDoencaFamiliar(),
            "tratamentoDoencaFamiliar" => $exame->getTratamentoDoencaFamiliar(),
            "idPaciente" => $exame->getIdPaciente(),
            "data" => $exame->getData(),
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "PUT",
                "content" => json_encode($dados),
            ]
        ];

        $context = stream_context_create($options);

        $result = @file_get_contents($url, false, $context);

        if(!$result) return false;

        return json_decode($result, true);
    }

    public function excluir($idExame)
    {
        $url = "http://localhost:3000/anamneseEnf/" . $idExame;

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

    private function converterParaObj($row)
    {
        $ana = new AnamneseEnf();

        $ana->setId(isset($row['id']) ? $row['id'] : null);
        $ana->setQueixa(isset($row['cqueixa']) ? $row['cqueixa'] : null);
        $ana->setInicioSintomas(isset($row['dinicio_sintomas']) ? $row['dinicio_sintomas'] : null);
        $ana->setFrequencia(isset($row['cfrequencia']) ? $row['cfrequencia'] : null);
        $ana->setLocalizacaoDaDor(isset($row['clocalizacao_da_dor']) ? $row['clocalizacao_da_dor'] : null);
        $ana->setCardiopatia(isset($row['bcardiopatia']) ? $row['bcardiopatia'] : null);
        $ana->setHipertensao(isset($row['bhipertensao']) ? $row['bhipertensao'] : null);
        $ana->setDiabetes(isset($row['bdiabetes']) ? $row['bdiabetes'] : null);
        $ana->setCancer(isset($row['bcancer']) ? $row['bcancer'] : null);
        $ana->setCirurgias(isset($row['bcirurgias']) ? $row['bcirurgias'] : null);
        $ana->setOutrasDoencas(isset($row['coutras_doencas']) ? $row['coutras_doencas'] : null);
        $ana->setAlergias(isset($row['calergias']) ? $row['calergias'] : null);
        $ana->setMedicamento(isset($row['cmedicamento']) ? $row['cmedicamento'] : null);
        $ana->setRefeicoesAoDia(isset($row['nrefeicoes_ao_dia']) ? $row['nrefeicoes_ao_dia'] : null);
        $ana->setEliminacaoUrinaria(isset($row['celiminacao_urinaria']) ? $row['celiminacao_urinaria'] : null);
        $ana->setEliminacaoIntestinal(isset($row['celiminacao_intestinal']) ? $row['celiminacao_intestinal'] : null);
        $ana->setCicloMenstrual(isset($row['cciclo_menstrual']) ? $row['cciclo_menstrual'] : null);
        $ana->setSonoERepouso(isset($row['csono_e_repouso']) ? $row['csono_e_repouso'] : null);
        $ana->setHorasDeSono(isset($row['nhoras_de_sono']) ? $row['nhoras_de_sono'] : null);
        $ana->setFrequenciaFumo(isset($row['cfrequencia_fumo']) ? $row['cfrequencia_fumo'] : null);
        $ana->setFrequenciaDrogas(isset($row['cfrequencia_drogas']) ? $row['cfrequencia_drogas'] : null);
        $ana->setFrequenciaAlcool(isset($row['cfrequencia_alcool']) ? $row['cfrequencia_alcool'] : null);
        $ana->setFrequenciaExercicios(isset($row['cfrequencia_exercicios']) ? $row['cfrequencia_exercicios'] : null);
        $ana->setLazer(isset($row['clazer']) ? $row['clazer'] : null);
        $ana->setSaneamentoBasico(isset($row['bsaneamento_basico']) ? $row['bsaneamento_basico'] : null);
        $ana->setAnimaisDomesticos(isset($row['canimais_domesticos']) ? $row['canimais_domesticos'] : null);
        $ana->setPostoDeSaude(isset($row['bposto_de_saude']) ? $row['bposto_de_saude'] : null);
        $ana->setDoencaFamiliar(isset($row['cdoenca_familiar']) ? $row['cdoenca_familiar'] : null);
        $ana->setTratamentoDoencaFamiliar(isset($row['ctratamento_doenca_familiar']) ? $row['ctratamento_doenca_familiar'] : null);
        $ana->setIdPaciente(isset($row['id_paciente']) ? $row['id_paciente'] : null);
        $ana->setData(isset($row['ddata']) ? $row['ddata'] : null);

        return $ana;
    }
}
