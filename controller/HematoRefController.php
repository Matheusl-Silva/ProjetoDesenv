<?php

class HematoRefController
{
    public function VisualizarHematoRef()
    {
        $hematoRefDAO = new ExameHematoRefDAO();
        $hematoRef    = $hematoRefDAO->buscarReferenciaHematologica();
        $auth         = new Autenticacao();
        $nomeUsuario  = $auth->getNomeUsuario();

        require 'views/editarHematologiaRef.php';
    }

    public function editar(ReferenciaHematologia $hematoRef)
    {
        $hematoRefDAO = new ExameHematoRefDAO();

        return $hematoRefDAO->atualizarReferencia($hematoRef);
    }

}
