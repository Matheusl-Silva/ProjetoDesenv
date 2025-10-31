<?php

class ReferenciaHematologia
{
    private $id;
    private $hemacia_m;
    private $hemacia_f;
    private $hemoglobina_m;
    private $hemoglobina_f;
    private $hematocrito_m;
    private $hematocrito_f;
    private $vcm_m;
    private $vcm_f;
    private $hcm_m;
    private $hcm_f;
    private $chcm_m;
    private $chcm_f;
    private $rdw_m;
    private $rdw_f;
    private $leucocitos_relativo;
    private $leucocitos_absoluto;
    private $neutrofilos_relativo;
    private $neutrofilos_absoluto;
    private $blastos_relativo;
    private $blastos_absoluto;
    private $promielocitos_relativo;
    private $promielocitos_absoluto;
    private $mielocitos_relativo;
    private $mielocitos_absoluto;
    private $metamielocitos_relativo;
    private $metamielocitos_absoluto;
    private $bastonetes_relativo;
    private $bastonetes_absoluto;
    private $segmentados_relativo;
    private $segmentados_absoluto;
    private $eosinofilos_relativo;
    private $eosinofilos_absoluto;
    private $basofilos_relativo;
    private $basofilos_absoluto;
    private $linfocitos_relativo;
    private $linfocitos_absoluto;
    private $linfocitos_atipicos_relativo;
    private $linfocitos_atipicos_absoluto;
    private $monocitos_relativo;
    private $monocitos_absoluto;
    private $mieloblastos_relativo;
    private $mieloblastos_absoluto;
    private $outras_celulas_relativo;
    private $outras_celulas_absoluto;
    private $celulas_linfoides_relativo;
    private $celulas_linfoides_absoluto;
    private $celulas_monocitoides_relativo;
    private $celulas_monocitoides_absoluto;
    private $plaquetas;
    private $volume_plaquetario_medio;

    // Getters e Setters
    public function getId()
    {return $this->id;}
    public function setId($id)
    {$this->id = $id;}

    public function getHemaciaM()
    {return $this->hemacia_m;}
    public function setHemaciaM($hemacia_m)
    {$this->hemacia_m = $hemacia_m;}

    public function getHemaciaF()
    {return $this->hemacia_f;}
    public function setHemaciaF($hemacia_f)
    {$this->hemacia_f = $hemacia_f;}

    public function getHemoglobinaM()
    {return $this->hemoglobina_m;}
    public function setHemoglobinaM($hemoglobina_m)
    {$this->hemoglobina_m = $hemoglobina_m;}

    public function getHemoglobinaF()
    {return $this->hemoglobina_f;}
    public function setHemoglobinaF($hemoglobina_f)
    {$this->hemoglobina_f = $hemoglobina_f;}

    public function getHematocritoM()
    {return $this->hematocrito_m;}
    public function setHematocritoM($hematocrito_m)
    {$this->hematocrito_m = $hematocrito_m;}

    public function getHematocritoF()
    {return $this->hematocrito_f;}
    public function setHematocritoF($hematocrito_f)
    {$this->hematocrito_f = $hematocrito_f;}

    public function getVcmM()
    {return $this->vcm_m;}
    public function setVcmM($vcm_m)
    {$this->vcm_m = $vcm_m;}

    public function getVcmF()
    {return $this->vcm_f;}
    public function setVcmF($vcm_f)
    {$this->vcm_f = $vcm_f;}

    public function getHcmM()
    {return $this->hcm_m;}
    public function setHcmM($hcm_m)
    {$this->hcm_m = $hcm_m;}

    public function getHcmF()
    {return $this->hcm_f;}
    public function setHcmF($hcm_f)
    {$this->hcm_f = $hcm_f;}

    public function getChcmM()
    {return $this->chcm_m;}
    public function setChcmM($chcm_m)
    {$this->chcm_m = $chcm_m;}

    public function getChcmF()
    {return $this->chcm_f;}
    public function setChcmF($chcm_f)
    {$this->chcm_f = $chcm_f;}

    public function getRdwM()
    {return $this->rdw_m;}
    public function setRdwM($rdw_m)
    {$this->rdw_m = $rdw_m;}

    public function getRdwF()
    {return $this->rdw_f;}
    public function setRdwF($rdw_f)
    {$this->rdw_f = $rdw_f;}

    public function getLeucocitosRelativo()
    {return $this->leucocitos_relativo;}
    public function setLeucocitosRelativo($leucocitos_relativo)
    {$this->leucocitos_relativo = $leucocitos_relativo;}

    public function getLeucocitosAbsoluto()
    {return $this->leucocitos_absoluto;}
    public function setLeucocitosAbsoluto($leucocitos_absoluto)
    {$this->leucocitos_absoluto = $leucocitos_absoluto;}

    public function getNeutrofilosRelativo()
    {return $this->neutrofilos_relativo;}
    public function setNeutrofilosRelativo($neutrofilos_relativo)
    {$this->neutrofilos_relativo = $neutrofilos_relativo;}

    public function getNeutrofilosAbsoluto()
    {return $this->neutrofilos_absoluto;}
    public function setNeutrofilosAbsoluto($neutrofilos_absoluto)
    {$this->neutrofilos_absoluto = $neutrofilos_absoluto;}

    public function getBlastosRelativo()
    {return $this->blastos_relativo;}
    public function setBlastosRelativo($blastos_relativo)
    {$this->blastos_relativo = $blastos_relativo;}

    public function getBlastosAbsoluto()
    {return $this->blastos_absoluto;}
    public function setBlastosAbsoluto($blastos_absoluto)
    {$this->blastos_absoluto = $blastos_absoluto;}

    public function getPromielocitosRelativo()
    {return $this->promielocitos_relativo;}
    public function setPromielocitosRelativo($promielocitos_relativo)
    {$this->promielocitos_relativo = $promielocitos_relativo;}

    public function getPromielocitosAbsoluto()
    {return $this->promielocitos_absoluto;}
    public function setPromielocitosAbsoluto($promielocitos_absoluto)
    {$this->promielocitos_absoluto = $promielocitos_absoluto;}

    public function getMielocitosRelativo()
    {return $this->mielocitos_relativo;}
    public function setMielocitosRelativo($mielocitos_relativo)
    {$this->mielocitos_relativo = $mielocitos_relativo;}

    public function getMielocitosAbsoluto()
    {return $this->mielocitos_absoluto;}
    public function setMielocitosAbsoluto($mielocitos_absoluto)
    {$this->mielocitos_absoluto = $mielocitos_absoluto;}

    public function getMetamielocitosRelativo()
    {return $this->metamielocitos_relativo;}
    public function setMetamielocitosRelativo($metamielocitos_relativo)
    {$this->metamielocitos_relativo = $metamielocitos_relativo;}

    public function getMetamielocitosAbsoluto()
    {return $this->metamielocitos_absoluto;}
    public function setMetamielocitosAbsoluto($metamielocitos_absoluto)
    {$this->metamielocitos_absoluto = $metamielocitos_absoluto;}

    public function getBastonetesRelativo()
    {return $this->bastonetes_relativo;}
    public function setBastonetesRelativo($bastonetes_relativo)
    {$this->bastonetes_relativo = $bastonetes_relativo;}

    public function getBastonetesAbsoluto()
    {return $this->bastonetes_absoluto;}
    public function setBastonetesAbsoluto($bastonetes_absoluto)
    {$this->bastonetes_absoluto = $bastonetes_absoluto;}

    public function getSegmentadosRelativo()
    {return $this->segmentados_relativo;}
    public function setSegmentadosRelativo($segmentados_relativo)
    {$this->segmentados_relativo = $segmentados_relativo;}

    public function getSegmentadosAbsoluto()
    {return $this->segmentados_absoluto;}
    public function setSegmentadosAbsoluto($segmentados_absoluto)
    {$this->segmentados_absoluto = $segmentados_absoluto;}

    public function getEosinofilosRelativo()
    {return $this->eosinofilos_relativo;}
    public function setEosinofilosRelativo($eosinofilos_relativo)
    {$this->eosinofilos_relativo = $eosinofilos_relativo;}

    public function getEosinofilosAbsoluto()
    {return $this->eosinofilos_absoluto;}
    public function setEosinofilosAbsoluto($eosinofilos_absoluto)
    {$this->eosinofilos_absoluto = $eosinofilos_absoluto;}

    public function getBasofilosRelativo()
    {return $this->basofilos_relativo;}
    public function setBasofilosRelativo($basofilos_relativo)
    {$this->basofilos_relativo = $basofilos_relativo;}

    public function getBasofilosAbsoluto()
    {return $this->basofilos_absoluto;}
    public function setBasofilosAbsoluto($basofilos_absoluto)
    {$this->basofilos_absoluto = $basofilos_absoluto;}

    public function getLinfocitosRelativo()
    {return $this->linfocitos_relativo;}
    public function setLinfocitosRelativo($linfocitos_relativo)
    {$this->linfocitos_relativo = $linfocitos_relativo;}

    public function getLinfocitosAbsoluto()
    {return $this->linfocitos_absoluto;}
    public function setLinfocitosAbsoluto($linfocitos_absoluto)
    {$this->linfocitos_absoluto = $linfocitos_absoluto;}

    public function getLinfocitosAtipicosRelativo()
    {return $this->linfocitos_atipicos_relativo;}
    public function setLinfocitosAtipicosRelativo($linfocitos_atipicos_relativo)
    {$this->linfocitos_atipicos_relativo = $linfocitos_atipicos_relativo;}

    public function getLinfocitosAtipicosAbsoluto()
    {return $this->linfocitos_atipicos_absoluto;}
    public function setLinfocitosAtipicosAbsoluto($linfocitos_atipicos_absoluto)
    {$this->linfocitos_atipicos_absoluto = $linfocitos_atipicos_absoluto;}

    public function getMonocitosRelativo()
    {return $this->monocitos_relativo;}
    public function setMonocitosRelativo($monocitos_relativo)
    {$this->monocitos_relativo = $monocitos_relativo;}

    public function getMonocitosAbsoluto()
    {return $this->monocitos_absoluto;}
    public function setMonocitosAbsoluto($monocitos_absoluto)
    {$this->monocitos_absoluto = $monocitos_absoluto;}

    public function getMieloblastosRelativo()
    {return $this->mieloblastos_relativo;}
    public function setMieloblastosRelativo($mieloblastos_relativo)
    {$this->mieloblastos_relativo = $mieloblastos_relativo;}

    public function getMieloblastosAbsoluto()
    {return $this->mieloblastos_absoluto;}
    public function setMieloblastosAbsoluto($mieloblastos_absoluto)
    {$this->mieloblastos_absoluto = $mieloblastos_absoluto;}

    public function getOutrasCelulasRelativo()
    {return $this->outras_celulas_relativo;}
    public function setOutrasCelulasRelativo($outras_celulas_relativo)
    {$this->outras_celulas_relativo = $outras_celulas_relativo;}

    public function getOutrasCelulasAbsoluto()
    {return $this->outras_celulas_absoluto;}
    public function setOutrasCelulasAbsoluto($outras_celulas_absoluto)
    {$this->outras_celulas_absoluto = $outras_celulas_absoluto;}

    public function getCelulasLinfoidesRelativo()
    {return $this->celulas_linfoides_relativo;}
    public function setCelulasLinfoidesRelativo($celulas_linfoides_relativo)
    {$this->celulas_linfoides_relativo = $celulas_linfoides_relativo;}

    public function getCelulasLinfoidesAbsoluto()
    {return $this->celulas_linfoides_absoluto;}
    public function setCelulasLinfoidesAbsoluto($celulas_linfoides_absoluto)
    {$this->celulas_linfoides_absoluto = $celulas_linfoides_absoluto;}

    public function getCelulasMonocitoidesRelativo()
    {return $this->celulas_monocitoides_relativo;}
    public function setCelulasMonocitoidesRelativo($celulas_monocitoides_relativo)
    {$this->celulas_monocitoides_relativo = $celulas_monocitoides_relativo;}

    public function getCelulasMonocitoidesAbsoluto()
    {return $this->celulas_monocitoides_absoluto;}
    public function setCelulasMonocitoidesAbsoluto($celulas_monocitoides_absoluto)
    {$this->celulas_monocitoides_absoluto = $celulas_monocitoides_absoluto;}

    public function getPlaquetas()
    {return $this->plaquetas;}
    public function setPlaquetas($plaquetas)
    {$this->plaquetas = $plaquetas;}

    public function getVolumePlaquetarioMedio()
    {return $this->volume_plaquetario_medio;}
    public function setVolumePlaquetarioMedio($volume_plaquetario_medio)
    {$this->volume_plaquetario_medio = $volume_plaquetario_medio;}
}