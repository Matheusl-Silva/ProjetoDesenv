<?php

include_once "../bd/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mysqli_real_escape_string previnir sql injection no PHP
    $registro = mysqli_real_escape_string($mysqli, $_POST['registro']);
    $data     = mysqli_real_escape_string($mysqli, $_POST['data']);
    $periodo  = mysqli_real_escape_string($mysqli, $_POST['periodo']);
    $nome     = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $datanasc = mysqli_real_escape_string($mysqli, $_POST['datanasc']);
    $fone     = mysqli_real_escape_string($mysqli, $_POST['fone']);
    $email    = mysqli_real_escape_string($mysqli, $_POST['email']);
    $nomeMae  = mysqli_real_escape_string($mysqli, $_POST['nomeMae']);

    $tomaMedicamento = mysqli_real_escape_string($mysqli, $_POST['tomaMedicamento']);
    $medicamento     = "";
    if ($tomaMedicamento == "medSim") {
        $medicamento = mysqli_real_escape_string($mysqli, $_POST['medicamento']);
    }

    $trataPatologia = mysqli_real_escape_string($mysqli, $_POST['trataPatologia']);
    $patologia      = "";
    if ($trataPatologia == "patSim") {
        $patologia = mysqli_real_escape_string($mysqli, $_POST['patologia']);
    }

    $sql = "INSERT INTO pacientes (
                registro,
                data,
                periodo,
                nome,
                data_nascimento,
                telefone,
                email,
                nome_mae,
                toma_medicamento,
                medicamento,
                trata_patologia,
                patologia
            ) VALUES (
                '$registro',
                '$data',
                '$periodo',
                '$nome',
                '$datanasc',
                '$fone',
                '$email',
                '$nomeMae',
                '$tomaMedicamento',
                '$medicamento',
                '$trataPatologia',
                '$patologia'
            )";

    if ($mysqli->query($sql)) {

        echo "<script>alert('Paciente cadastrado com sucesso!'); window.location.href='home.php';</script>";
    } else {

        echo "<script>alert('Erro ao cadastrar paciente: " . $mysqli->error . "');</script>";
    }
}
