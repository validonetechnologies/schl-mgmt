<?php
/**
 * Router.php - Simple front controller router
 */
class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch($url) {
        // Simple routing for landing pages
        if ($url == '/' || $url == '/index.php') {
            return $this->routes['/'] ?? null;
        }

        foreach ($this->routes as $route => $callback) {
            if ($route === $url) {
                return $callback;
            }
        }
        return $this->routes['404'] ?? null;
    }
}
