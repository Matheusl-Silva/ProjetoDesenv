<?php

//conexao com o banco de dados teste
$usuarios = 'root';
$senha    = '';
$host     = 'localhost';
$database = 'login';

$mysqli = new mysqli($host, $usuarios, $senha, $database);

$mysqli->error ? die('Erro na conexão') : null;
