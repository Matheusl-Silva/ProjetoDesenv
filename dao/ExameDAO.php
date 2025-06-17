<?php
class ExameDAO {
    private $mysqli;

    public function __construct(mysqli $mysqli) {
        $this->mysqli = $mysqli;
    }

    public function buscarPorPacienteId(int $registro_paciente): array {
        $stmt = $this->mysqli->prepare("SELECT id, data, id_preceptor FROM exames WHERE registro_paciente = ? ORDER BY data DESC");
        $stmt->bind_param("i", $registro_paciente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function buscarExameCompletoPorId(int $id_exame): ?array {
        $sql = "SELECT 
                    e.*, 
                    p.nome as nome_paciente, 
                    u_resp.nome as nome_responsavel,
                    u_prec.nome as nome_preceptor
                FROM exames e
                JOIN pacientes p ON e.registro_paciente = p.id
                JOIN usuarios u_resp ON e.id_responsavel = u_resp.id
                JOIN usuarios u_prec ON e.id_preceptor = u_prec.id
                WHERE e.id = ?";
        
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id_exame);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function salvarExame(array $dados): bool {

        $sql = "INSERT INTO exames (
                    id_responsavel, id_preceptor, registro_paciente, dentrada, dentrega, data,
                    hemacia, hemoglobina, hematocrito, vcm, hcm, chcm, rdw, leucocitos,
                    blastos, promielocitos, mielocitos, metamielocitos, bastonetes, segmentados,
                    eosinofilos, basofilos, plaquetas, volplaquetariomedio, neutrofilos
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->mysqli->prepare($sql);

        $stmt->bind_param(
            "iiisssddddddddddddddddddd",
            $dados['id_responsavel'],
            $dados['id_preceptor'],
            $dados['registro_paciente'],
            $dados['dentrada'],
            $dados['dentrega'],
            $dados['data'],
            $dados['hemacia'],
            $dados['hemoglobina'],
            $dados['hematocrito'],
            $dados['vcm'],
            $dados['hcm'],
            $dados['chcm'],
            $dados['rdw'],
            $dados['leucocitos'],
            $dados['blastos'],
            $dados['promielocitos'],
            $dados['mielocitos'],
            $dados['metamielocitos'],
            $dados['bastonetes'],
            $dados['segmentados'],
            $dados['eosinofilos'],
            $dados['basofilos'],
            $dados['plaquetas'],
            $dados['plaquetarioMedio'],
            $dados['neutrofilos']
        );

        return $stmt->execute();
    }
}