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

    public function __construct($id = null, $nome = null, $email = null, $periodo = null, $dataNasc = null, $fone = null, $nomeMae = null, $tomaMedicamento = null, $medicamento = null, $trataPatologia = null, $patologia = null)
    {
        parent::__construct($nome, $email);
        $this->id              = $id;
        $this->periodo         = $periodo;
        $this->dataNasc        = $dataNasc;
        $this->fone            = $fone;
        $this->nomeMae         = $nomeMae;
        $this->tomaMedicamento = $tomaMedicamento;
        $this->medicamento     = $medicamento;
        $this->trataPatologia  = $trataPatologia;
        $this->patologia       = $patologia;

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

}
