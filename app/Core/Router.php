<?php

class Router
{
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        $this->routes[] = [
            'method' => 'GET',
            'path' => $path,
            'action' => $action,
        ];
    }

    public function post(string $path, array $action): void
    {
        $this->routes[] = [
            'method' => 'POST',
            'path' => $path,
            'action' => $action,
        ];
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                [$controllerClass, $controllerMethod] = $route['action'];
                $controller = new $controllerClass();
                $controller->$controllerMethod();
                return;
            }
        }

        //Aucune route trouvée -> 404
        http_response_code(404);
        echo '<h1>404 - Page introuvable </h1>';
    }
}
