<?php
return function (Router $router) {
    $router->get('/cadastroPaciente', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarFormCadastro();
    });

    $router->get('/paciente', function () {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarLista();
    });

    $router->get('/paciente/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarFormEdicao($id);
    });

    $router->get('/paciente/{id}/exames', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();
        $auth->verificarAcessoAdmin();

        $pacienteController = new PacienteController();
        $pacienteController->gerarListaExames($id);
    });

    $router->post('/paciente', function () {
        $pacienteController = new PacienteController();
        $paciente           = new Paciente();

        $paciente->setNome($_POST["nome"]);
        $paciente->setPeriodo($_POST["periodo"]);
        $paciente->setDataNasc($_POST["datanasc"]);
        $paciente->setFone($_POST["fone"]);
        $paciente->setEmail($_POST["email"]);
        $paciente->setCpf($_POST["cpf"]);
        $paciente->setTomaMedicamento($_POST["tomaMedicamento"]);
        $paciente->setMedicamento($_POST["medicamento"]);
        $paciente->setTrataPatologia($_POST["trataPatologia"]);
        $paciente->setPatologia($_POST["patologia"]);

        $result = $pacienteController->cadastrar($paciente);

        if (gettype($result) === 'integer') {
            $_SESSION["idpaciente"] = $result;
        } elseif ($result === "EMAIL_DUPLICADO") {
            $_SESSION["emailduplicado"] = true;
        } else {
            $_SESSION["errocadastro"] = true;
        }

        header('Location: /cadastroPaciente');
        exit;
    });

    $router->put('/paciente/{id}', function ($id) {
        $pacienteController = new PacienteController();

        $idEmailExistente = $pacienteController->verificarEmailExistente($_POST["email"]);
        if (!$idEmailExistente || $idEmailExistente == $id) {
            $paciente = new Paciente();

            $paciente->setNome($_POST["nome"]);
            $paciente->setPeriodo($_POST["periodo"]);
            $paciente->setDataNasc($_POST["data_nascimento"]);
            $paciente->setFone($_POST["telefone"]);
            $paciente->setEmail($_POST["email"]);
            $paciente->setCpf($_POST["cpf"]);
            $paciente->setMedicamento($_POST["medicamento"]);
            $paciente->setPatologia($_POST["patologia"]);
            $paciente->setId($id);

            $pacienteController->atualizar($paciente);

            header('Location: /paciente');
            exit;
        } else {
            $_SESSION["flash"] = [
                "mensagem" => "Este e-mail já está cadastrado!",
                "tipo"     => "warning",
            ];

            header('Location: /paciente/' . $id);
            exit;
        }
    });

    $router->delete('/paciente/{id}', function ($id) {
        $paciente = new Paciente();
        $paciente->setId($id);
        $pacienteController = new PacienteController();
        $pacienteController->excluir($paciente);

        header('Location: /paciente');
        exit;
    });
};
