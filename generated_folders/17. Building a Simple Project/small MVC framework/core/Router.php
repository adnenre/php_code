<?php

namespace App\Core;

class Router {
    private $routes = [];

    public function addRoute(string $method, string $route, $controller) {
        $this->routes[] = ['method' => $method, 'route' => $route, 'controller' => $controller];
    }

    public function dispatch(Request $request) {
        $uri = $request->get('uri');
        $method = $request->getMethod();



        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['route'] === $uri) {
                call_user_func($route['controller']);
                return;
            }
        }

        echo "Route not found!";
    }
}
