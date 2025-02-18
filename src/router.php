<?php

namespace App;

class router
{
    private $routes = [];

    // Vérifier si l'URL correspond à une route
    private function match($path, $uri, &$params)
    {
        $pathRegex = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $path);
        $pathRegex = '#^' . $pathRegex . '$#';

        if (preg_match($pathRegex, $uri, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return true;
        }
        return false;
    }

    // Ajouter une route
    public function addRoute($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    // Traitement de l'URL actuelle
    public function dispatchURL($method, $uri)
    {
        $params = [];
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->match($route['path'], $uri, $params)) {
                return call_user_func_array($route['callback'], $params);
            }
        }
        http_response_code(404);
        echo '404 - Page not found';
    }
}
