<?php
    class Pessoa {
        private $nome;
        private $email;

	public function __construct($nome, $email) {

		$this->nome = $nome;
		$this->email = $email;
	}

	public function getPessoa() {
		return $this->nome;
	}

	public function setPessoa($valor) {
		$this->nome = $valor;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($valor) {
		$this->email = $valor;
	}
}