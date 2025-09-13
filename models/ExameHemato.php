<?php

class ExameHemato
{
    private $id;
    private $hemacia;
    private $hemoglobina;
    private $hematocrito;
    private $vcm;
    private $hcm;
    private $chcm;
    private $rdw;
    private $leucocitos;
    private $neutrofilos;
    private $blastos;
    private $promielocitos;
    private $mielocitos;
    private $metamielocitos;
    private $bastonetes;
    private $segmentados;
    private $eosinofilos;
    private $basofilos;
    private $linfocitos;
    private $linfocitosAtipicos;
    private $monocitos;
    private $mieloblastos;
    private $outrasCelulas;
    private $celulasLinfoides;
    private $celulasMonocitoides;
    private $plaquetas;
    private $volumePlaquetarioMedio;
    private $data;
    private $idResponsavel;
    private $preceptor;
    private $paciente;
    private $tipo;

    // Getters e Setters
    public function getId()
    {return $this->id;}
    public function setId($id)
    {$this->id = $id;}

    public function getHemacia()
    {return $this->hemacia;}
    public function setHemacia($hemacia)
    {$this->hemacia = $hemacia;}

    public function getHemoglobina()
    {return $this->hemoglobina;}
    public function setHemoglobina($hemoglobina)
    {$this->hemoglobina = $hemoglobina;}

    public function getHematocrito()
    {return $this->hematocrito;}
    public function setHematocrito($hematocrito)
    {$this->hematocrito = $hematocrito;}

    public function getVcm()
    {return $this->vcm;}
    public function setVcm($vcm)
    {$this->vcm = $vcm;}

    public function getHcm()
    {return $this->hcm;}
    public function setHcm($hcm)
    {$this->hcm = $hcm;}

    public function getChcm()
    {return $this->chcm;}
    public function setChcm($chcm)
    {$this->chcm = $chcm;}

    public function getRdw()
    {return $this->rdw;}
    public function setRdw($rdw)
    {$this->rdw = $rdw;}

    public function getLeucocitos()
    {return $this->leucocitos;}
    public function setLeucocitos($leucocitos)
    {$this->leucocitos = $leucocitos;}

    public function getNeutrofilos()
    {return $this->neutrofilos;}
    public function setNeutrofilos($neutrofilos)
    {$this->neutrofilos = $neutrofilos;}

    public function getBlastos()
    {return $this->blastos;}
    public function setBlastos($blastos)
    {$this->blastos = $blastos;}

    public function getPromielocitos()
    {return $this->promielocitos;}
    public function setPromielocitos($promielocitos)
    {$this->promielocitos = $promielocitos;}

    public function getMielocitos()
    {return $this->mielocitos;}
    public function setMielocitos($mielocitos)
    {$this->mielocitos = $mielocitos;}

    public function getMetamielocitos()
    {return $this->metamielocitos;}
    public function setMetamielocitos($metamielocitos)
    {$this->metamielocitos = $metamielocitos;}

    public function getBastonetes()
    {return $this->bastonetes;}
    public function setBastonetes($bastonetes)
    {$this->bastonetes = $bastonetes;}

    public function getSegmentados()
    {return $this->segmentados;}
    public function setSegmentados($segmentados)
    {$this->segmentados = $segmentados;}

    public function getEosinofilos()
    {return $this->eosinofilos;}
    public function setEosinofilos($eosinofilos)
    {$this->eosinofilos = $eosinofilos;}

    public function getBasofilos()
    {return $this->basofilos;}
    public function setBasofilos($basofilos)
    {$this->basofilos = $basofilos;}

    public function getLinfocitos()
    {return $this->linfocitos;}
    public function setLinfocitos($linfocitos)
    {$this->linfocitos = $linfocitos;}

    public function getLinfocitosAtipicos()
    {return $this->linfocitosAtipicos;}
    public function setLinfocitosAtipicos($linfocitosAtipicos)
    {$this->linfocitosAtipicos = $linfocitosAtipicos;}

    public function getMonocitos()
    {return $this->monocitos;}
    public function setMonocitos($monocitos)
    {$this->monocitos = $monocitos;}

    public function getMieloblastos()
    {return $this->mieloblastos;}
    public function setMieloblastos($mieloblastos)
    {$this->mieloblastos = $mieloblastos;}

    public function getOutrasCelulas()
    {return $this->outrasCelulas;}
    public function setOutrasCelulas($outrasCelulas)
    {$this->outrasCelulas = $outrasCelulas;}

    public function getCelulasLinfoides()
    {return $this->celulasLinfoides;}
    public function setCelulasLinfoides($celulasLinfoides)
    {$this->celulasLinfoides = $celulasLinfoides;}

    public function getCelulasMonocitoides()
    {return $this->celulasMonocitoides;}
    public function setCelulasMonocitoides($celulasMonocitoides)
    {$this->celulasMonocitoides = $celulasMonocitoides;}

    public function getPlaquetas()
    {return $this->plaquetas;}
    public function setPlaquetas($plaquetas)
    {$this->plaquetas = $plaquetas;}

    public function getVolumePlaquetarioMedio()
    {return $this->volumePlaquetarioMedio;}
    public function setVolumePlaquetarioMedio($volumePlaquetarioMedio)
    {$this->volumePlaquetarioMedio = $volumePlaquetarioMedio;}

    public function getData()
    {return $this->data;}
    public function setData($data)
    {$this->data = $data;}

    public function getIdResponsavel()
    {return $this->idResponsavel;}
    public function setIdResponsavel($idResponsavel)
    {$this->idResponsavel = $idResponsavel;}

    public function getPreceptor()
    {return $this->preceptor;}
    public function setPreceptor($preceptor)
    {$this->preceptor = $preceptor;}

    public function getPaciente()
    {return $this->paciente;}
    public function setPaciente($paciente)
    {$this->paciente = $paciente;}

    public function getTipo()
    {return $this->tipo;}

    public function setTipo($tipo)
    {$this->tipo = $tipo;}
}
