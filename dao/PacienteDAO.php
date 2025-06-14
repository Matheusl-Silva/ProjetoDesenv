<?php
class PacienteDAO{
    private $mysqli;

    public function __construct(){
        require_once __DIR__ . "/../database/conexaoClass.php";
        $bd           = new Conexao();
        $this->mysqli = $bd->getConexao();
    }

    public function listarPacientes()
    {
        $sql       = "SELECT * FROM pacientes ORDER BY id";
        $resultado = $this->mysqli->query($sql);
        $pacientes = [];

        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $pacientes[] = $row;
            }
        }

        return $pacientes;
    }

    public function atualizarPacientes($nome, $email, $periodo, $data_nascimento, $telefone, $nome_mae, $toma_medicamento, $medicamento, $trata_patologia, $patologia)
    {
        $nome             = $this->mysqli->real_escape_string($nome);
        $email            = $this->mysqli->real_escape_string($email);
        $periodo          = $this->mysqli->real_escape_string($periodo);
        $data_nascimento  = $this->mysqli->real_escape_string($data_nascimento);
        $telefone         = $this->mysqli->real_escape_string($telefone);
        $nome_mae         = $this->mysqli->real_escape_string($nome_mae);
        $toma_medicamento = $this->mysqli->real_escape_string($toma_medicamento);
        $medicamento      = $this->mysqli->real_escape_string($medicamento);
        $trata_patologia  = $this->mysqli->real_escape_string($trata_patologia);
        $patologia        = $this->mysqli->real_escape_string($patologia);

        $sql = "UPDATE pacientes SET
                nome = '$nome',
                email = '$email',
                periodo = '$periodo',
                data_nascimento = '$data_nascimento',
                telefone = '$telefone',
                nome_mae = '$nome_mae',
                toma_medicamento = '$toma_medicamento',
                medicamento = '$medicamento',
                trata_patologia = '$trata_patologia',
                patologia = '$patologia'
                WHERE email = '$email'";

        if ($this->mysqli->query($sql)) {
            return true;
        }

        return false;
    }

    public function excluirPaciente($email)
    {
        $email = $this->mysqli->real_escape_string($email);
        $sql   = "DELETE FROM pacientes WHERE email = '$email'";

        return $this->mysqli->query($sql);
    }
}