<?php

class ExameBioquimica
{
    private $id;
    private $bilirrubinaTotal;
    private $bilirrubinaDireta;
    private $proteinaTotal;
    private $albumina;
    private $amilase;
    private $tgoTransaminaseGlutamicoOxalacetica;
    private $tgpTransaminaseGlutamicoPiruvica;
    private $gamaGtGlutamiltransferase;
    private $fosfataseAlcalina;
    private $reatinaQuinaseCk;
    private $glicose;
    private $ferro;
    private $colesterolTotal;
    private $hdl;
    private $ldl;
    private $triglicerideos;
    private $ureia;
    private $creatinina;
    private $acidoUrico;
    private $pcrProteinaCReativa;
    private $calcio;
    private $ldh;
    private $magnesio;
    private $fosforo;
    private $responsavel;
    private $preceptor;
    private $paciente;
    private $data;
    private $tipo;
    private $observacao;

    public function getId()
    {return $this->id;}
    public function setId($id)
    {$this->id = $id;}

    public function getBilirrubinaTotal()
    {return $this->bilirrubinaTotal;}
    public function setBilirrubinaTotal($bilirrubinaTotal)
    {$this->bilirrubinaTotal = $bilirrubinaTotal;}

    public function getBilirrubinaDireta()
    {return $this->bilirrubinaDireta;}
    public function setBilirrubinaDireta($bilirrubinaDireta)
    {$this->bilirrubinaDireta = $bilirrubinaDireta;}

    public function getProteinaTotal()
    {return $this->proteinaTotal;}
    public function setProteinaTotal($proteinaTotal)
    {$this->proteinaTotal = $proteinaTotal;}

    public function getAlbumina()
    {return $this->albumina;}
    public function setAlbumina($albumina)
    {$this->albumina = $albumina;}

    public function getAmilase()
    {return $this->amilase;}
    public function setAmilase($amilase)
    {$this->amilase = $amilase;}

    public function getTgoTransaminaseGlutamicoOxalacetica()
    {return $this->tgoTransaminaseGlutamicoOxalacetica;}
    public function setTgoTransaminaseGlutamicoOxalacetica($tgoTransaminaseGlutamicoOxalacetica)
    {$this->tgoTransaminaseGlutamicoOxalacetica = $tgoTransaminaseGlutamicoOxalacetica;}

    public function getTgpTransaminaseGlutamicoPiruvica()
    {return $this->tgpTransaminaseGlutamicoPiruvica;}
    public function setTgpTransaminaseGlutamicoPiruvica($tgpTransaminaseGlutamicoPiruvica)
    {$this->tgpTransaminaseGlutamicoPiruvica = $tgpTransaminaseGlutamicoPiruvica;}

    public function getGamaGtGlutamiltransferase()
    {return $this->gamaGtGlutamiltransferase;}
    public function setGamaGtGlutamiltransferase($gamaGtGlutamiltransferase)
    {$this->gamaGtGlutamiltransferase = $gamaGtGlutamiltransferase;}

    public function getFosfataseAlcalina()
    {return $this->fosfataseAlcalina;}
    public function setFosfataseAlcalina($fosfataseAlcalina)
    {$this->fosfataseAlcalina = $fosfataseAlcalina;}

    public function getReatinaQuinaseCk()
    {return $this->reatinaQuinaseCk;}
    public function setReatinaQuinaseCk($reatinaQuinaseCk)
    {$this->reatinaQuinaseCk = $reatinaQuinaseCk;}

    public function getGlicose()
    {return $this->glicose;}
    public function setGlicose($glicose)
    {$this->glicose = $glicose;}

    public function getFerro()
    {return $this->ferro;}
    public function setFerro($ferro)
    {$this->ferro = $ferro;}

    public function getColesterolTotal()
    {return $this->colesterolTotal;}
    public function setColesterolTotal($colesterolTotal)
    {$this->colesterolTotal = $colesterolTotal;}

    public function getHdl()
    {return $this->hdl;}
    public function setHdl($hdl)
    {$this->hdl = $hdl;}

    public function getLdl()
    {return $this->ldl;}
    public function setLdl($ldl)
    {$this->ldl = $ldl;}

    public function getTriglicerideos()
    {return $this->triglicerideos;}
    public function setTriglicerideos($triglicerideos)
    {$this->triglicerideos = $triglicerideos;}

    public function getUreia()
    {return $this->ureia;}
    public function setUreia($ureia)
    {$this->ureia = $ureia;}

    public function getCreatinina()
    {return $this->creatinina;}
    public function setCreatinina($creatinina)
    {$this->creatinina = $creatinina;}

    public function getAcidoUrico()
    {return $this->acidoUrico;}
    public function setAcidoUrico($acidoUrico)
    {$this->acidoUrico = $acidoUrico;}

    public function getPcrProteinaCReativa()
    {return $this->pcrProteinaCReativa;}
    public function setPcrProteinaCReativa($pcrProteinaCReativa)
    {$this->pcrProteinaCReativa = $pcrProteinaCReativa;}

    public function getCalcio()
    {return $this->calcio;}
    public function setCalcio($calcio)
    {$this->calcio = $calcio;}

    public function getLdh()
    {return $this->ldh;}
    public function setLdh($ldh)
    {$this->ldh = $ldh;}

    public function getMagnesio()
    {return $this->magnesio;}
    public function setMagnesio($magnesio)
    {$this->magnesio = $magnesio;}

    public function getFosforo()
    {return $this->fosforo;}
    public function setFosforo($fosforo)
    {$this->fosforo = $fosforo;}

    public function getResponsavel()
    {return $this->responsavel;}
    public function setResponsavel($responsavel)
    {$this->responsavel = $responsavel;}

    public function getPreceptor()
    {return $this->preceptor;}
    public function setPreceptor($preceptor)
    {$this->preceptor = $preceptor;}

    public function getPaciente()
    {return $this->paciente;}
    public function setPaciente($paciente)
    {$this->paciente = $paciente;}

    public function getData()
    {return $this->data;}
    public function setData($data)
    {$this->data = $data;}

    public function getTipo()
    {return $this->tipo;}

    public function setTipo($tipo)
    {$this->tipo = $tipo;}

    public function getObservacao()
    {return $this->observacao;}

    public function setObservacao($observacao)
    {$this->observacao = $observacao;}
}
