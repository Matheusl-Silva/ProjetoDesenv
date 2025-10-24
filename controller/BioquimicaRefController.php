<?php

class BioquimicaRefController
{
    public function VisualizarHematoRef()
    {
        $bioquimicaRefDAO = new ExameBioquimicaRefDAO();
        $bioquimicaRef    = $bioquimicaRefDAO->buscarReferenciaBioquimica();

        require 'views/editarBioquimicaRef.php';
    }

    public function editar(ReferenciaBioquimica $bioquiicaRef)
    {
        $bioquimicaRefDAO = new ExameBioquimicaRefDAO();

        return $bioquimicaRefDAO->atualizarReferencia($bioquiicaRef);
    }

}
