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
    {$this->hemacia = is_string($hemacia) ? str_replace(',', '.', $hemacia) : $hemacia;}

    public function getHemoglobina()
    {return $this->hemoglobina;}
    public function setHemoglobina($hemoglobina)
    {$this->hemoglobina = is_string($hemoglobina) ? str_replace(',', '.', $hemoglobina) : $hemoglobina;}

    public function getHematocrito()
    {return $this->hematocrito;}
    public function setHematocrito($hematocrito)
    {$this->hematocrito = is_string($hematocrito) ? str_replace(',', '.', $hematocrito) : $hematocrito;}

    public function getVcm()
    {return $this->vcm;}
    public function setVcm($vcm)
    {$this->vcm = is_string($vcm) ? str_replace(',', '.', $vcm) : $vcm;}

    public function getHcm()
    {return $this->hcm;}
    public function setHcm($hcm)
    {$this->hcm = is_string($hcm) ? str_replace(',', '.', $hcm) : $hcm;}

    public function getChcm()
    {return $this->chcm;}
    public function setChcm($chcm)
    {$this->chcm = is_string($chcm) ? str_replace(',', '.', $chcm) : $chcm;}

    public function getRdw()
    {return $this->rdw;}
    public function setRdw($rdw)
    {$this->rdw = is_string($rdw) ? str_replace(',', '.', $rdw) : $rdw;}

    public function getLeucocitos()
    {return $this->leucocitos;}
    public function setLeucocitos($leucocitos)
    {$this->leucocitos = is_string($leucocitos) ? str_replace(',', '.', $leucocitos) : $leucocitos;}

    public function getNeutrofilos()
    {return $this->neutrofilos;}
    public function setNeutrofilos($neutrofilos)
    {$this->neutrofilos = is_string($neutrofilos) ? str_replace(',', '.', $neutrofilos) : $neutrofilos;}

    public function getBlastos()
    {return $this->blastos;}
    public function setBlastos($blastos)
    {$this->blastos = is_string($blastos) ? str_replace(',', '.', $blastos) : $blastos;}

    public function getPromielocitos()
    {return $this->promielocitos;}
    public function setPromielocitos($promielocitos)
    {$this->promielocitos = is_string($promielocitos) ? str_replace(',', '.', $promielocitos) : $promielocitos;}

    public function getMielocitos()
    {return $this->mielocitos;}
    public function setMielocitos($mielocitos)
    {$this->mielocitos = is_string($mielocitos) ? str_replace(',', '.', $mielocitos) : $mielocitos;}

    public function getMetamielocitos()
    {return $this->metamielocitos;}
    public function setMetamielocitos($metamielocitos)
    {$this->metamielocitos = is_string($metamielocitos) ? str_replace(',', '.', $metamielocitos) : $metamielocitos;}

    public function getBastonetes()
    {return $this->bastonetes;}
    public function setBastonetes($bastonetes)
    {$this->bastonetes = is_string($bastonetes) ? str_replace(',', '.', $bastonetes) : $bastonetes;}

    public function getSegmentados()
    {return $this->segmentados;}
    public function setSegmentados($segmentados)
    {$this->segmentados = is_string($segmentados) ? str_replace(',', '.', $segmentados) : $segmentados;}

    public function getEosinofilos()
    {return $this->eosinofilos;}
    public function setEosinofilos($eosinofilos)
    {$this->eosinofilos = is_string($eosinofilos) ? str_replace(',', '.', $eosinofilos) : $eosinofilos;}

    public function getBasofilos()
    {return $this->basofilos;}
    public function setBasofilos($basofilos)
    {$this->basofilos = is_string($basofilos) ? str_replace(',', '.', $basofilos) : $basofilos;}

    public function getLinfocitos()
    {return $this->linfocitos;}
    public function setLinfocitos($linfocitos)
    {$this->linfocitos = is_string($linfocitos) ? str_replace(',', '.', $linfocitos) : $linfocitos;}

    public function getLinfocitosAtipicos()
    {return $this->linfocitosAtipicos;}
    public function setLinfocitosAtipicos($linfocitosAtipicos)
    {$this->linfocitosAtipicos = is_string($linfocitosAtipicos) ? str_replace(',', '.', $linfocitosAtipicos) : $linfocitosAtipicos;}

    public function getMonocitos()
    {return $this->monocitos;}
    public function setMonocitos($monocitos)
    {$this->monocitos = is_string($monocitos) ? str_replace(',', '.', $monocitos) : $monocitos;}

    public function getMieloblastos()
    {return $this->mieloblastos;}
    public function setMieloblastos($mieloblastos)
    {$this->mieloblastos = is_string($mieloblastos) ? str_replace(',', '.', $mieloblastos) : $mieloblastos;}

    public function getOutrasCelulas()
    {return $this->outrasCelulas;}
    public function setOutrasCelulas($outrasCelulas)
    {$this->outrasCelulas = is_string($outrasCelulas) ? str_replace(',', '.', $outrasCelulas) : $outrasCelulas;}

    public function getCelulasLinfoides()
    {return $this->celulasLinfoides;}
    public function setCelulasLinfoides($celulasLinfoides)
    {$this->celulasLinfoides = is_string($celulasLinfoides) ? str_replace(',', '.', $celulasLinfoides) : $celulasLinfoides;}

    public function getCelulasMonocitoides()
    {return $this->celulasMonocitoides;}
    public function setCelulasMonocitoides($celulasMonocitoides)
    {$this->celulasMonocitoides = is_string($celulasMonocitoides) ? str_replace(',', '.', $celulasMonocitoides) : $celulasMonocitoides;}

    public function getPlaquetas()
    {return $this->plaquetas;}
    public function setPlaquetas($plaquetas)
    {$this->plaquetas = is_string($plaquetas) ? str_replace(',', '.', $plaquetas) : $plaquetas;}

    public function getVolumePlaquetarioMedio()
    {return $this->volumePlaquetarioMedio;}
    public function setVolumePlaquetarioMedio($volumePlaquetarioMedio)
    {$this->volumePlaquetarioMedio = is_string($volumePlaquetarioMedio) ? str_replace(',', '.', $volumePlaquetarioMedio) : $volumePlaquetarioMedio;}

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
