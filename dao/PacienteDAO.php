<?php
class PacienteDAO
{

    public function cadastrarPaciente($nome, $email, $periodo, $dataNasc, $telefone, $nomeMae, $tomaMedicamento, $medicamento, $trataPatologia, $patologia){
        $url = "https://localhost:3000/pacientes";
        $dados = [
            "nome" => $nome,
            "email" => $email,
            "periodo" => $periodo,
            "dataNasc" => $dataNasc,
            "telefone" => $telefone,
            "nomeMae" => $nomeMae,
            "tomaMedicamento" => $tomaMedicamento,
            "medicamento" => $medicamento,
            "trataPatologia" => $trataPatologia,
            "patologia" => $patologia
        ];
        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "POST",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result ? json_decode($result, true) : false;
    }

    public function listarPacientes()
    {
        $url = "http://localhost:3000/pacientes";
        $result = file_get_contents($url);
        $lista = json_decode($result, true);
       
        return $lista;
    }

    private function converterParaObj($row)
    {
        $p = new Paciente();
        $p->setNome($row['nome']);
        $p->setEmail($row['email']);
        $p->setPeriodo($row['$periodo']);
        $p->setDataNasc($row['dataNasc']);
        $p->setFone($row['fone']);
        $p->setNomeMae($row['nomeMae']);
        $p->setTomaMedicamento($row['tomaMedicamento']);
        $p->setMedicamento($row['medicamento']);
        $p->setTrataPatologia($row['trataPatologia']);
        $p->setPatologia($row['patologia']);

        return $p;
    }

    public function atualizarPacientes($nome, $email, $periodo, $dataNasc, $telefone, $nomeMae, $tomaMedicamento, $medicamento, $trataPatologia, $patologia)
    {
        $url = "http://localhost:3000/pacientes" . $email;
        $dados = [
            "nome" => $nome,
            "email" => $email,
            "periodo" => $periodo,
            "dataNasc" => $dataNasc,
            "telefone" => $telefone,
            "nomeMae" => $nomeMae,
            "tomaMedicamento" => $tomaMedicamento,
            "medicamento" => $medicamento,
            "trataPatologia" => $trataPatologia,
            "patologia" => $patologia
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "PUT",
                "content" => json_encode($dados)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return ["erro" => "Falha na requisição PUT"];
        }
        return json_decode($result, true);
    }

    public function excluirPaciente($email)
    {
        $url = "http://localhost:3000/pacientes" . $email;
        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "DELETE"
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if($result === FALSE){
            return ["erro" => "Erro ao excluir paciente"];
        }
        return json_decode($result, true);
    }
}
