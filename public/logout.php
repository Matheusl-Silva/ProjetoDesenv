<?php
include_once "../database/conexaoClass.php";
// Inicia a sessão
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login
header("Location: ../views/Auth/login.php");
exit;
