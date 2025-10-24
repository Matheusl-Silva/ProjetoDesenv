<?php

class ReferenciaHematologia
{
    private $id;
    private $chemacia_m;
    private $chemacia_f;
    private $chemacia_unidade;
    private $chemoglobina_m;
    private $chemoglobina_f;
    private $chemoglobina_unidade;
    private $chematocrito_m;
    private $chematocrito_f;
    private $chematocrito_unidade;
    private $cvcm_m;
    private $cvcm_f;
    private $cvcm_unidade;
    private $chcm_m;
    private $chcm_f;
    private $chcm_unidade;
    private $cchcw_m;
    private $cchcw_f;
    private $cchcw_unidade;
    private $crdw_m;
    private $crdw_f;
    private $crdw_unidade;
    private $cleucocitos_relativo;
    private $cleucocitos_relativo_unidade;
    private $cleucocitos_absoluto;
    private $cleucocitos_absoluto_unidade;
    private $cneutrofilos_relativo;
    private $cneutrofilos_relativo_unidade;
    private $cneutrofilos_absoluto;
    private $cneutrofilos_absoluto_unidade;
    private $cblastos_relativo;
    private $cblastos_relativo_unidade;
    private $cblastos_absoluto;
    private $cblastos_absoluto_unidade;
    private $cpromielocitos_relativo;
    private $cpromielocitos_relativo_unidade;
    private $cpromielocitos_absoluto;
    private $cpromielocitos_absoluto_unidade;
    private $cmielocitos_relativo;
    private $cmielocitos_relativo_unidade;
    private $cmielocitos_absoluto;
    private $cmielocitos_absoluto_unidade;
    private $cmetamielocitos_relativo;
    private $cmetamielocitos_relativo_unidade;
    private $cmetamielocitos_absoluto;
    private $cmetamielocitos_absoluto_unidade;
    private $cbastonetes_relativo;
    private $cbastonetes_relativo_unidade;
    private $cbastonetes_absoluto;
    private $cbastonetes_absoluto_unidade;
    private $csegmentados_relativo;
    private $csegmentados_relativo_unidade;
    private $csegmentados_absoluto;
    private $csegmentados_absoluto_unidade;
    private $ceosinofilos_relativo;
    private $ceosinofilos_relativo_unidade;
    private $ceosinofilos_absoluto;
    private $ceosinofilos_absoluto_unidade;
    private $cbasofilos_relativo;
    private $cbasofilos_relativo_unidade;
    private $cbasofilos_absoluto;
    private $cbasofilos_absoluto_unidade;
    private $clinfocitos_relativo;
    private $clinfocitos_relativo_unidade;
    private $clinfocitos_absoluto;
    private $clinfocitos_absoluto_unidade;
    private $clinfocitos_atipicos_relativo;
    private $clinfocitos_atipicos_relativo_unidade;
    private $clinfocitos_atipicos_absoluto;
    private $clinfocitos_atipicos_absoluto_unidade;
    private $cmonocitos_relativo;
    private $cmonocitos_relativo_unidade;
    private $cmonocitos_absoluto;
    private $cmonocitos_absoluto_unidade;
    private $cmieloblastos_relativo;
    private $cmieloblastos_relativo_unidade;
    private $cmieloblastos_absoluto;
    private $cmieloblastos_absoluto_unidade;
    private $coutras_celulas_relativo;
    private $coutras_celulas_relativo_unidade;
    private $coutras_celulas_absoluto;
    private $coutras_celulas_absoluto_unidade;
    private $ccelulas_linfoides_relativo;
    private $ccelulas_linfoides_relativo_unidade;
    private $ccelulas_linfoides_absoluto;
    private $ccelulas_linfoides_absoluto_unidade;
    private $ccelulas_monocitoides_relativo;
    private $ccelulas_monocitoides_relativo_unidade;
    private $ccelulas_monocitoides_absoluto;
    private $ccelulas_monocitoides_absoluto_unidade;
    private $cplaquetas;
    private $cplaquetas_unidade;
    private $cvolume_plaquetario_medio;
    private $cvolume_plaquetario_medio_unidade;

    // Getters e Setters
    public function getId()
    {return $this->id;}
    public function setId($id)
    {$this->id = $id;}

    public function getChemaciaM()
    {return $this->chemacia_m;}
    public function setChemaciaM($chemacia_m)
    {$this->chemacia_m = $chemacia_m;}

    public function getChemaciaF()
    {return $this->chemacia_f;}
    public function setChemaciaF($chemacia_f)
    {$this->chemacia_f = $chemacia_f;}

    public function getChemaciaUnidade()
    {return $this->chemacia_unidade;}
    public function setChemaciaUnidade($chemacia_unidade)
    {$this->chemacia_unidade = $chemacia_unidade;}

    public function getChemoglobinaM()
    {return $this->chemoglobina_m;}
    public function setChemoglobinaM($chemoglobina_m)
    {$this->chemoglobina_m = $chemoglobina_m;}

    public function getChemoglobinaF()
    {return $this->chemoglobina_f;}
    public function setChemoglobinaF($chemoglobina_f)
    {$this->chemoglobina_f = $chemoglobina_f;}

    public function getChemoglobinaUnidade()
    {return $this->chemoglobina_unidade;}
    public function setChemoglobinaUnidade($chemoglobina_unidade)
    {$this->chemoglobina_unidade = $chemoglobina_unidade;}

    public function getChematocritoM()
    {return $this->chematocrito_m;}
    public function setChematocritoM($chematocrito_m)
    {$this->chematocrito_m = $chematocrito_m;}

    public function getChematocritoF()
    {return $this->chematocrito_f;}
    public function setChematocritoF($chematocrito_f)
    {$this->chematocrito_f = $chematocrito_f;}

    public function getChematocritoUnidade()
    {return $this->chematocrito_unidade;}
    public function setChematocritoUnidade($chematocrito_unidade)
    {$this->chematocrito_unidade = $chematocrito_unidade;}

    public function getCvcmM()
    {return $this->cvcm_m;}
    public function setCvcmM($cvcm_m)
    {$this->cvcm_m = $cvcm_m;}

    public function getCvcmF()
    {return $this->cvcm_f;}
    public function setCvcmF($cvcm_f)
    {$this->cvcm_f = $cvcm_f;}

    public function getCvcmUnidade()
    {return $this->cvcm_unidade;}
    public function setCvcmUnidade($cvcm_unidade)
    {$this->cvcm_unidade = $cvcm_unidade;}

    public function getChcmM()
    {return $this->chcm_m;}
    public function setChcmM($chcm_m)
    {$this->chcm_m = $chcm_m;}

    public function getChcmF()
    {return $this->chcm_f;}
    public function setChcmF($chcm_f)
    {$this->chcm_f = $chcm_f;}

    public function getChcmUnidade()
    {return $this->chcm_unidade;}
    public function setChcmUnidade($chcm_unidade)
    {$this->chcm_unidade = $chcm_unidade;}

    public function getCchcwM()
    {return $this->cchcw_m;}
    public function setCchcwM($cchcw_m)
    {$this->cchcw_m = $cchcw_m;}

    public function getCchcwF()
    {return $this->cchcw_f;}
    public function setCchcwF($cchcw_f)
    {$this->cchcw_f = $cchcw_f;}

    public function getCchcwUnidade()
    {return $this->cchcw_unidade;}
    public function setCchcwUnidade($cchcw_unidade)
    {$this->cchcw_unidade = $cchcw_unidade;}

    public function getCrdwM()
    {return $this->crdw_m;}
    public function setCrdwM($crdw_m)
    {$this->crdw_m = $crdw_m;}

    public function getCrdwF()
    {return $this->crdw_f;}
    public function setCrdwF($crdw_f)
    {$this->crdw_f = $crdw_f;}

    public function getCrdwUnidade()
    {return $this->crdw_unidade;}
    public function setCrdwUnidade($crdw_unidade)
    {$this->crdw_unidade = $crdw_unidade;}

    public function getCleucocitosRelativo()
    {return $this->cleucocitos_relativo;}
    public function setCleucocitosRelativo($cleucocitos_relativo)
    {$this->cleucocitos_relativo = $cleucocitos_relativo;}

    public function getCleucocitosRelativoUnidade()
    {return $this->cleucocitos_relativo_unidade;}
    public function setCleucocitosRelativoUnidade($cleucocitos_relativo_unidade)
    {$this->cleucocitos_relativo_unidade = $cleucocitos_relativo_unidade;}

    public function getCleucocitosAbsoluto()
    {return $this->cleucocitos_absoluto;}
    public function setCleucocitosAbsoluto($cleucocitos_absoluto)
    {$this->cleucocitos_absoluto = $cleucocitos_absoluto;}

    public function getCleucocitosAbsolutoUnidade()
    {return $this->cleucocitos_absoluto_unidade;}
    public function setCleucocitosAbsolutoUnidade($cleucocitos_absoluto_unidade)
    {$this->cleucocitos_absoluto_unidade = $cleucocitos_absoluto_unidade;}

    public function getCneutrofilosRelativo()
    {return $this->cneutrofilos_relativo;}
    public function setCneutrofilosRelativo($cneutrofilos_relativo)
    {$this->cneutrofilos_relativo = $cneutrofilos_relativo;}

    public function getCneutrofilosRelativoUnidade()
    {return $this->cneutrofilos_relativo_unidade;}
    public function setCneutrofilosRelativoUnidade($cneutrofilos_relativo_unidade)
    {$this->cneutrofilos_relativo_unidade = $cneutrofilos_relativo_unidade;}

    public function getCneutrofilosAbsoluto()
    {return $this->cneutrofilos_absoluto;}
    public function setCneutrofilosAbsoluto($cneutrofilos_absoluto)
    {$this->cneutrofilos_absoluto = $cneutrofilos_absoluto;}

    public function getCneutrofilosAbsolutoUnidade()
    {return $this->cneutrofilos_absoluto_unidade;}
    public function setCneutrofilosAbsolutoUnidade($cneutrofilos_absoluto_unidade)
    {$this->cneutrofilos_absoluto_unidade = $cneutrofilos_absoluto_unidade;}

    public function getCblastosRelativo()
    {return $this->cblastos_relativo;}
    public function setCblastosRelativo($cblastos_relativo)
    {$this->cblastos_relativo = $cblastos_relativo;}

    public function getCblastosRelativoUnidade()
    {return $this->cblastos_relativo_unidade;}
    public function setCblastosRelativoUnidade($cblastos_relativo_unidade)
    {$this->cblastos_relativo_unidade = $cblastos_relativo_unidade;}

    public function getCblastosAbsoluto()
    {return $this->cblastos_absoluto;}
    public function setCblastosAbsoluto($cblastos_absoluto)
    {$this->cblastos_absoluto = $cblastos_absoluto;}

    public function getCblastosAbsolutoUnidade()
    {return $this->cblastos_absoluto_unidade;}
    public function setCblastosAbsolutoUnidade($cblastos_absoluto_unidade)
    {$this->cblastos_absoluto_unidade = $cblastos_absoluto_unidade;}

    public function getCpromielocitosRelativo()
    {return $this->cpromielocitos_relativo;}
    public function setCpromielocitosRelativo($cpromielocitos_relativo)
    {$this->cpromielocitos_relativo = $cpromielocitos_relativo;}

    public function getCpromielocitosRelativoUnidade()
    {return $this->cpromielocitos_relativo_unidade;}
    public function setCpromielocitosRelativoUnidade($cpromielocitos_relativo_unidade)
    {$this->cpromielocitos_relativo_unidade = $cpromielocitos_relativo_unidade;}

    public function getCpromielocitosAbsoluto()
    {return $this->cpromielocitos_absoluto;}
    public function setCpromielocitosAbsoluto($cpromielocitos_absoluto)
    {$this->cpromielocitos_absoluto = $cpromielocitos_absoluto;}

    public function getCpromielocitosAbsolutoUnidade()
    {return $this->cpromielocitos_absoluto_unidade;}
    public function setCpromielocitosAbsolutoUnidade($cpromielocitos_absoluto_unidade)
    {$this->cpromielocitos_absoluto_unidade = $cpromielocitos_absoluto_unidade;}

    public function getCmielocitosRelativo()
    {return $this->cmielocitos_relativo;}
    public function setCmielocitosRelativo($cmielocitos_relativo)
    {$this->cmielocitos_relativo = $cmielocitos_relativo;}

    public function getCmielocitosRelativoUnidade()
    {return $this->cmielocitos_relativo_unidade;}
    public function setCmielocitosRelativoUnidade($cmielocitos_relativo_unidade)
    {$this->cmielocitos_relativo_unidade = $cmielocitos_relativo_unidade;}

    public function getCmielocitosAbsoluto()
    {return $this->cmielocitos_absoluto;}
    public function setCmielocitosAbsoluto($cmielocitos_absoluto)
    {$this->cmielocitos_absoluto = $cmielocitos_absoluto;}

    public function getCmielocitosAbsolutoUnidade()
    {return $this->cmielocitos_absoluto_unidade;}
    public function setCmielocitosAbsolutoUnidade($cmielocitos_absoluto_unidade)
    {$this->cmielocitos_absoluto_unidade = $cmielocitos_absoluto_unidade;}

    public function getCmetamielocitosRelativo()
    {return $this->cmetamielocitos_relativo;}
    public function setCmetamielocitosRelativo($cmetamielocitos_relativo)
    {$this->cmetamielocitos_relativo = $cmetamielocitos_relativo;}

    public function getCmetamielocitosRelativoUnidade()
    {return $this->cmetamielocitos_relativo_unidade;}
    public function setCmetamielocitosRelativoUnidade($cmetamielocitos_relativo_unidade)
    {$this->cmetamielocitos_relativo_unidade = $cmetamielocitos_relativo_unidade;}

    public function getCmetamielocitosAbsoluto()
    {return $this->cmetamielocitos_absoluto;}
    public function setCmetamielocitosAbsoluto($cmetamielocitos_absoluto)
    {$this->cmetamielocitos_absoluto = $cmetamielocitos_absoluto;}

    public function getCmetamielocitosAbsolutoUnidade()
    {return $this->cmetamielocitos_absoluto_unidade;}
    public function setCmetamielocitosAbsolutoUnidade($cmetamielocitos_absoluto_unidade)
    {$this->cmetamielocitos_absoluto_unidade = $cmetamielocitos_absoluto_unidade;}

    public function getCbastonetesRelativo()
    {return $this->cbastonetes_relativo;}
    public function setCbastonetesRelativo($cbastonetes_relativo)
    {$this->cbastonetes_relativo = $cbastonetes_relativo;}

    public function getCbastonetesRelativoUnidade()
    {return $this->cbastonetes_relativo_unidade;}
    public function setCbastonetesRelativoUnidade($cbastonetes_relativo_unidade)
    {$this->cbastonetes_relativo_unidade = $cbastonetes_relativo_unidade;}

    public function getCbastonetesAbsoluto()
    {return $this->cbastonetes_absoluto;}
    public function setCbastonetesAbsoluto($cbastonetes_absoluto)
    {$this->cbastonetes_absoluto = $cbastonetes_absoluto;}

    public function getCbastonetesAbsolutoUnidade()
    {return $this->cbastonetes_absoluto_unidade;}
    public function setCbastonetesAbsolutoUnidade($cbastonetes_absoluto_unidade)
    {$this->cbastonetes_absoluto_unidade = $cbastonetes_absoluto_unidade;}

    public function getCsegmentadosRelativo()
    {return $this->csegmentados_relativo;}
    public function setCsegmentadosRelativo($csegmentados_relativo)
    {$this->csegmentados_relativo = $csegmentados_relativo;}

    public function getCsegmentadosRelativoUnidade()
    {return $this->csegmentados_relativo_unidade;}
    public function setCsegmentadosRelativoUnidade($csegmentados_relativo_unidade)
    {$this->csegmentados_relativo_unidade = $csegmentados_relativo_unidade;}

    public function getCsegmentadosAbsoluto()
    {return $this->csegmentados_absoluto;}
    public function setCsegmentadosAbsoluto($csegmentados_absoluto)
    {$this->csegmentados_absoluto = $csegmentados_absoluto;}

    public function getCsegmentadosAbsolutoUnidade()
    {return $this->csegmentados_absoluto_unidade;}
    public function setCsegmentadosAbsolutoUnidade($csegmentados_absoluto_unidade)
    {$this->csegmentados_absoluto_unidade = $csegmentados_absoluto_unidade;}

    public function getCeosinofilosRelativo()
    {return $this->ceosinofilos_relativo;}
    public function setCeosinofilosRelativo($ceosinofilos_relativo)
    {$this->ceosinofilos_relativo = $ceosinofilos_relativo;}

    public function getCeosinofilosRelativoUnidade()
    {return $this->ceosinofilos_relativo_unidade;}
    public function setCeosinofilosRelativoUnidade($ceosinofilos_relativo_unidade)
    {$this->ceosinofilos_relativo_unidade = $ceosinofilos_relativo_unidade;}

    public function getCeosinofilosAbsoluto()
    {return $this->ceosinofilos_absoluto;}
    public function setCeosinofilosAbsoluto($ceosinofilos_absoluto)
    {$this->ceosinofilos_absoluto = $ceosinofilos_absoluto;}

    public function getCeosinofilosAbsolutoUnidade()
    {return $this->ceosinofilos_absoluto_unidade;}
    public function setCeosinofilosAbsolutoUnidade($ceosinofilos_absoluto_unidade)
    {$this->ceosinofilos_absoluto_unidade = $ceosinofilos_absoluto_unidade;}

    public function getCbasofilosRelativo()
    {return $this->cbasofilos_relativo;}
    public function setCbasofilosRelativo($cbasofilos_relativo)
    {$this->cbasofilos_relativo = $cbasofilos_relativo;}

    public function getCbasofilosRelativoUnidade()
    {return $this->cbasofilos_relativo_unidade;}
    public function setCbasofilosRelativoUnidade($cbasofilos_relativo_unidade)
    {$this->cbasofilos_relativo_unidade = $cbasofilos_relativo_unidade;}

    public function getCbasofilosAbsoluto()
    {return $this->cbasofilos_absoluto;}
    public function setCbasofilosAbsoluto($cbasofilos_absoluto)
    {$this->cbasofilos_absoluto = $cbasofilos_absoluto;}

    public function getCbasofilosAbsolutoUnidade()
    {return $this->cbasofilos_absoluto_unidade;}
    public function setCbasofilosAbsolutoUnidade($cbasofilos_absoluto_unidade)
    {$this->cbasofilos_absoluto_unidade = $cbasofilos_absoluto_unidade;}

    public function getClinfocitosRelativo()
    {return $this->clinfocitos_relativo;}
    public function setClinfocitosRelativo($clinfocitos_relativo)
    {$this->clinfocitos_relativo = $clinfocitos_relativo;}

    public function getClinfocitosRelativoUnidade()
    {return $this->clinfocitos_relativo_unidade;}
    public function setClinfocitosRelativoUnidade($clinfocitos_relativo_unidade)
    {$this->clinfocitos_relativo_unidade = $clinfocitos_relativo_unidade;}

    public function getClinfocitosAbsoluto()
    {return $this->clinfocitos_absoluto;}
    public function setClinfocitosAbsoluto($clinfocitos_absoluto)
    {$this->clinfocitos_absoluto = $clinfocitos_absoluto;}

    public function getClinfocitosAbsolutoUnidade()
    {return $this->clinfocitos_absoluto_unidade;}
    public function setClinfocitosAbsolutoUnidade($clinfocitos_absoluto_unidade)
    {$this->clinfocitos_absoluto_unidade = $clinfocitos_absoluto_unidade;}

    public function getClinfocitosAtipicosRelativo()
    {return $this->clinfocitos_atipicos_relativo;}
    public function setClinfocitosAtipicosRelativo($clinfocitos_atipicos_relativo)
    {$this->clinfocitos_atipicos_relativo = $clinfocitos_atipicos_relativo;}

    public function getClinfocitosAtipicosRelativoUnidade()
    {return $this->clinfocitos_atipicos_relativo_unidade;}
    public function setClinfocitosAtipicosRelativoUnidade($clinfocitos_atipicos_relativo_unidade)
    {$this->clinfocitos_atipicos_relativo_unidade = $clinfocitos_atipicos_relativo_unidade;}

    public function getClinfocitosAtipicosAbsoluto()
    {return $this->clinfocitos_atipicos_absoluto;}
    public function setClinfocitosAtipicosAbsoluto($clinfocitos_atipicos_absoluto)
    {$this->clinfocitos_atipicos_absoluto = $clinfocitos_atipicos_absoluto;}

    public function getClinfocitosAtipicosAbsolutoUnidade()
    {return $this->clinfocitos_atipicos_absoluto_unidade;}
    public function setClinfocitosAtipicosAbsolutoUnidade($clinfocitos_atipicos_absoluto_unidade)
    {$this->clinfocitos_atipicos_absoluto_unidade = $clinfocitos_atipicos_absoluto_unidade;}

    public function getCmonocitosRelativo()
    {return $this->cmonocitos_relativo;}
    public function setCmonocitosRelativo($cmonocitos_relativo)
    {$this->cmonocitos_relativo = $cmonocitos_relativo;}

    public function getCmonocitosRelativoUnidade()
    {return $this->cmonocitos_relativo_unidade;}
    public function setCmonocitosRelativoUnidade($cmonocitos_relativo_unidade)
    {$this->cmonocitos_relativo_unidade = $cmonocitos_relativo_unidade;}

    public function getCmonocitosAbsoluto()
    {return $this->cmonocitos_absoluto;}
    public function setCmonocitosAbsoluto($cmonocitos_absoluto)
    {$this->cmonocitos_absoluto = $cmonocitos_absoluto;}

    public function getCmonocitosAbsolutoUnidade()
    {return $this->cmonocitos_absoluto_unidade;}
    public function setCmonocitosAbsolutoUnidade($cmonocitos_absoluto_unidade)
    {$this->cmonocitos_absoluto_unidade = $cmonocitos_absoluto_unidade;}

    public function getCmieloblastosRelativo()
    {return $this->cmieloblastos_relativo;}
    public function setCmieloblastosRelativo($cmieloblastos_relativo)
    {$this->cmieloblastos_relativo = $cmieloblastos_relativo;}

    public function getCmieloblastosRelativoUnidade()
    {return $this->cmieloblastos_relativo_unidade;}
    public function setCmieloblastosRelativoUnidade($cmieloblastos_relativo_unidade)
    {$this->cmieloblastos_relativo_unidade = $cmieloblastos_relativo_unidade;}

    public function getCmieloblastosAbsoluto()
    {return $this->cmieloblastos_absoluto;}
    public function setCmieloblastosAbsoluto($cmieloblastos_absoluto)
    {$this->cmieloblastos_absoluto = $cmieloblastos_absoluto;}

    public function getCmieloblastosAbsolutoUnidade()
    {return $this->cmieloblastos_absoluto_unidade;}
    public function setCmieloblastosAbsolutoUnidade($cmieloblastos_absoluto_unidade)
    {$this->cmieloblastos_absoluto_unidade = $cmieloblastos_absoluto_unidade;}

    public function getCoutrasCelulasRelativo()
    {return $this->coutras_celulas_relativo;}
    public function setCoutrasCelulasRelativo($coutras_celulas_relativo)
    {$this->coutras_celulas_relativo = $coutras_celulas_relativo;}

    public function getCoutrasCelulasRelativoUnidade()
    {return $this->coutras_celulas_relativo_unidade;}
    public function setCoutrasCelulasRelativoUnidade($coutras_celulas_relativo_unidade)
    {$this->coutras_celulas_relativo_unidade = $coutras_celulas_relativo_unidade;}

    public function getCoutrasCelulasAbsoluto()
    {return $this->coutras_celulas_absoluto;}
    public function setCoutrasCelulasAbsoluto($coutras_celulas_absoluto)
    {$this->coutras_celulas_absoluto = $coutras_celulas_absoluto;}

    public function getCoutrasCelulasAbsolutoUnidade()
    {return $this->coutras_celulas_absoluto_unidade;}
    public function setCoutrasCelulasAbsolutoUnidade($coutras_celulas_absoluto_unidade)
    {$this->coutras_celulas_absoluto_unidade = $coutras_celulas_absoluto_unidade;}

    public function getCcelulasLinfoidesRelativo()
    {return $this->ccelulas_linfoides_relativo;}
    public function setCcelulasLinfoidesRelativo($ccelulas_linfoides_relativo)
    {$this->ccelulas_linfoides_relativo = $ccelulas_linfoides_relativo;}

    public function getCcelulasLinfoidesRelativoUnidade()
    {return $this->ccelulas_linfoides_relativo_unidade;}
    public function setCcelulasLinfoidesRelativoUnidade($ccelulas_linfoides_relativo_unidade)
    {$this->ccelulas_linfoides_relativo_unidade = $ccelulas_linfoides_relativo_unidade;}

    public function getCcelulasLinfoidesAbsoluto()
    {return $this->ccelulas_linfoides_absoluto;}
    public function setCcelulasLinfoidesAbsoluto($ccelulas_linfoides_absoluto)
    {$this->ccelulas_linfoides_absoluto = $ccelulas_linfoides_absoluto;}

    public function getCcelulasLinfoidesAbsolutoUnidade()
    {return $this->ccelulas_linfoides_absoluto_unidade;}
    public function setCcelulasLinfoidesAbsolutoUnidade($ccelulas_linfoides_absoluto_unidade)
    {$this->ccelulas_linfoides_absoluto_unidade = $ccelulas_linfoides_absoluto_unidade;}

    public function getCcelulasMonocitoidesRelativo()
    {return $this->ccelulas_monocitoides_relativo;}
    public function setCcelulasMonocitoidesRelativo($ccelulas_monocitoides_relativo)
    {$this->ccelulas_monocitoides_relativo = $ccelulas_monocitoides_relativo;}

    public function getCcelulasMonocitoidesRelativoUnidade()
    {return $this->ccelulas_monocitoides_relativo_unidade;}
    public function setCcelulasMonocitoidesRelativoUnidade($ccelulas_monocitoides_relativo_unidade)
    {$this->ccelulas_monocitoides_relativo_unidade = $ccelulas_monocitoides_relativo_unidade;}

    public function getCcelulasMonocitoidesAbsoluto()
    {return $this->ccelulas_monocitoides_absoluto;}
    public function setCcelulasMonocitoidesAbsoluto($ccelulas_monocitoides_absoluto)
    {$this->ccelulas_monocitoides_absoluto = $ccelulas_monocitoides_absoluto;}

    public function getCcelulasMonocitoidesAbsolutoUnidade()
    {return $this->ccelulas_monocitoides_absoluto_unidade;}
    public function setCcelulasMonocitoidesAbsolutoUnidade($ccelulas_monocitoides_absoluto_unidade)
    {$this->ccelulas_monocitoides_absoluto_unidade = $ccelulas_monocitoides_absoluto_unidade;}

    public function getCplaquetas()
    {return $this->cplaquetas;}
    public function setCplaquetas($cplaquetas)
    {$this->cplaquetas = $cplaquetas;}

    public function getCplaquetasUnidade()
    {return $this->cplaquetas_unidade;}
    public function setCplaquetasUnidade($cplaquetas_unidade)
    {$this->cplaquetas_unidade = $cplaquetas_unidade;}

    public function getCvolumePlaquetarioMedio()
    {return $this->cvolume_plaquetario_medio;}
    public function setCvolumePlaquetarioMedio($cvolume_plaquetario_medio)
    {$this->cvolume_plaquetario_medio = $cvolume_plaquetario_medio;}

    public function getCvolumePlaquetarioMedioUnidade()
    {return $this->cvolume_plaquetario_medio_unidade;}
    public function setCvolumePlaquetarioMedioUnidade($cvolume_plaquetario_medio_unidade)
    {$this->cvolume_plaquetario_medio_unidade = $cvolume_plaquetario_medio_unidade;}
}