<?php
class Paciente extends Pessoa{
    private $registro;
    private $periodo;
    private $dataNasc;
    private $fone;
    private $nomeMae;

	private $mysqli;

	public function __construct($nome, $email, $registro, $periodo, $dataNasc, $fone, $nomeMae) {
        parent::__construct($nome, $email);
		$this->registro = $registro;
		$this->periodo = $periodo;
		$this->dataNasc = $dataNasc;
		$this->fone = $fone;
		$this->nomeMae = $nomeMae;

		require_once __DIR__. "/../database/conexaoClass.php";
		$bd = new Conexao();
		$this->mysqli = $bd->getConexao();
	}

	public function getRegistro() {
		return $this->registro;
	}

	public function setRegistro($valor) {
		$this->registro = $valor;
	}

	public function getPeriodo() {
		return $this->periodo;
	}

	public function setPeriodo($valor) {
		$this->periodo = $valor;
	}

	public function getDataNasc() {
		return $this->dataNasc;
	}

	public function setDataNasc($valor) {
		$this->dataNasc = $valor;
	}

	public function getFone() {
		return $this->fone;
	}

	public function setFone($valor) {
		$this->fone = $valor;
	}

	public function getNomeMae() {
		return $this->nomeMae;
	}

	public function setNomeMae($valor) {
		$this->nomeMae = $valor;
	}

	public function listarPacientes(){
		$sql = "SELECT * FROM pacientes ORDER BY id";
		$resultado = $this->mysqli->query($sql);
		$pacientes = [];

		if($resultado){
			while($linha = $resultado ->fetch_assoc()){
				$pacientes[] = $linha;
			}
		}

		return $pacientes;
	}

	public function renderizarTabelaPaciente(){
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

		foreach ($listaPacientes as $paciente){
			$html.= '<td>' . htmlspecialchars($paciente["id"]) . '</td>
					<td>' . htmlspecialchars($paciente["nome"]) . '</td>
					<td>' . htmlspecialchars($paciente["periodo"]) . '</td>
					<td>' . htmlspecialchars($paciente["data_nascimento"]) . '</td>
					<td>' . htmlspecialchars($paciente["telefone"]) . '</td>
					<td>' . htmlspecialchars($paciente["nome_mae"]);
		}
	}
}