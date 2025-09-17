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
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST"
            ]
        ];

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        if ($result === false) return false;

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
        $exameBio->setIdResponsavel($row['id_responsavel']);
        $exameBio->setPreceptor($row['id_preceptor']);
        $exameBio->setIdPaciente($row['id_paciente']);
        $exameBio->setData($row['ddata_exame']);

        return $exameBio;
    }
}
