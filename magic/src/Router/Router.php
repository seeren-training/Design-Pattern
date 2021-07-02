<?php

namespace App\Router;

use App\Router\Exception\RouterException;
use App\Router\Route\RouteFactory;

class Router
{

    private RouteFactory $factory;

    public function __construct()
    {
        $this->factory = new RouteFactory();
    }

    /**
     * @throws RouterException for no route found
     */
    public function route(): void
    {
        $method = filter_input(INPUT_SERVER, "REQUEST_METHOD") ?? "GET";
        $path = filter_input(INPUT_SERVER, "PATH_INFO") ?? "/";
        $route = $this->factory->create($path, $method);
        if (!$route) {
            throw new RouterException("No route found for path '$path' in method '$method'");
        }
        $actionName = $route->getAction();
        $controllerName = $route->getController();
        $controller = new $controllerName();
        $controller->$actionName(...$route->getParameters());
    }

}
