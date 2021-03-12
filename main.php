
<?php

use app\routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Server;

require __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();

$router = (new Router())
    ->registerController(new \app\controller\HomeController())
    ->registerController(new \app\controller\UserController())
    ->resolveRoutes();

$server = new Server($loop, function (ServerRequestInterface $request) use ($router) {
    return $router->route($request);
});

$socket = new \React\Socket\Server('0.0.0.0:3000', $loop);
$server->listen($socket);

echo 'Listening on ' . str_replace('tcp:', 'http:', $socket->getAddress()) . PHP_EOL;

$loop->run();
