<?php
class PacienteDAO
{

    public function cadastrarPaciente($nome, $email, $periodo, $dataNasc, $telefone, $nomeMae, $tomaMedicamento, $medicamento, $trataPatologia, $patologia)
    {
        $url   = "http://localhost:3000/pacientes";
        $dados = [
            "nome"             => $nome,
            "email"            => $email,
            "periodo"          => $periodo,
            "data_nascimento"  => $dataNasc,
            "telefone"         => $telefone,
            "nome_mae"         => $nomeMae,
            "toma_medicamento" => $tomaMedicamento,
            "medicamento"      => $medicamento ?: "",
            "trata_patologia"  => $trataPatologia,
            "patologia"        => $patologia ?: "",
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

    public function listarPacientes()
    {
        $url    = "http://localhost:3000/pacientes";
        $result = file_get_contents($url);
        $lista  = json_decode($result, true);

        return $lista;
    }

    public function atualizarPacientes($nome, $email, $periodo, $dataNasc, $telefone, $nomeMae, $tomaMedicamento, $medicamento, $trataPatologia, $patologia)
    {
        $url   = "http://localhost:3000/pacientes/" . $email;
        $dados = [
            "nome"             => $nome,
            "email"            => $email,
            "periodo"          => $periodo,
            "data_nascimento"  => $dataNasc,
            "telefone"         => $telefone,
            "nome_mae"         => $nomeMae,
            "toma_medicamento" => $tomaMedicamento,
            "medicamento"      => $medicamento,
            "trata_patologia"  => $trataPatologia,
            "patologia"        => $patologia,
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "PUT",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result === false) {
            return ["erro" => "Falha na requisição PUT"];
        }
        return json_decode($result, true);
    }

    public function excluirPaciente($email)
    {
        $url     = "http://localhost:3000/pacientes/" . $email;
        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE",
            ],
        ];
        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result === false) {
            return ["erro" => "Erro ao excluir paciente"];
        }
        return json_decode($result, true);
    }
}
