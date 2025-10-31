<?php

class HematoRefController
{
    public function VisualizarHematoRef()
    {
        $hematoRefDAO = new ExameHematoRefDAO();
        $hematoRef    = $hematoRefDAO->buscarReferenciaHematologica();
        if(!$hematoRef) $hematoRef = new ReferenciaHematologia();
        $auth         = new Autenticacao();
        $nomeUsuario  = $auth->getNomeUsuario();

        require 'views/editarHematologiaRef.php';
        unset($_SESSION['status']);
    }

    public function editar(ReferenciaHematologia $hematoRef)
    {
        $hematoRefDAO = new ExameHematoRefDAO();

        return $hematoRefDAO->atualizarReferencia($hematoRef);
    }

}
