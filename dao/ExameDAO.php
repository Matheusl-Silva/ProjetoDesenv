<?php
class ExameDAO
{
    public function buscarPorPacienteId(int $registro_paciente)
    {
        $url = "http://localhost:3000/exames/" . $registro_paciente;
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

    public function buscarExameCompletoPorId($id_exame)
    {
        $url = "http://localhost:3000/exames/principal/" . $id_exame;
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

    public function salvarExame(array $dadosExame)
    {
        $url   = "http://localhost:3000/exames/";
        $dados = [
            "id_responsavel"    => $dadosExame['id_responsavel'],
            "id_preceptor"      => $dadosExame['id_preceptor'],
            "registro_paciente" => $dadosExame['registro_paciente'],
            "dentrada"          => $dadosExame['dentrada'],
            "dentrega"          => $dadosExame['dentrega'],
            "data"              => $dadosExame['data'],
            "hemacia"           => $dadosExame['hemacia'],
            "hemoglobina"       => $dadosExame['hemoglobina'],
            "hematocrito"       => $dadosExame['hematocrito'],
            "vcm"               => $dadosExame['vcm'],
            "hcm"               => $dadosExame['hcm'],
            "chcm"              => $dadosExame['chcm'],
            "rdw"               => $dadosExame['rdw'],
            "leucocitos"        => $dadosExame['leucocitos'],
            "blastos"           => $dadosExame['blastos'],
            "promielocitos"     => $dadosExame['promielocitos'],
            "mielocitos"        => $dadosExame['mielocitos'],
            "metamielocitos"    => $dadosExame['metamielocitos'],
            "bastonetes"        => $dadosExame['bastonetes'],
            "segmentados"       => $dadosExame['segmentados'],
            "eosinofilos"       => $dadosExame['eosinofilos'],
            "basofilos"         => $dadosExame['basofilos'],
            "plaquetas"         => $dadosExame['plaquetas'],
            "plaquetarioMedio"  => $dadosExame['plaquetarioMedio'],
            "neutrofilos"       => $dadosExame['neutrofilos'],
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);
        return isset($response['id']) ? $response['id'] : false;
    }
}
