<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Cadastro Hematollógico</title>
</head>

<body>
    <div>
        <form>
            <h2 class=>Laboratório de Hemologia</h2>
            <label for="registroPaciente">N° de Registro</label>
            <input type="text" name="registroPaciente" id="registroPaciente" disabled>
            <label for="nomePaciente">Nome</label>
            <input type="text" id="nomePaciente" disabled>
            <label for="entradaPaciente">Entrada: </label>
            <input type="date" name="entradaPaciente" id="entradaPaciente" required>
            <label for="dataHora">Exame realizado em: </label>
            <input type="datetime-local" name="dataHora" id="dataHora" required>
            <label for="dataPrevista">Entrega dataPrevista: </label>
            <input type="date" name="dataPrevista" id="dataPrevista">
            <div>
                <h2>Hemograma</h2>
                <div>
                    <label for="hemacia" class="col-form-label">Hemacia</label>
                    <input type="text" name="hemacia" id="hemacia" disabled>
                    <span class="form-text">Valor de referência: 3,9 - 5,0 x106/µL</span>
                
                    <label for="hemoglobina" class="col-form-label">Hemoglobina</label>
                    <input type="text" name="hemoglobina" id="hemoglobina" disabled>
                    <span class="form-text">Valor de referência: 12,0- 15,5g/dL</span>

                    <label for="hematocrito" class="col-form-label">Hematócrito</label>
                    <input type="text" name="hematocrito" id="hematocrito" disabled>
                    <span class="form-text">Valor de referência: 35% - 45%</span>

                    <label for="vcm" class="col-form-label">VCM</label>
                    <input type="text" name="vcm" id="vcm" disabled>
                    <span class="form-text">Valor de referência: 82 - 98 fL</span>
                </div>
                <div>
                    <label for="hcm" class="col-form-label">HCM</label>
                    <input type="text" name="hcm" id="hcm" disabled>
                    <span class="form-text">Valor de referência: 26pg - 34pg</span>
                
                    <label for="chcm" class="col-form-label">CHCM</label>
                    <input type="text" name="chcm" id="chcm" disabled>
                    <span class="form-text">Valor de referência: 31g/dL - 36g/dL</span>

                    <label for="rdw" class="col-form-label">RDW</label>
                    <input type="text" name="rdw" id="rdw" disabled>
                    <span class="form-text">Valor de referência: 11,5% - 16,5%</span>
                </div>
            </div>
        </form>
    </div>
</body>

</html>