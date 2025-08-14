<?php

//Autoload
spl_autoload_register(function ($class) {
    $pastas = ['controller', 'dao', 'models', 'database'];

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
foreach(glob(__DIR__ . '/routes/*.php') as $arquivo){
    $registrarRota = require $arquivo;
    $registrarRota($router);
}

$router->get('/', function(){
    require 'views/home.html';
});

//Executa determinada função dependendo da rota
$router->dispatch($path, $method);