<?php
//Reporta erros
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// URL base da API Node.js — lê do ambiente ou usa padrão local
define('API_BASE_URL', getenv('API_BASE_URL') ?: ($_ENV['API_BASE_URL'] ?? ($_SERVER['API_BASE_URL'] ?? 'http://localhost:3000')));

//Inicia sessão
session_start();

//Autoload do vendor
require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $pastas = ['controller', 'dao', 'models', 'database', 'helpers'];

    foreach ($pastas as $pasta) {
        $caminho = __DIR__ . "/$pasta" . "/$class.php";
        if (file_exists($caminho)) {
            require_once $caminho;
            return;
        }
    }
});

//Recebe a rota da URI
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

//Recebe o método
$method;
if (isset($_POST["method"])) {
    $method = $_POST["method"];
} else {
    $method = $_SERVER["REQUEST_METHOD"];
}

require_once 'router.php';
$router = new Router();

//Recebe todas as rotas dos routers
foreach (glob(__DIR__ . '/routes/*.php') as $arquivo) {
    $registrarRota = require $arquivo;
    $registrarRota($router);
}

$router->get('/', function () {
    if (isset($_SESSION["id"])) {
        header('Location: /home');
        exit;
    }
    require 'views/home.html';
});

//Executa determinada função dependendo da rota
$router->dispatch($path, $method);
