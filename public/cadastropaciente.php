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
                    <input type="radio" id="matutino" class="form-check-input" name="periodo" value="matutino" checked>
                    <label for="matutino" class="form-check-label">Matutino</label>
                    <input type="radio" id="noturno" class="form-check-input" name="periodo" value="noturno">
                    <label for="noturno" class="form-check-label">Noturno</label>

                    <label for="nome" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" id="nome" name="nome">

                    <label for="datanasc" class="form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" id="datanasc" name="datanasc">

                    <label for="fone" class="form-label">Telefone para contato:</label>
                    <input type="tel" id="fone" class="form-control" name="fone">

                    <label for="email" class="form-label">E-mail para contato:</label>
                    <input type="email" id="email" class="form-control" name="email">
                    
                    <label for="nomemae" class="form-label">Nome da mãe:</label>
                    <input type="text" class="form-control" id="nomemae" name="nomemae">

                </form>
            </div>
        </div>
    </div>
</body>
</html>