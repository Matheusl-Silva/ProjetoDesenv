<?php
class Usuario extends Pessoa{
    private $senha;
    
    public function _construct($nome, $email, $senha){
        parent::__construct($nome, $email);
        $this->senha = $senha;
    }

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($valor) {
		$this->senha = $valor;
	}
}