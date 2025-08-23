<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
class Usuario extends Pessoa
{
    private $senha;
    private $admin;

    public function __construct($nome = null, $email = null, $senha = null, $admin = 'N')
    {
        parent::__construct($nome, $email);
        $this->senha = $senha;
        $this->admin = $admin;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($valor)
    {
        $this->senha = $valor;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }
}
