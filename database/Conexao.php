<?php
class Conexao
{
    private $host     = 'localhost';
    private $usuarios = 'root';
    private $senha    = '';
    private $database = 'laboratorio';
    private $conexao;

    public function __construct($host = 'localhost', $usuarios = 'root', $senha = '', $database = 'laboratorio')
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->host     = $host;
        $this->usuarios = $usuarios;
        $this->senha    = $senha;
        $this->database = $database;
        $this->conectar();
    }

    public function conectar()
    {
        $this->conexao = new mysqli($this->host, $this->usuarios, $this->senha, $this->database);

        // Verifica se houve erro na conexão
        if ($this->conexao->error) {
            die('Erro na conexão: ' . $this->conexao->error);
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    public function fecharConexao()
    {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }
}
