<?php

declare(strict_types=1);

use app\controller\{HomeController, UserController, TestController};
use app\routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Server;

require __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();

$router = (new Router())
    ->registerController(new HomeController())
    ->registerController(new UserController())
    ->registerController(new TestController())
    ->resolveRoutes();

$server = new Server($loop, function (ServerRequestInterface $request) use ($router) {
    try {
        return $router->route($request);
    } catch (Throwable $e) {
        echo $e->getMessage() . PHP_EOL;
        echo $e->getTraceAsString() . PHP_EOL;
    }
});

$socket = new \React\Socket\Server('0.0.0.0:3000', $loop);
$server->listen($socket);

echo 'Listening on ' . str_replace('tcp:', 'http:', $socket->getAddress()) . PHP_EOL;

$loop->run();
