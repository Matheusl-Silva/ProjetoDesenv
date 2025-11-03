<?php

class BioquimicaRefController
{
    public function VisualizarBioquimicaRef()
    {
        $bioquimicaRefDAO = new ExameBioquimicaRefDAO();
        $bioquimicaRef    = $bioquimicaRefDAO->buscarReferenciaBioquimica();
        if(!$bioquimicaRef) $bioquimicaRef = new ReferenciaBioquimica();
        $auth             = new Autenticacao();
        $nomeUsuario      = $auth->getNomeUsuario();

        require 'views/editarBioquimicaRef.php';
        unset($_SESSION['status']);
    }

    public function editar(ReferenciaBioquimica $bioquiicaRef)
    {
        $bioquimicaRefDAO = new ExameBioquimicaRefDAO();

        return $bioquimicaRefDAO->atualizarReferencia($bioquiicaRef);
    }

}
