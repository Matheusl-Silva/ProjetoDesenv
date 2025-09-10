<?php
class ExameDAO
{
    //busca todos os exames de um paciente em específico
    public function buscarPorPacienteId(int $registro_paciente)
    {
        //define a url de busca por exame dos pacientes
        $url = "http://localhost:3000/pacientes/buscaExames/" . $registro_paciente;

        //trata possíveis erros.
        try {

            //@file_get_contents tenta baixar o conteúdo da URL através de requisição GET
            $response = @file_get_contents($url);
            if ($response === false) {
                return null;
            }

            //decodifica a reposta para um array associativo do php
            $data = json_decode($response, true);
            if ($data) {
                return $data; //retorna o array com os dados do exame
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    //busca os dados de um exame unico pelo id em expecífio
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

    //envia os dados para a criação de um novo exame
    public function salvarExame(array $dadosExame)
    {
        $url   = "http://localhost:3000/exames/";

        //monta um array "$dados" com as informações de exame, extraindo de "$dadosExame"
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

        //configura as opções para a requisição.
        $options = [
            "http" => [
                //informa que os dados enviados são no formato json
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                //converte o array php para string no formato json
                "content" => json_encode($dados),
            ],
        ];

        //cria um contexto de fluxo com as informações acima
        $context = stream_context_create($options);

        //executa a requisição POST usando o $context criado, armazena as infos em $result
        $result  = file_get_contents($url, false, $context);

        //valida se a requisição não falhou
        if ($result === false) {
            return false;
        }

        //decodifica a resposta da API
        $response = json_decode($result, true);

        //verifica se a $response contem id
        return isset($response['id']) ? $response['id'] : false;
    }
}
