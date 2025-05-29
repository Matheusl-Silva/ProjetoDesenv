<?php
class Paciente extends Pessoa
{
	private $registro;
	private $periodo;
	private $dataNasc;
	private $fone;
	private $nomeMae;

	private $mysqli;

	public function __construct($nome=null, $email=null, $registro=null, $periodo=null, $dataNasc=null, $fone=null, $nomeMae=null)
	{
		parent::__construct($nome, $email);
		$this->registro = $registro;
		$this->periodo = $periodo;
		$this->dataNasc = $dataNasc;
		$this->fone = $fone;
		$this->nomeMae = $nomeMae;

		require_once __DIR__ . "/../database/conexaoClass.php";
		$bd = new Conexao();
		$this->mysqli = $bd->getConexao();
	}

	public function getRegistro()
	{
		return $this->registro;
	}

	public function setRegistro($valor)
	{
		$this->registro = $valor;
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

	public function listarPacientes()
	{
		$sql = "SELECT * FROM pacientes ORDER BY id";
		$resultado = $this->mysqli->query($sql);
		$pacientes = [];

		if ($resultado) {
			while ($linha = $resultado->fetch_assoc()) {
				$pacientes[] = $linha;
			}
		}

		return $pacientes;
	}

	public function renderizarTabelaPaciente()
	{
		$listaPacientes = $this->listarPacientes();
		$html = '<div class="table-responsive mt-3">
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
                            </tr>
                        </thead>
                        <tbody>';

		foreach ($listaPacientes as $paciente) {
			$html .= '<td>' . htmlspecialchars($paciente["id"]) . '</td>
					<td>' . htmlspecialchars($paciente["nome"]) . '</td>
					<td>' . htmlspecialchars($paciente["periodo"]) . '</td>
					<td>' . htmlspecialchars($paciente["data_nascimento"]) . '</td>
					<td>' . htmlspecialchars($paciente["telefone"]) . '</td>
					<td>' . htmlspecialchars($paciente["nome_mae"]);
		}
	}

	public function renderizarFormularioEdicao($paciente) {
		$html = '<div class="card-body bg-body-tertiary">
					<form action="../comum/validarPaciente.php" method="post">

                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome"  value = "' . htmlspecialchars($paciente["nome"]) . '" required>
                    </div>
                    <div class="form-group">
                        <p class="form-label">Período:</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" checked>
                            <label for="matutino" class="form-check-label">Matutino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno">
                            <label for="noturno" class="form-check-label">Noturno</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datanasc" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="datanasc" name="datanasc" value="' . htmlspecialchars($paciente["data_nasc"]) . '" required>
                    </div>

                    <div class="form-group">
                        <label for="fone" class="form-label">Telefone para contato:</label>
                        <input type="tel" id="fone" class="form-control" name="fone" value="' . htmlspecialchars($paciente["telefone"]) . '" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">E-mail para contato:</label>
                        <input type="email" id="email" class="form-control" name="email" valuie="' . htmlspecialchars($paciente["email"]) . '" required>
                    </div>

                    <div>
                        <label for="nomeMae" class="form-label">Nome da mãe:</label>
                        <input type="text" class="form-control" id="nomeMae" name="nomeMae" value="' . htmlspecialchars($paciente["nome_mae"]) . '" required>
                    </div>

                    <p class="form-label">Toma algum medicamento contínuo? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="medNao" class="form-check-input" name="tomaMedicamento" value="medNao" checked>
                        <label for="medNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="medSim" class="form-check-input" name="tomaMedicamento" value="medSim">
                                <label for="medSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="medicamento" name="medicamento" placeholder="Insira o medicamento">
                            </div>
                        </div>
                    </div>

                    <p class="form-label">Trata alguma patologia? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="patNao" class="form-check-input" name="trataPatologia" value="patNao" checked>
                        <label for="patNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="patSim" class="form-check-input" name="trataPatologia" value="patSim">
                                <label for="patSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="patologia" name="patologia" placeholder="Insira a patologia">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-12 mt-3 mb-2">Cadastrar</button>
                    </div>

                    <div class="card-footer bg-body-tertiary d-flex justify-content-center">
                        <a href="homeUsuario.php">Voltar para a tela de usuário</a>
                    </div>
                </form>
				</div>';
	}
}
