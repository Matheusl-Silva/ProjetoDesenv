<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/cadastropaciente.css">
    <link rel="icon" href="./../assets/img/favicon.png" type="image/x-icon">
    <title>Cadastro de exame</title>
</head>

<body class="bg-info-subtle">
    <!-- Modal de Sucesso -->
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSucessoLabel">Sucesso!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="mensagemSucesso">Paciente cadastrado com sucesso! Número do Paciente Cadastrado: <?=$idPaciente?></p>
                </div>
                <div class="modal-footer">
                    <a href="homeUsuario.php" class="btn btn-primary">Ir para Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Erro -->
    <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalErroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalErroLabel">Erro!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Erro ao cadastrar paciente.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEmailDuplicado" tabindex="-1" aria-labelledby="modalEmailDuplicadoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEmailDuplicadoLabel">Email Já Cadastrado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>O email informado já está cadastrado no sistema. Por favor, utilize um email diferente.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 card shadow p-3 my-5 bg-body-tertiary rounded">
                <div class="card-header bg-body-tertiary text-center">
                    <h2>Cadastro de Paciente</h2>
                    <div class="logo-text text-primary">Insira as informações de cadastro do paciente</div>
                </div>
                <form action="/paciente" method="post">

                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <p class="form-label">Período:</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" checked>
                            <label for="matutino" class="form-check-label">Matutino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno">
                            <label for="noturno" class="form-check-label">Noturno</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datanasc" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="datanasc" name="datanasc" required>
                    </div>

                    <div class="form-group">
                        <label for="fone" class="form-label">Telefone para contato:</label>
                        <input type="tel" id="fone" class="form-control" name="fone" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">E-mail para contato:</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>

                    <div>
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>

                    <p class="form-label">Toma algum medicamento contínuo? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="medNao" class="form-check-input" name="tomaMedicamento" value="N" checked>
                        <label for="medNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="medSim" class="form-check-input" name="tomaMedicamento" value="S">
                                <label for="medSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="medicamento" name="medicamento" placeholder="Insira o medicamento">
                            </div>
                        </div>
                    </div>

                    <p class="form-label">Trata alguma patologia? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="patNao" class="form-check-input" name="trataPatologia" value="N" checked>
                        <label for="patNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <input type="radio" id="patSim" class="form-check-input" name="trataPatologia" value="S">
                                <label for="patSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="patologia" name="patologia" placeholder="Insira a patologia">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-12 mt-3 mb-2">Cadastrar</button>
                        <a href="/home" class="btn btn-outline-secondary col-12">Voltar para a tela de usuário</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    function configurarCaixaDeTexto(idSim, idNao, idCaixa){
        let sim = document.getElementById(idSim);
        let nao = document.getElementById(idNao);
        let caixa = document.getElementById(idCaixa);

        caixa.disabled = true;

        let alterarEstado = () =>{
            caixa.disabled = !sim.checked;
        }

        sim.addEventListener('change', alterarEstado);
        nao.addEventListener('change', alterarEstado);
    }

    configurarCaixaDeTexto("medSim", "medNao", "medicamento");
    configurarCaixaDeTexto("patSim", "patNao", "patologia");

    const idPaciente = <?=json_encode($idPaciente ?? null)?>;
    const emailDuplicado = <?=json_encode($emailDuplicado ?? false)?>;
    const erroCadastro = <?=json_encode($erroCadastro ?? false)?>;

    if(emailDuplicado){
        const modalEmailDuplicado = new bootstrap.Modal(document.getElementById('modalEmailDuplicado'));
        modalEmailDuplicado.show();
    }
    else if(idPaciente){
        const modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));
        modalSucesso.show();
    }
    else if(erroCadastro){
        const modalErro = new bootstrap.Modal(document.getElementById('modalErro'));
        modalErro.show();
    }


</script>

</html>
