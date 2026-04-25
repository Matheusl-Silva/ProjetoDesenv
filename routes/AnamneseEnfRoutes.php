<?php
return function (Router $router) {
    $router->get('/anamneseEnf/listar/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $anamneseEnfController = new AnamneseEnfController();
        $anamneseEnfController->VisualizarExame($id);
    });

    $router->delete('/anamneseEnf/{id}', function ($id) {
        $anamneseEnfController = new AnamneseEnfController();
        $idPaciente            = $anamneseEnfController->getPaciente($id);
        $anamneseEnfController->excluir($id);

        header('Location: /exames?paciente=' . $idPaciente);
        exit;
    });

    $router->get('/cadastrarAnamneseEnf/{id}', function ($id) {
        $auth = new Autenticacao();
        $auth->verificarLogin();

        $anamneseEnfController = new AnamneseEnfController();
        $anamneseEnfController->gerarFormCadastro($id);
    });

    $router->post('/anamneseEnf', function () {
        $anamneseEnfController = new AnamneseEnfController();
        $anamnese              = new AnamneseEnf();

        // O POST deve trazer todos os dados correspondentes
        $anamnese->setQueixa(isset($_POST["queixa"]) ? $_POST["queixa"] : null);
        $anamnese->setInicioSintomas(isset($_POST["inicioSintomas"]) ? $_POST["inicioSintomas"] : null);
        $anamnese->setFrequencia(isset($_POST["frequencia"]) ? $_POST["frequencia"] : null);
        $anamnese->setLocalizacaoDaDor(isset($_POST["localizacaoDaDor"]) ? $_POST["localizacaoDaDor"] : null);
        $anamnese->setCardiopatia(isset($_POST["cardiopatia"]) ? $_POST["cardiopatia"] : 0);
        $anamnese->setHipertensao(isset($_POST["hipertensao"]) ? $_POST["hipertensao"] : 0);
        $anamnese->setDiabetes(isset($_POST["diabetes"]) ? $_POST["diabetes"] : 0);
        $anamnese->setCancer(isset($_POST["cancer"]) ? $_POST["cancer"] : 0);
        $anamnese->setCirurgias(isset($_POST["cirurgias"]) ? $_POST["cirurgias"] : 0);
        $anamnese->setOutrasDoencas(isset($_POST["outrasDoencas"]) ? $_POST["outrasDoencas"] : null);
        $anamnese->setAlergias(isset($_POST["alergias"]) ? $_POST["alergias"] : null);
        $anamnese->setMedicamento(isset($_POST["medicamento"]) ? $_POST["medicamento"] : null);
        $anamnese->setRefeicoesAoDia(isset($_POST["refeicoesAoDia"]) ? $_POST["refeicoesAoDia"] : null);
        $anamnese->setEliminacaoUrinaria(isset($_POST["eliminacaoUrinaria"]) ? $_POST["eliminacaoUrinaria"] : null);
        $anamnese->setEliminacaoIntestinal(isset($_POST["eliminacaoIntestinal"]) ? $_POST["eliminacaoIntestinal"] : null);
        $anamnese->setCicloMenstrual(isset($_POST["cicloMenstrual"]) ? $_POST["cicloMenstrual"] : null);
        $anamnese->setSonoERepouso(isset($_POST["sonoERepouso"]) ? $_POST["sonoERepouso"] : null);
        $anamnese->setHorasDeSono(isset($_POST["horasDeSono"]) ? $_POST["horasDeSono"] : null);
        $anamnese->setFrequenciaFumo(isset($_POST["frequenciaFumo"]) ? $_POST["frequenciaFumo"] : null);
        $anamnese->setFrequenciaDrogas(isset($_POST["frequenciaDrogas"]) ? $_POST["frequenciaDrogas"] : null);
        $anamnese->setFrequenciaAlcool(isset($_POST["frequenciaAlcool"]) ? $_POST["frequenciaAlcool"] : null);
        $anamnese->setFrequenciaExercicios(isset($_POST["frequenciaExercicios"]) ? $_POST["frequenciaExercicios"] : null);
        $anamnese->setLazer(isset($_POST["lazer"]) ? $_POST["lazer"] : null);
        $anamnese->setSaneamentoBasico(isset($_POST["saneamentoBasico"]) ? $_POST["saneamentoBasico"] : 0);
        $anamnese->setAnimaisDomesticos(isset($_POST["animaisDomesticos"]) ? $_POST["animaisDomesticos"] : null);
        $anamnese->setPostoDeSaude(isset($_POST["postoDeSaude"]) ? $_POST["postoDeSaude"] : 0);
        $anamnese->setDoencaFamiliar(isset($_POST["doencaFamiliar"]) ? $_POST["doencaFamiliar"] : null);
        $anamnese->setTratamentoDoencaFamiliar(isset($_POST["tratamentoDoencaFamiliar"]) ? $_POST["tratamentoDoencaFamiliar"] : null);
        
        $anamnese->setIdPaciente(isset($_POST["id_paciente"]) ? $_POST["id_paciente"] : null);
        $anamnese->setData(isset($_POST["data"]) ? $_POST["data"] : null);

        $result = $anamneseEnfController->cadastrarAnamnese($anamnese);

        header('Location: /cadastrarAnamneseEnf/' . $anamnese->getIdPaciente() . '?sucesso=1&exame_id=' . $result);
        exit;
    });

    $router->put('/anamneseEnf/{id}', function ($id) {
        $anamneseEnfController = new AnamneseEnfController();
        $anamnese              = new AnamneseEnf();

        $dadosAnamnese = json_decode($_POST["dadosEdicao"], true);

        $anamnese->setId($id);
        
        $anamnese->setQueixa(isset($dadosAnamnese["queixa"]) ? $dadosAnamnese["queixa"] : null);
        $anamnese->setInicioSintomas(isset($dadosAnamnese["inicioSintomas"]) ? $dadosAnamnese["inicioSintomas"] : null);
        $anamnese->setFrequencia(isset($dadosAnamnese["frequencia"]) ? $dadosAnamnese["frequencia"] : null);
        $anamnese->setLocalizacaoDaDor(isset($dadosAnamnese["localizacaoDaDor"]) ? $dadosAnamnese["localizacaoDaDor"] : null);
        $anamnese->setCardiopatia(isset($dadosAnamnese["cardiopatia"]) ? $dadosAnamnese["cardiopatia"] : 0);
        $anamnese->setHipertensao(isset($dadosAnamnese["hipertensao"]) ? $dadosAnamnese["hipertensao"] : 0);
        $anamnese->setDiabetes(isset($dadosAnamnese["diabetes"]) ? $dadosAnamnese["diabetes"] : 0);
        $anamnese->setCancer(isset($dadosAnamnese["cancer"]) ? $dadosAnamnese["cancer"] : 0);
        $anamnese->setCirurgias(isset($dadosAnamnese["cirurgias"]) ? $dadosAnamnese["cirurgias"] : 0);
        $anamnese->setOutrasDoencas(isset($dadosAnamnese["outrasDoencas"]) ? $dadosAnamnese["outrasDoencas"] : null);
        $anamnese->setAlergias(isset($dadosAnamnese["alergias"]) ? $dadosAnamnese["alergias"] : null);
        $anamnese->setMedicamento(isset($dadosAnamnese["medicamento"]) ? $dadosAnamnese["medicamento"] : null);
        $anamnese->setRefeicoesAoDia(isset($dadosAnamnese["refeicoesAoDia"]) ? $dadosAnamnese["refeicoesAoDia"] : null);
        $anamnese->setEliminacaoUrinaria(isset($dadosAnamnese["eliminacaoUrinaria"]) ? $dadosAnamnese["eliminacaoUrinaria"] : null);
        $anamnese->setEliminacaoIntestinal(isset($dadosAnamnese["eliminacaoIntestinal"]) ? $dadosAnamnese["eliminacaoIntestinal"] : null);
        $anamnese->setCicloMenstrual(isset($dadosAnamnese["cicloMenstrual"]) ? $dadosAnamnese["cicloMenstrual"] : null);
        $anamnese->setSonoERepouso(isset($dadosAnamnese["sonoERepouso"]) ? $dadosAnamnese["sonoERepouso"] : null);
        $anamnese->setHorasDeSono(isset($dadosAnamnese["horasDeSono"]) ? $dadosAnamnese["horasDeSono"] : null);
        $anamnese->setFrequenciaFumo(isset($dadosAnamnese["frequenciaFumo"]) ? $dadosAnamnese["frequenciaFumo"] : null);
        $anamnese->setFrequenciaDrogas(isset($dadosAnamnese["frequenciaDrogas"]) ? $dadosAnamnese["frequenciaDrogas"] : null);
        $anamnese->setFrequenciaAlcool(isset($dadosAnamnese["frequenciaAlcool"]) ? $dadosAnamnese["frequenciaAlcool"] : null);
        $anamnese->setFrequenciaExercicios(isset($dadosAnamnese["frequenciaExercicios"]) ? $dadosAnamnese["frequenciaExercicios"] : null);
        $anamnese->setLazer(isset($dadosAnamnese["lazer"]) ? $dadosAnamnese["lazer"] : null);
        $anamnese->setSaneamentoBasico(isset($dadosAnamnese["saneamentoBasico"]) ? $dadosAnamnese["saneamentoBasico"] : 0);
        $anamnese->setAnimaisDomesticos(isset($dadosAnamnese["animaisDomesticos"]) ? $dadosAnamnese["animaisDomesticos"] : null);
        $anamnese->setPostoDeSaude(isset($dadosAnamnese["postoDeSaude"]) ? $dadosAnamnese["postoDeSaude"] : 0);
        $anamnese->setDoencaFamiliar(isset($dadosAnamnese["doencaFamiliar"]) ? $dadosAnamnese["doencaFamiliar"] : null);
        $anamnese->setTratamentoDoencaFamiliar(isset($dadosAnamnese["tratamentoDoencaFamiliar"]) ? $dadosAnamnese["tratamentoDoencaFamiliar"] : null);
        
        $anamnese->setIdPaciente(isset($dadosAnamnese["idPaciente"]) ? $dadosAnamnese["idPaciente"] : null);
        $anamnese->setData(isset($dadosAnamnese["data"]) ? $dadosAnamnese["data"] : null);

        $anamneseEnfController->editarAnamnese($anamnese);

        header('Location: /anamneseEnf/listar/' . $id);
        exit;
    });
};

