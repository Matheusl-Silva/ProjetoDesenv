<?php
class ExameBioquimicaDAO
{
    public function buscarPorPacienteId($registroPaciente)
    {
        $url = "http://localhost:3000/exameBio/" . $registroPaciente;

        try {
            $response = @file_get_contents($url);

            if ($response === false) {
                return null;
            }

            $data = json_decode($response, true);

            $examesObj = [];

            if ($data) {
                foreach ($data as $exame) {
                    $examesObj[] = @$this->converterParaObj($exame);
                }
                return $examesObj;
            }
            return null;
        } catch (Exception $e) {
            echo "Erro ao buscar exame de bioquímica: $e";
            return null;
        }
    }

    public function buscarExameCompletoPorId($idExame)
    {
        $url = "http://localhost:3000/exameBio/listar/" . $idExame;
        try {
            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }
            $data = json_decode($response, true);
            if ($data) {

                return @$this->converterParaObj($data);
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function excluir($idExame)
    {
        $url = "http://localhost:3000/exameBio/" . $idExame;

        $options = [
            'http' => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE",
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        return json_decode($result, true);
    }

    public function cadastrarExame(ExameBioquimica $dadosExame)
    {
        $url = "http://localhost:3000/exameBio/";

        $dados = [
            "bilirrubina_total"  => $dadosExame->getBilirrubinaTotal(),
            "bilirrubina_direta" => $dadosExame->getBilirrubinaDireta(),
            "proteina_total"     => $dadosExame->getProteinaTotal(),
            "albumina"           => $dadosExame->getAlbumina(),
            "amilase"            => $dadosExame->getAmilase(),
            "ast"                => $dadosExame->getTgoTransaminaseGlutamicoOxalacetica(),
            "alt"                => $dadosExame->getTgpTransaminaseGlutamicoPiruvica(),
            "ggt"                => $dadosExame->getGamaGtGlutamiltransferase(),
            "fa"                 => $dadosExame->getFosfataseAlcalina(),
            "ck"                 => $dadosExame->getReatinaQuinaseCk(),
            "glicose"            => $dadosExame->getGlicose(),
            "ferro"              => $dadosExame->getFerro(),
            "col_total"          => $dadosExame->getColesterolTotal(),
            "hdl"                => $dadosExame->getHdl(),
            "ldl"                => $dadosExame->getLdl(),
            "triglicerideos"     => $dadosExame->getTriglicerideos(),
            "ureia"              => $dadosExame->getUreia(),
            "creatinina"         => $dadosExame->getCreatinina(),
            "acido_urico"        => $dadosExame->getAcidoUrico(),
            "pcr"                => $dadosExame->getPcrProteinaCReativa(),
            "calcio"             => $dadosExame->getCalcio(),
            "ldh"                => $dadosExame->getLdh(),
            "magnesio"           => $dadosExame->getMagnesio(),
            "fosforo"            => $dadosExame->getFosforo(),
            "observacao"         => $dadosExame->getObservacao(),
            "data_exame"         => $dadosExame->getData(),
            "id_responsavel"     => $dadosExame->getResponsavel(),
            "id_preceptor"       => $dadosExame->getPreceptor(),
            "id_paciente"        => $dadosExame->getPaciente(),
            "tipo_exame"         => $dadosExame->getTipo(),
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

    public function editar(ExameBioquimica $exame)
    {
        $url = "http://localhost:3000/exameBio/" . $exame->getId();

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

        if (!$result) {
            return false;
        }

        return json_decode($result, true);
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
