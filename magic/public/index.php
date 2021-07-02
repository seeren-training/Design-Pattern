<?php

use \App\Router\Exception\RouterException;
use App\Router\Router;

require __DIR__ . "/../vendor/autoload.php";

try {
    (new Router())->route();
} catch (RouterException $e) {
    die("Page not found");
}
