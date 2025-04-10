<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastropaciente.css">
    <title>Cadastro de exame</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="#">
                    <label for="registro" class="form-label">Registro:</label>
                    <input type="text" id="registro" name="registro" class="form-control">

                    <label for="data" class="form-label">Data:</label>
                    <input type="date" class="form-control" id="data">

                    <p class="form-label">Período:</p>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" checked>
                        <label for="matutino" class="form-check-label">Matutino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno">
                        <label for="noturno" class="form-check-label">Noturno</label>
                    </div>

                    <label for="nome" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" id="nome" name="nome">

                    <label for="datanasc" class="form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" id="datanasc" name="datanasc">

                    <label for="fone" class="form-label">Telefone para contato:</label>
                    <input type="tel" id="fone" class="form-control" name="fone">

                    <label for="email" class="form-label">E-mail para contato:</label>
                    <input type="email" id="email" class="form-control" name="email">

                    <label for="nomeMae" class="form-label">Nome da mãe:</label>
                    <input type="text" class="form-control" id="nomeMae" name="nomeMae">

                    <p class="form-label">Toma algum medicamento contínuo? Se sim, qual?</p>
                    <div class="form-check">
                        <input type="radio" id="medNao" class="form-check-input" name="tomaMedicamento" value="medNao">
                        <label for="medNao" class="form-check-label">Não</label>
                    </div>
                    <div class="form-check container">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" id="medSim" class="form-check-input" name="tomaMedicamento" value="medSim">
                                <label for="medSim" class="form-check-label">Sim:</label>
                            </div>
                            <div class="col-md" style="padding:0">
                                <input type="text" class="form-control" id="medicamento" name="medicamento">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>