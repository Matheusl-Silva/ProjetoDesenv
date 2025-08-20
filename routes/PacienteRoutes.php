<?php
return function(Router $router){
    $router->get('/cadastroPaciente', function(){
        $pacienteController = new PacienteController();
        $pacienteController->gerarFormCadastro();
    });

    $router->get('/paciente', function(){
        $pacienteController = new PacienteController();
        $pacienteController->gerarLista();
    });
    
    $router->post('/paciente', function(){
        $pacienteController = new PacienteController();
        $paciente = new Paciente();

        $paciente->setNome($_POST["nome"]);
        $paciente->setPeriodo($_POST["periodo"]);
        $paciente->setDataNasc($_POST["datanasc"]);
        $paciente->setFone($_POST["fone"]);
        $paciente->setEmail($_POST["email"]);
        $paciente->setNomeMae($_POST["nomeMae"]);
        $paciente->setTomaMedicamento($_POST["tomaMedicamento"]);
        $paciente->setMedicamento($_POST["medicamento"]);
        $paciente->setTrataPatologia($_POST["trataPatologia"]);
        $paciente->setPatologia($_POST["patologia"]);

        $result = $pacienteController->cadastrar($paciente);

        if(gettype($result) === 'integer'){
            $_SESSION["idpaciente"] = $result;
        }else if ($result === "EMAIL_DUPLICADO"){
            $_SESSION["emailduplicado"] = true;
        }else{
            $_SESSION["errocadastro"] = true;
        }

        header('Location: /cadastroPaciente');
        exit;
    });
};