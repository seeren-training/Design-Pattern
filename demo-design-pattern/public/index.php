<?php

include './../vendor/autoload.php';

$routes = [
    '/cards' => [
        'controller' => \App\Controller\CardController::class,
        'action' => 'showAll'
    ]
];

$userPath = filter_input(INPUT_SERVER, 'PATH_INFO');
if (!$userPath) {
    $userPath = filter_input(INPUT_SERVER, 'REDIRECT_URL');
    if (!$userPath) {
        $userPath = '/';
    }
}

foreach ($routes as $path => $route) {
    if ($userPath === $path) {
        $controller = new $route['controller']();
        $controller->{$route['action']}();
    }
}
