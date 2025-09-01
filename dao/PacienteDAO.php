<?php
class PacienteDAO
{

    public function verificarEmailExistente($email)
    {
        $url   = "http://localhost:3000/pacientes/verificar-email";
        $dados = ["email" => $email];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        $response = json_decode($result, true);
        if ($response == false) {
            return false;
        }
        return $this->converterParaObj(json_decode($result, true));
    }

    public function cadastrarPaciente(Paciente $paciente)
    {
        $url   = "http://localhost:3000/pacientes";
        $dados = [
            "nome"            => $paciente->getNome(),
            "email"           => $paciente->getEmail(),
            "periodo"         => $paciente->getPeriodo(),
            "data_nascimento" => $paciente->getDataNasc(),
            "telefone"        => $paciente->getFone(),
            "nome_mae"        => $paciente->getNomeMae(),
            "medicamento"     => $paciente->getMedicamento() ?: "",
            "patologia"       => $paciente->getPatologia() ?: "",
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

        if (isset($response['error']) && strpos($response['error'], 'Email já cadastrado') !== false) {
            return "EMAIL_DUPLICADO";
        }

        return isset($response['id']) ? $response['id'] : false;
    }

    public function listarPacientes()
    {
        $url    = "http://localhost:3000/pacientes";
        $result = file_get_contents($url);
        $lista  = json_decode($result, true);

        $listaObj = [];
        foreach ($lista as &$paciente) {
            if (isset($paciente['data_nascimento'])) {
                $data                        = new DateTime($paciente['data_nascimento']);
                $paciente['data_nascimento'] = $data->format('Y-m-d');
            }
            $listaObj[] = $this->converterParaObj($paciente);
        }

        return $listaObj;
    }

    public function buscarPaciente($idPaciente)
    {
        $url   = "http://localhost:3000/pacientes/" . $idPaciente;
        $dados = [
            "id" => $idPaciente,
        ];

        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "content" => json_encode($dados),
            ],
        ];

        $context = stream_context_create($options);
        $result  = file_get_contents($url, false, $context);

        if ($result == false) {
            return false;
        }

        $response = json_decode($result, true);
        return $this->converterParaObj($response);
    }

    public function atualizarPacientes(Paciente $paciente)
    {
        $url   = "http://localhost:3000/pacientes/" . $paciente->getId();
        $dados = [
            "id"              => $paciente->getId(),
            "nome"            => $paciente->getNome(),
            "email"           => $paciente->getEmail(),
            "periodo"         => $paciente->getPeriodo(),
            "data_nascimento" => $paciente->getDataNasc(),
            "telefone"        => $paciente->getFone(),
            "nome_mae"        => $paciente->getNomeMae(),
            "medicamento"     => $paciente->getMedicamento(),
            "patologia"       => $paciente->getPatologia(),
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

    public function excluirPaciente(Paciente $paciente)
    {
        $url     = "http://localhost:3000/pacientes/" . $paciente->getId();
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

    private function converterParaObj($row)
    {
        $paciente = new Paciente();
        $paciente->setId($row["id"]);
        $paciente->setNome($row["cnome"]);
        $paciente->setEmail($row["cemail"]);
        $paciente->setPeriodo($row["cperiodo"]);
        $paciente->setNomeMae($row["cnome_mae"]);
        $paciente->setMedicamento($row["cmedicamento"]);
        $paciente->setPatologia($row["cpatologia"]);
        $paciente->setDataNasc($row["ddata_nascimento"]);
        $paciente->setDataCadastro($row["ddata_cadastro"]);
        $paciente->setFone($row["ctelefone"]);

        return $paciente;
    }
}
