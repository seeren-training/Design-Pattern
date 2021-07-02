<?php

namespace App\Router\Route;

class RouteBuilder
{

    public function build(
        Route $route,
        \SimpleXMLElement $element,
        $matches = []): Route
    {
        $route->setPath((string) $element["method"]);
        $route->setMethod((string) $element["path"]);
        $route->setAction((string) $element["action"]);
        $route->setController((string) $element["controller"]);
        $route->setParameters($matches);
        return $route;
    }

}
