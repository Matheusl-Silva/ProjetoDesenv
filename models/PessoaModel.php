<?php
class Pessoa
{
    protected $nome;
    protected $email;

    public function __construct($nome = null, $email = null)
    {
        $this->nome  = $nome;
        $this->email = $email;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($valor)
    {
        $this->email = $valor;
    }
}
