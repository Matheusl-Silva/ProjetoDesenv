<?php
class Paciente extends Pessoa
{
    private $periodo;
    private $dataNasc;
    private $fone;
    private $nomeMae;
    private $tomaMedicamento;
    private $medicamento;
    private $trataPatologia;
    private $patologia;

    private $mysqli;

    public function __construct($nome = null, $email = null, $periodo = null, $dataNasc = null, $fone = null, $nomeMae = null, $tomaMedicamento = null, $medicamento = null, $trataPatologia = null, $patologia = null)
    {
        parent::__construct($nome, $email);
        $this->periodo         = $periodo;
        $this->dataNasc        = $dataNasc;
        $this->fone            = $fone;
        $this->nomeMae         = $nomeMae;
        $this->tomaMedicamento = $tomaMedicamento;
        $this->medicamento     = $medicamento;
        $this->trataPatologia  = $trataPatologia;
        $this->patologia       = $patologia;

        require_once __DIR__ . "/../database/conexaoClass.php";
        $bd           = new Conexao();
        $this->mysqli = $bd->getConexao();
    }

    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function setPeriodo($valor)
    {
        $this->periodo = $valor;
    }

    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    public function setDataNasc($valor)
    {
        $this->dataNasc = $valor;
    }

    public function getFone()
    {
        return $this->fone;
    }

    public function setFone($valor)
    {
        $this->fone = $valor;
    }

    public function getNomeMae()
    {
        return $this->nomeMae;
    }

    public function setNomeMae($valor)
    {
        $this->nomeMae = $valor;
    }

    public function getTomaMedicamento()
    {
        return $this->tomaMedicamento;
    }

    public function setTomaMedicamento($valor)
    {
        $this->tomaMedicamento = $valor;
    }

    public function getMedicamento()
    {
        return $this->medicamento;
    }

    public function setMedicamento($valor)
    {
        $this->medicamento = $valor;
    }

    public function getTrataPatologia()
    {
        return $this->trataPatologia;
    }

    public function setTrataPatologia($valor)
    {
        $this->trataPatologia = $valor;
    }

    public function getPatologia()
    {
        return $this->patologia;
    }

    public function setPatologia($valor)
    {
        $this->patologia = $valor;
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

    public function renderizarTabelaPaciente()
    {
        $listaPacientes = $this->listarPacientes();
        $html           = '<div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Período</th>
                                <th>Data de nascimento</th>
                                <th>Telefone</th>
                                <th>Nome da mãe</th>
                                <th>Medicamento</th>
                                <th>Patologia</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($listaPacientes as $paciente) {
            $html .= '<tr>
                        <td>' . htmlspecialchars($paciente["id"]) . '</td>
                        <td>' . htmlspecialchars($paciente["nome"]) . '</td>
                        <td>' . htmlspecialchars($paciente["email"]) . '</td>
                        <td>' . htmlspecialchars($paciente["periodo"]) . '</td>
                        <td>' . htmlspecialchars($paciente["data_nascimento"]) . '</td>
                        <td>' . htmlspecialchars($paciente["telefone"]) . '</td>
                        <td>' . htmlspecialchars($paciente["nome_mae"]) . '</td>
                        <td>' . ($paciente["toma_medicamento"] === "medSim" ? htmlspecialchars($paciente["medicamento"]) : "Não") . '</td>
                        <td>' . ($paciente["trata_patologia"] === "patSim" ? htmlspecialchars($paciente["patologia"]) : "Não") . '</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="editarPaciente.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="email" value="' . htmlspecialchars($paciente["email"]) . '">
                                    <button type="submit" name="buscar_paciente" class="btn btn-primary btn-sm" style="width: 60px;">Editar</button>
                                </form>
                                <form action="editarPaciente.php" method="POST" style="display: inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este paciente?\');">
                                    <input type="hidden" name="email" value="' . htmlspecialchars($paciente["email"]) . '">
                                    <button type="submit" name="excluir_paciente" class="btn btn-danger btn-sm" style="width: 60px;">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>';
        }

        $html .= '</tbody></table></div>';

        return $html;
    }

    public function renderizarFormularioEdicao($paciente)
    {
        $html = '<div class="card-body bg-body-tertiary">
                    <form action="editarPaciente.php" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label for="nome" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control mb-2" name="nome" id="nome"
                                    value="' . htmlspecialchars($paciente["nome"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" id="email"
                                    value="' . htmlspecialchars($paciente["email"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Período:</label>
                                <div class="form-check">
                                    <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" ' . ($paciente["periodo"] === "matutino" ? "checked" : "") . '>
                                    <label for="matutino" class="form-check-label">Matutino</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno" ' . ($paciente["periodo"] === "noturno" ? "checked" : "") . '>
                                    <label for="noturno" class="form-check-label">Noturno</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control mb-2" name="data_nascimento" id="data_nascimento"
                                    value="' . htmlspecialchars($paciente["data_nascimento"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="tel" class="form-control mb-2" name="telefone" id="telefone"
                                    value="' . htmlspecialchars($paciente["telefone"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="nome_mae" class="form-label">Nome da Mãe:</label>
                                <input type="text" class="form-control mb-2" name="nome_mae" id="nome_mae"
                                    value="' . htmlspecialchars($paciente["nome_mae"]) . '" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Toma algum medicamento contínuo?</label>
                                <div class="form-check">
                                    <input type="radio" id="medNao" class="form-check-input" name="toma_medicamento" value="medNao" ' . ($paciente["toma_medicamento"] === "medNao" ? "checked" : "") . '>
                                    <label for="medNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="medSim" class="form-check-input" name="toma_medicamento" value="medSim" ' . ($paciente["toma_medicamento"] === "medSim" ? "checked" : "") . '>
                                    <label for="medSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="medicamentoContainer" style="display: ' . ($paciente["toma_medicamento"] === "medSim" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="medicamento" class="form-label">Qual medicamento?</label>
                                <input type="text" class="form-control mb-2" name="medicamento" id="medicamento"
                                    value="' . htmlspecialchars($paciente["medicamento"]) . '">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Trata alguma patologia?</label>
                                <div class="form-check">
                                    <input type="radio" id="patNao" class="form-check-input" name="trata_patologia" value="patNao" ' . ($paciente["trata_patologia"] === "patNao" ? "checked" : "") . '>
                                    <label for="patNao" class="form-check-label">Não</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="patSim" class="form-check-input" name="trata_patologia" value="patSim" ' . ($paciente["trata_patologia"] === "patSim" ? "checked" : "") . '>
                                    <label for="patSim" class="form-check-label">Sim</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="patologiaContainer" style="display: ' . ($paciente["trata_patologia"] === "patSim" ? "block" : "none") . ';">
                            <div class="form-group col">
                                <label for="patologia" class="form-label">Qual patologia?</label>
                                <input type="text" class="form-control mb-2" name="patologia" id="patologia"
                                    value="' . htmlspecialchars($paciente["patologia"]) . '">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="atualizar_paciente" class="btn btn-primary col-12 mt-3 mb-2">Atualizar</button>
                        </div>
                    </form>
                </div>';

        return $html;
    }
}
