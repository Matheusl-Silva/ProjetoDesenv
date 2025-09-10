<?php

return function (Router $router) {
    $router->get('/exames', function(){
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarListaExames($id);

    });

    $router->post('/exameHemato', function () {
        $exameHematoController = new ExameHematoController();
        $dadosExame            = new ExameHemato();
        // Define as propriedades do objeto $dadosExame com os dados enviados via POST
        $dadosExame->setHemacia($_POST["hemacia"]);
        $dadosExame->setHemoglobina($_POST["hemoglobina"]);
        $dadosExame->setHematocrito($_POST["hematocrito"]);
        $dadosExame->setVcm($_POST["vcm"]);
        $dadosExame->setHcm($_POST["hcm"]);
        $dadosExame->setChcm($_POST["chcm"]);
        $dadosExame->setRdw($_POST["rdw"]);
        $dadosExame->setLeucocitos($_POST["leucocitos"]);
        $dadosExame->setNeutrofilos($_POST["neutrofilos"]);
        $dadosExame->setBlastos($_POST["blastos"]);
        $dadosExame->setPromielocitos($_POST["promielocitos"]);
        $dadosExame->setMielocitos($_POST["mielocitos"]);
        $dadosExame->setMetamielocitos($_POST["metamielocitos"]);
        $dadosExame->setBastonetes($_POST["bastonetes"]);
        $dadosExame->setSegmentados($_POST["segmentados"]);
        $dadosExame->setEosinofilos($_POST["eosinofilos"]);
        $dadosExame->setBasofilos($_POST["basofilos"]);
        $dadosExame->setLinfocitos($_POST["linfocitos"]);
        $dadosExame->setLinfocitosAtipicos($_POST["linfocitosAtipicos"]);
        $dadosExame->setMonocitos($_POST["monocitos"]);
        $dadosExame->setMieloblastos($_POST["mieloblastos"]);
        $dadosExame->setOutrasCelulas($_POST["outrasCelulas"]);
        $dadosExame->setCelulasLinfoides($_POST["celulasLinfoides"]);
        $dadosExame->setCelulasMonocitoides($_POST["celulasMonocitoides"]);
        $dadosExame->setPlaquetas($_POST["plaquetas"]);
        $dadosExame->setVolumePlaquetarioMedio($_POST["volumePlaquetarioMedio"]);
        $dadosExame->setData($_POST["dataExame"]);
        $dadosExame->setIdResponsavel($_POST["idResponsavel"]);
        $dadosExame->setPreceptor($_POST["preceptor"]);
        $dadosExame->setPaciente($_POST["paciente"]);

        // Chama o método para cadastrar os dados
        $result = $exameHematoController->cadastrar($dadosExame);

        // Gerencia a sessão com base no resultado do cadastro
        if (gettype($result) === 'integer') {
            $_SESSION["idPHemato"] = $result;
        } else {
            $_SESSION["errocadastro"] = true;
        }
        header('Location: /cadastroExameHemato');
        exit;
    });
};
