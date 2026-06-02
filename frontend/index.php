<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

// Extrai segmentos para rotas dinâmicas
$segments = explode('/', trim($uri, '/'));
$base = '/' . ($segments[0] ?? '');
$id = $segments[1] ?? null;
$action = $segments[2] ?? null;

$routes = [
    '/'                   => '/views/home.html',
    '/home'               => '/views/home.html',
    '/login'              => '/views/login.php',
    '/logout'             => '/views/login.php',
    '/recover'            => '/views/Auth/recover.php',
    '/cadastrarUsuario'   => '/views/cadastro.php',
    '/cadastroPaciente'   => '/views/cadastropaciente.php',
    '/paciente'           => '/views/listapacientes.php',
    '/usuario'            => '/views/listarusuarios.php',
    '/exames'             => '/views/listarExames.php',
    '/hematoRef'          => '/views/editarHematologiaRef.php',
    '/bioquimicaRef'      => '/views/editarBioquimicaRef.php',
];

// Rotas dinâmicas
if ($base === '/paciente' && $id) {
    require '/var/www/html/views/editarPaciente.php';
    exit;
}
if ($base === '/usuario' && $id) {
    require '/var/www/html/views/editarusuario.php';
    exit;
}
if ($base === '/exameHemato' && $id === 'listar' && $action) {
    require '/var/www/html/views/visualizarExameHemato.php';
    exit;
}
if ($base === '/exameBio' && $id === 'listar' && $action) {
    require '/var/www/html/views/visualizarBioquimica.php';
    exit;
}
if ($base === '/anamneseEnf' && $id === 'listar' && $action) {
    require '/var/www/html/views/visualizarAnamneseEnf.php';
    exit;
}
if ($base === '/cadastrarHematologia' && $id) {
    require '/var/www/html/views/cadastrarHematologia.php';
    exit;
}
if ($base === '/cadastrarAnamneseEnf' && $id) {
    require '/var/www/html/views/cadastrarAnamneseEnf.php';
    exit;
}
if ($base === '/exames' && $id === 'novo' && $action) {
    require '/var/www/html/views/selecionarExame.php';
    exit;
}
if ($base === '/exameHemato') {
    require '/var/www/html/views/cadastrarHematologia.php';
    exit;
}
if ($base === '/exameBio') {
    require '/var/www/html/views/cadastrarBioquimica.php';
    exit;
}
if ($base === '/anamneseEnf') {
    require '/var/www/html/views/cadastrarAnamneseEnf.php';
    exit;
}

// Rotas estáticas
if (isset($routes[$uri])) {
    $file = '/var/www/html' . $routes[$uri];
    if (file_exists($file)) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            require $file;
        } else {
            readfile($file);
        }
        exit;
    }
}

// 404
http_response_code(404);
echo "<h1>404 - Página não encontrada</h1>";
