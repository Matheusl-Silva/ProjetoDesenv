<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/home-usuario.css">

    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Resultado do Exame</title>
</head>

<body>
    <!-- Elementos decorativos de fundo -->
    <div class="bg-decoration decoration-1"></div>
    <div class="bg-decoration decoration-2"></div>
    <div class="bg-decoration decoration-3"></div>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="logo-container-nav">
                        <img src="../../assets/img/LogoPositivo.png" alt="Logo Portal de Saúde Positivo" class="logo-nav">
                    </div>
                    <a class="navbar-brand">Portal de Saúde Positivo</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="d-flex align-items-center">
                        <span class="user-greeting me-3">Olá, <?php echo htmlspecialchars($nome_usuario); ?></span>
                        <form action="/logout" method="post">
                            <button type="submit" class="btn-logout">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-1">Resultado do Exame Bioquímica</h2>
                <p class="mb-0">Número do Exame: <?php echo htmlspecialchars($exame->getId()); ?></p>
            </div>

            <div class="card-body p-4">
                <!-- Dados Gerais -->
                <fieldset disabled id="fieldsetDadosGerais">
                    <legend class="h5 mb-3">Dados Gerais</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Paciente</label>
                            <?php if ($auth->isAdmin()): ?>
                                <input type="text" class="form-control dadosGerais" value="<?php echo htmlspecialchars($exame->getPaciente()); ?>" style="font-weight: bold;">
                            <?php else: ?>
                                <input type="text" class="form-control dadosGerais" value="***********">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Exame realizado em</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($exame->getData()))); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Responsável</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars($responsavel->getNome()); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preceptor</label>
                            <input type="text" class="form-control dadosGerais"
                                value="<?php echo htmlspecialchars($preceptor->getNome()); ?>">
                        </div>
                    </div>
                </fieldset>

                <!-- Função Hepática -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Função Hepática</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposHepatico = [
                            "getTgoTransaminaseGlutamicoOxalacetica" => ["label" => "TGO (AST)", "ref" => "<b>F:</b> {$referencia->getTgoTransaminaseGlutamicoOxalaceticaF()} • <b>M:</b> {$referencia->getTgoTransaminaseGlutamicoOxalaceticaM()}"],
                            "getTgpTransaminaseGlutamicoPiruvica"    => ["label" => "TGP (ALT)", "ref" => "<b>F:</b> {$referencia->getTgpTransaminaseGlutamicoPiruvicaF()} • <b>M:</b> {$referencia->getTgpTransaminaseGlutamicoPiruvicaM()}"],
                            "getGamaGtGlutamiltransferase"           => ["label" => "Gama GT", "ref" => "<b>F:</b> {$referencia->getGamaGtGlutamiltransferaseF()} • <b>M:</b> {$referencia->getGamaGtGlutamiltransferaseM()}"],
                            "getBilirrubinaTotal"                    => ["label" => "Bilirrubina Total", "ref" => "<b>{$referencia->getBilirrubinaTotal()}</b>"],
                            "getBilirrubinaDireta"                   => ["label" => "Bilirrubina Direta", "ref" => "<b>{$referencia->getBilirrubinaDireta()}</b>"],
                        ];
                        foreach ($camposHepatico as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info["label"]; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars(($exame->$metodo() == 0) || ($exame->$metodo() == null) ? '' : $exame->$metodo()); ?>">
                                <div class="form-text text-muted small"><?php echo $info["ref"]; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Função Renal -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Função Renal</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposRenal = [
                            "getUreia"      => ["label" => "Ureia", "ref" => "<b>- F: \n• < 50 anos:</b> {$referencia->getUreiaFMenosDe50Anos()}\n• <b>> 50 anos:</b> {$referencia->getUreiaFMaisDe50Anos()}
                                                                            <b>- M: \n•< 50 anos:</b> {$referencia->getUreiaMMenosDe50Anos()} \n• <b>> 50 anos:</b> {$referencia->getUreiaMMaisDe50Anos()}
                                                                            <b>- Infantil:</b> {$referencia->getUreiaCrianca()}"],
                            "getCreatinina" => ["label" => "Creatinina", "ref" => "<b>F:</b> {$referencia->getCreatininaF()} \n<b>M:</b> {$referencia->getCreatininaM()}
                                                                            <b>Infantil:</b> {$referencia->getCreatininaCrianca()}"],
                        ];
                        foreach ($camposRenal as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info["label"]; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars(($exame->$metodo() == 0) || ($exame->$metodo() == null) ? '' : $exame->$metodo()); ?>">
                                <div class="form-text text-muted small"><?php echo nl2br($info["ref"]); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Proteínas e Enzimas -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Proteínas e Enzimas</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposProteinas = [
                            "getProteinaTotal"     => ["label" => "Proteína Total", "ref" => "<b>{$referencia->getProteinaTotal()}</b>"],
                            "getAlbumina"          => ["label" => "Albumina", "ref" => "<b>{$referencia->getAlbumina()}</b>"],
                            "getAmilase"           => ["label" => "Amilase", "ref" => "<b>{$referencia->getAmilase()}</b>"],
                            "getLdh"               => ["label" => "LDH", "ref" => "<b>{$referencia->getLdh()}</b>"],
                            "getFosfataseAlcalina" => ["label" => "Fosfatase Alcalina", "ref" => "<b>F:</b> {$referencia->getFosfataseAlcalinaF()} • <b>M:</b> {$referencia->getFosfataseAlcalinaM()}"],
                            "getReatinaQuinaseCk"  => ["label" => "CK (Creatina Quinase)", "ref" => "<b>F:</b> {$referencia->getCreatinaQuinaseCkF()} • <b>M:</b> {$referencia->getCreatinaQuinaseCkM()}"],
                        ];
                        foreach ($camposProteinas as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info["label"]; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars(($exame->$metodo() == 0) || ($exame->$metodo() == null) ? '' : $exame->$metodo()); ?>">
                                <div class="form-text text-muted small"><?php echo $info["ref"]; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Perfil Lipídico -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Perfil Lipídico</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposLipidico = [
                            "getColesterolTotal" => ["label" => "Colesterol Total", "ref" => "<b>{$referencia->getColesterolTotal()}</b>"],
                            "getHdl"             => ["label" => "HDL", "ref" => "<b>Até 19 anos:</b> {$referencia->getHdlAte19Anos()} \n <b>> 20 anos:</b> {$referencia->getHdlMaisDe20Anos()}"],
                            "getLdl"             => ["label" => "LDL", "ref" => "<b>Baixo risco:</b> {$referencia->getLdlBaixoRisco()}
                                                    <b>Risco intermediário:</b> {$referencia->getLdlRiscoIntermediario()}
                                                    <b>Alto risco:</b> {$referencia->getLdlAltoRisco()}
                                                    <b>Muito alto risco:</b> {$referencia->getLdlMuitoAltoRisco()}"],
                            "getTriglicerideos"  => ["label" => "Triglicerídeos", "ref" => "<b>{$referencia->getTriglicerideos()}</b>"],
                        ];
                        foreach ($camposLipidico as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info["label"]; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars(($exame->$metodo() == 0) || ($exame->$metodo() == null) ? '' : $exame->$metodo()); ?>">
                                <div class="form-text text-muted small"><?php echo nl2br($info["ref"]); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Metabolismo e Minerais -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Metabolismo e Minerais</legend>
                    <div class="row g-3 mb-4">
                        <?php
                        $camposMetabolismo = [
                            "getGlicose"    => ["label" => "Glicose", "ref" => "<b>{$referencia->getGlicose()}</b>"],
                            "getFerro"      => ["label" => "Ferro", "ref" => "<b>- F:</b>\n • <b>Até 40 anos:</b> {$referencia->getFerroFAte40Anos()} \n• <b>> 40 anos:</b> {$referencia->getFerroFMaisDe40Anos()} \n• <b>> 60 anos:</b> {$referencia->getFerroFMaisDe60Anos()}
                                                <b>- M:</b>\n • <b>Até 40 anos:</b> {$referencia->getFerroMAte40Anos()}\n • <b>> 40 anos:</b> {$referencia->getFerroMMaisDe40Anos()}\n • <b>> 60 anos:</b> {$referencia->getFerroMMaisDe60Anos()}
                                                <b>- Infantil:</b> {$referencia->getFerroCrianca()}"],
                            "getCalcio"     => ["label" => "Cálcio", "ref" => "<b>{$referencia->getCalcio()}</b>"],
                            "getMagnesio"   => ["label" => "Magnésio", "ref" => "<b>F:</b> {$referencia->getMagnesioF()}\n <b>M:</b> {$referencia->getMagnesioM()}
                                                                            <b>Infantil:</b> {$referencia->getMagnesioCrianca()}"],
                            "getFosforo"    => ["label" => "Fósforo", "ref" => "• <b>Adulto:</b> {$referencia->getFosforoAdulto()}
                                                                                • <b>1-3 anos:</b> {$referencia->getFosforo1a3Anos()}
                                                                                • <b>4-12 anos:</b> {$referencia->getFosforo4a12Anos()}
                                                                                • <b>13-15 anos:</b> {$referencia->getFosforo13a15Anos()}
                                                                                • <b>16-18 anos:</b> {$referencia->getFosforo16a18Anos()}"],
                            "getAcidoUrico" => ["label" => "Ácido Úrico", "ref" => "<b>- F: </b>
                                                                                    • <b>1-9 anos:</b> {$referencia->getAcidoUricoF1a9Anos()} 
                                                                                    • <b>10-18 anos:</b> {$referencia->getAcidoUricoF10a18Anos()} 
                                                                                    • <b>> 18 anos:</b> {$referencia->getAcidoUricoFMaisDe18Anos()}
                                                                                    <b>- M:</b>
                                                                                    <b>• 13-18 anos:</b> {$referencia->getAcidoUricoM13a18Anos()} 
                                                                                    • <b>> 18 anos:</b> {$referencia->getAcidoUricoMMaisDe18Anos()}"],
                        ];
                        foreach ($camposMetabolismo as $metodo => $info): ?>
                            <div class="col-md-3">
                                <label class="form-label"><?php echo $info["label"]; ?></label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars(($exame->$metodo() == 0) || ($exame->$metodo() == null) ? '' : $exame->$metodo()); ?>">
                                <div class="form-text text-muted small"><?php echo nl2br($info["ref"]); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Marcadores Inflamatórios -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Marcadores Inflamatórios</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label">PCR (Proteína C Reativa)</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars(($exame->getPcrProteinaCReativa() == 0) || ($exame->getPcrProteinaCReativa() == null) ? '' : $exame->getPcrProteinaCReativa()); ?>">
                            <div class="form-text text-muted small"><?= "<b>{$referencia->getPcrProteinaCReativa()}</b>" ?></div>
                        </div>
                    </div>
                </fieldset>

                <!-- Observações -->
                <fieldset disabled>
                    <legend class="h5 mt-4 mb-3">Observações</legend>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <textarea class="form-control dadosGerais" rows="4" id="observacao"><?php echo htmlspecialchars($exame->getObservacao() ?? ""); ?></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="card-footer bg-light text-center py-3">
                <?php if ($auth->isAdmin()): ?>
                    <div id="botoesPadrao" class="mb-3">
                        <button onclick="imprimirLaudo(<?php echo $exame->getId(); ?>)" class="btn btn-primary me-2 col-2" id="botaoImpressao">
                            <i class="bi bi-printer"></i> Imprimir
                        </button>
                        <button class="btn btn-primary me-2 col-2" onclick="mudarParaEdicao()" id="botaoEditar">
                            <i class="bi bi-pencil-square"></i>Editar
                        </button>
                    </div>
                    <div id="botoesEdicao" style="display: none" class="mb-3">
                        <button type="button" class="btn btn-primary me-2 col-2" onclick="location.reload()"><i class="bi bi-x-lg"></i>Cancelar</button>
                        <form action="/exameBio/<?= $exame->getId() ?>" method="post" style="display: inline" id="formEdicao">
                            <input type="hidden" name="method" value="PUT">
                            <input type="hidden" name="dadosEdicao" value="" id="dadosEdicao">
                            <button type="submit" class="btn btn-primary me-2 col-2">
                                <i class="bi bi-check"></i>Confirmar
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
                <a href="/exames?paciente=<?= $exame->getPaciente() ?>" class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar para o Paciente
                </a>
                <a href="/home" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Voltar para Home
                </a>
            </div>
        </div>
    </main>

    <script>
        function habilitarCampos() {
            const fieldsets = Array.from(document.querySelectorAll("fieldset"));
            fieldsets.forEach((item) => {
                item.removeAttribute("disabled");
            });

            document.getElementById("fieldsetDadosGerais").setAttribute("disabled", "true");
        }

        function mudarParaEdicao() {
            const botoesPadrao = document.getElementById("botoesPadrao");
            const botoesEdicao = document.getElementById("botoesEdicao");

            botoesPadrao.style.display = "none";
            botoesEdicao.style.display = "block";

            habilitarCampos();
        }

        const formEdicao = document.getElementById("formEdicao");

        formEdicao.addEventListener("submit", function() {
            const nomesValores = [
                // Função Hepática
                "tgo",
                "tgp",
                "gamaGt",
                "bilirrubinaTotal",
                "bilirrubinaDireta",

                // Função Renal
                "ureia",
                "creatinina",

                // Proteínas e Enzimas
                "proteinaTotal",
                "albumina",
                "amilase",
                "ldh",
                "fosfataseAlcalina",
                "ckCreatinaQuinase",

                // Perfil Lipídico
                "colesterolTotal",
                "hdl",
                "ldl",
                "triglicerideos",

                // Metabolismo e Minerais
                "glicose",
                "ferro",
                "calcio",
                "magnesio",
                "fosforo",
                "acidoUrico",

                // Marcadores Inflamatórios
                "pcrProteinaCReativa"
            ];

            const inputs = Array.from(document.querySelectorAll("input"));

            const idPaciente = <?= json_encode($exame->getPaciente()) ?>;
            const dataExame = <?= json_encode($exame->getData()) ?>;
            const idResponsavel = <?= json_encode($exame->getResponsavel()) ?>;
            const idPreceptor = <?= json_encode($exame->getPreceptor()) ?>;

            let json = {};

            json.idPaciente = idPaciente;
            json.dataExame = dataExame;
            json.idResponsavel = idResponsavel;
            json.idPreceptor = idPreceptor;

            inputs.forEach((input, index) => {
                if (input.type == "text" && !input.className.includes("dadosGerais")) {
                    json[nomesValores[index - 4]] = input.value; //4 = Número de inputs não considerados
                }
            })

            json.observacao = document.getElementById('observacao').value;

            const inputDados = document.getElementById("dadosEdicao");
            inputDados.value = JSON.stringify(json);
        });

        function imprimirLaudo(idExame) {
            const iframe = document.createElement("iframe");
            iframe.style.display = "none";
            iframe.src = `/views/ImprimirExameBioquimica.php?id=${idExame}`;
            console.log(iframe.src);
            document.body.appendChild(iframe);

            iframe.onload = function() {
                try {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                    iframe.contentWindow.onafterprint = function() {
                        document.body.removeChild(iframe);
                    }
                } catch (error) {
                    alert("Não foi possível abrir a janela de impressão.");
                    document.body.removeChild(iframe);
                }
            };
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>