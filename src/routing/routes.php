<?php

use app\controller\HomeController;
use app\controller\UserController;
use app\routing\Route;
use app\routing\Router;

/** @var $router */

$router->register(
    new Route(
        "/",
        [Router::GET],
        HomeController::class,
        "index",
    ),
);

$router->register(
    new Route(
        "/users",
        [Router::GET],
        UserController::class,
        "index",
    ),
);

$router->register(
    new Route(
        "/users",
        [Router::POST],
        UserController::class,
        "save"
    )
);