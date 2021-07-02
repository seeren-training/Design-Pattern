<?php

namespace App\Router\Route;

class RouteFactory
{

    private RouteBuilder $builder;

    private ?\SimpleXMLElement $routes;

    public function __construct()
    {
        $this->routes = simplexml_load_file(__DIR__ . "/../../../config/routes.xml");
        $this->builder = new RouteBuilder();
    }

    public function create(string $path, string $method): ?Route
    {
        foreach ($this->routes as $route) {
            if ($method === (string) $route["method"]
            && preg_match("#^" . (string) $route["path"] . "$#", $path, $matches)) {
                array_shift($matches);
                return $this->builder->build(new Route(), $route, $matches);
            }
        }
        return null;
    }

}
