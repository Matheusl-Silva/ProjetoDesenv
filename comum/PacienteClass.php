<?php
class Paciente extends Pessoa{
    private $registro;
    private $data; //Precisa?
    private $periodo;
    private $dataNasc;
    private $fone;
    private $nomeMae;

	public function __construct($nome, $email, $registro, $data, $periodo, $dataNasc, $fone, $nomeMae) {
        parent::__construct($nome, $email);
		$this->registro = $registro;
		$this->data = $data;
		$this->periodo = $periodo;
		$this->dataNasc = $dataNasc;
		$this->fone = $fone;
		$this->nomeMae = $nomeMae;
	}

	public function getRegistro() {
		return $this->registro;
	}

	public function setRegistro($valor) {
		$this->registro = $valor;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($valor) {
		$this->data = $valor;
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
}