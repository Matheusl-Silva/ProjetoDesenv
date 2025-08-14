<?php
class Router
{
    private $get = [];
    private $post = [];
    private $put = [];
    private $delete = [];

    public function get(string $path, Closure $handler)
    {
        $this->get[$path] = $handler;
    }

    public function post(string $path, Closure $handler)
    {
        $this->post[$path] = $handler;
    }

    public function put(string $path, Closure $handler)
    {
        $this->put[$path] = $handler;
    }

    public function delete(string $path, Closure $handler)
    {
        $this->delete[$path] = $handler;
    }

    public function dispatch(string $path, string $method)
    {
        $routes = [];
        switch ($method) {
            case "GET":
                $routes = $this->get;
                break;
            case "POST":
                $routes = $this->post;
                break;
            case "PUT":
                $routes = $this->put;
                break;
            case "DELETE":
                $routes = $this->delete;
                break;
            default:
                echo "Requisição não suportada!";
                return;
        }
        foreach ($routes as $route => $handler) {
            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route);
            if (preg_match("#^$pattern$#", $path, $matches)) {
                if (count($matches) > 1) {
                    $handler($matches[1]); //Melhorar depois
                } else {
                    $handler();
                }
                return;
            }
        }
        echo "Página não encontrada!";
    }
}
