<?php

class BioquimicaRefController
{
    public function VisualizarHematoRef()
    {
        $bioquimicaRefDAO = new ExameBioquimicaRefDAO();
        $bioquimicaRef    = $bioquimicaRefDAO->buscarReferenciaBioquimica();
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
