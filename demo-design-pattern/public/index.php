<?php

include './../vendor/autoload.php';

$routes = [
    '/' => [
        'controller' => \App\Controller\CardController::class,
        'action' => 'showAll'
    ],
    '/(.+)' => [
        'controller' => \App\Controller\CardController::class,
        'action' => 'show'
    ]
];

$userPath = filter_input(INPUT_SERVER, 'PATH_INFO');
if (!$userPath) {
    $userPath = filter_input(INPUT_SERVER, 'REDIRECT_URL') ?? '/';
}

foreach ($routes as $path => $route) {
    if (preg_match('#^' . $path . '$#', $userPath, $matches)) {
        array_shift($matches);
        $controller = new $route['controller']();
        $controller->{$route['action']}(... $matches);
    }
}
