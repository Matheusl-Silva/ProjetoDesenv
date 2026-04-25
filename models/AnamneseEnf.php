<?php
class AnamneseEnf
{
    private $id;
    private $queixa;
    private $inicioSintomas;
    private $frequencia;
    private $localizacaoDaDor;
    private $cardiopatia;
    private $hipertensao;
    private $diabetes;
    private $cancer;
    private $cirurgias;
    private $outrasDoencas;
    private $alergias;
    private $medicamento;
    private $refeicoesAoDia;
    private $eliminacaoUrinaria;
    private $eliminacaoIntestinal;
    private $cicloMenstrual;
    private $sonoERepouso;
    private $horasDeSono;
    private $frequenciaFumo;
    private $frequenciaDrogas;
    private $frequenciaAlcool;
    private $frequenciaExercicios;
    private $lazer;
    private $saneamentoBasico;
    private $animaisDomesticos;
    private $postoDeSaude;
    private $doencaFamiliar;
    private $tratamentoDoencaFamiliar;
    private $idPaciente;
    private $data;
    private $tipo;

    public function getId() { return $this->id; }
    public function setId($valor) { $this->id = $valor; }

    public function getTipo() { return $this->tipo; }
    public function setTipo($valor) { $this->tipo = $valor; }

    public function getQueixa() { return $this->queixa; }
    public function setQueixa($valor) { $this->queixa = $valor; }

    public function getInicioSintomas() { return $this->inicioSintomas; }
    public function setInicioSintomas($valor) { $this->inicioSintomas = $valor; }

    public function getFrequencia() { return $this->frequencia; }
    public function setFrequencia($valor) { $this->frequencia = $valor; }

    public function getLocalizacaoDaDor() { return $this->localizacaoDaDor; }
    public function setLocalizacaoDaDor($valor) { $this->localizacaoDaDor = $valor; }

    public function getCardiopatia() { return $this->cardiopatia; }
    public function setCardiopatia($valor) { $this->cardiopatia = $valor; }

    public function getHipertensao() { return $this->hipertensao; }
    public function setHipertensao($valor) { $this->hipertensao = $valor; }

    public function getDiabetes() { return $this->diabetes; }
    public function setDiabetes($valor) { $this->diabetes = $valor; }

    public function getCancer() { return $this->cancer; }
    public function setCancer($valor) { $this->cancer = $valor; }

    public function getCirurgias() { return $this->cirurgias; }
    public function setCirurgias($valor) { $this->cirurgias = $valor; }

    public function getOutrasDoencas() { return $this->outrasDoencas; }
    public function setOutrasDoencas($valor) { $this->outrasDoencas = $valor; }

    public function getAlergias() { return $this->alergias; }
    public function setAlergias($valor) { $this->alergias = $valor; }

    public function getMedicamento() { return $this->medicamento; }
    public function setMedicamento($valor) { $this->medicamento = $valor; }

    public function getRefeicoesAoDia() { return $this->refeicoesAoDia; }
    public function setRefeicoesAoDia($valor) { $this->refeicoesAoDia = $valor; }

    public function getEliminacaoUrinaria() { return $this->eliminacaoUrinaria; }
    public function setEliminacaoUrinaria($valor) { $this->eliminacaoUrinaria = $valor; }

    public function getEliminacaoIntestinal() { return $this->eliminacaoIntestinal; }
    public function setEliminacaoIntestinal($valor) { $this->eliminacaoIntestinal = $valor; }

    public function getCicloMenstrual() { return $this->cicloMenstrual; }
    public function setCicloMenstrual($valor) { $this->cicloMenstrual = $valor; }

    public function getSonoERepouso() { return $this->sonoERepouso; }
    public function setSonoERepouso($valor) { $this->sonoERepouso = $valor; }

    public function getHorasDeSono() { return $this->horasDeSono; }
    public function setHorasDeSono($valor) { $this->horasDeSono = $valor; }

    public function getFrequenciaFumo() { return $this->frequenciaFumo; }
    public function setFrequenciaFumo($valor) { $this->frequenciaFumo = $valor; }

    public function getFrequenciaDrogas() { return $this->frequenciaDrogas; }
    public function setFrequenciaDrogas($valor) { $this->frequenciaDrogas = $valor; }

    public function getFrequenciaAlcool() { return $this->frequenciaAlcool; }
    public function setFrequenciaAlcool($valor) { $this->frequenciaAlcool = $valor; }

    public function getFrequenciaExercicios() { return $this->frequenciaExercicios; }
    public function setFrequenciaExercicios($valor) { $this->frequenciaExercicios = $valor; }

    public function getLazer() { return $this->lazer; }
    public function setLazer($valor) { $this->lazer = $valor; }

    public function getSaneamentoBasico() { return $this->saneamentoBasico; }
    public function setSaneamentoBasico($valor) { $this->saneamentoBasico = $valor; }

    public function getAnimaisDomesticos() { return $this->animaisDomesticos; }
    public function setAnimaisDomesticos($valor) { $this->animaisDomesticos = $valor; }

    public function getPostoDeSaude() { return $this->postoDeSaude; }
    public function setPostoDeSaude($valor) { $this->postoDeSaude = $valor; }

    public function getDoencaFamiliar() { return $this->doencaFamiliar; }
    public function setDoencaFamiliar($valor) { $this->doencaFamiliar = $valor; }

    public function getTratamentoDoencaFamiliar() { return $this->tratamentoDoencaFamiliar; }
    public function setTratamentoDoencaFamiliar($valor) { $this->tratamentoDoencaFamiliar = $valor; }

    public function getIdPaciente() { return $this->idPaciente; }
    public function setIdPaciente($valor) { $this->idPaciente = $valor; }

    public function getData() { return $this->data; }
    public function setData($valor) { $this->data = $valor; }
}