<?php
class PacienteDAO
{
    public function verificarEmailExistente($email)
    {
        $r = ApiClient::post("/pacientes/verificar-email", ["email" => $email]);
        if ($r['status'] !== 200 || !$r['json']) {
            return false;
        }
        return $this->converterParaObj($r['json']);
    }

    public function cadastrarPaciente(Paciente $paciente)
    {
        $dados = [
            "nome"            => $paciente->getNome(),
            "email"           => $paciente->getEmail(),
            "periodo"         => $paciente->getPeriodo(),
            "data_nascimento" => $paciente->getDataNasc(),
            "telefone"        => $paciente->getFone(),
            "cpf"             => $paciente->getCpf(),
            "medicamento"     => $paciente->getMedicamento() ?: "",
            "patologia"       => $paciente->getPatologia() ?: "",
        ];
        $r = ApiClient::post("/pacientes", $dados);
        if ($r['status'] >= 400) {
            $resp = $r['json'];
            if (isset($resp['error']) && strpos($resp['error'], 'Email já cadastrado') !== false) {
                return "EMAIL_DUPLICADO";
            }
            return false;
        }
        return $r['json']['id'] ?? false;
    }

    public function listarPacientes()
    {
        $r = ApiClient::get("/pacientes");
        if ($r['status'] !== 200 || !is_array($r['json'])) {
            return [];
        }
        $listaObj = [];
        foreach ($r['json'] as $paciente) {
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
        $r = ApiClient::get("/pacientes/" . $idPaciente);
        if ($r['status'] !== 200) {
            return false;
        }
        return $this->converterParaObj($r['json']);
    }

    public function atualizarPacientes(Paciente $paciente)
    {
        $dados = [
            "id"              => $paciente->getId(),
            "nome"            => $paciente->getNome(),
            "email"           => $paciente->getEmail(),
            "periodo"         => $paciente->getPeriodo(),
            "data_nascimento" => $paciente->getDataNasc(),
            "telefone"        => $paciente->getFone(),
            "cpf"             => $paciente->getCpf(),
            "medicamento"     => $paciente->getMedicamento(),
            "patologia"       => $paciente->getPatologia(),
        ];
        $r = ApiClient::put("/pacientes/" . $paciente->getId(), $dados);
        if ($r['status'] >= 400) {
            return ["erro" => "Falha na requisição PUT"];
        }
        return $r['json'];
    }

    public function excluirPaciente(Paciente $paciente)
    {
        $r = ApiClient::delete("/pacientes/" . $paciente->getId());
        if ($r['status'] >= 400) {
            return ["erro" => "Erro ao excluir paciente"];
        }
        return $r['json'];
    }

    private function converterParaObj($row)
    {
        $paciente = new Paciente();
        $paciente->setId($row["id"] ?? null);
        $paciente->setNome($row["cnome"] ?? null);
        $paciente->setEmail($row["cemail"] ?? null);
        $paciente->setPeriodo($row["cperiodo"] ?? null);
        $paciente->setCpf($row["ccpf"] ?? null);
        $paciente->setMedicamento($row["cmedicamento"] ?? null);
        $paciente->setPatologia($row["cpatologia"] ?? null);
        $paciente->setDataNasc($row["ddata_nascimento"] ?? null);
        $paciente->setDataCadastro($row["ddata_cadastro"] ?? null);
        $paciente->setFone($row["ctelefone"] ?? null);
        return $paciente;
    }
}
