
<?php

use app\controller\{HomeController, UserController, TestController};
use app\Environment;
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
    return $router->route($request);
});

$socket = new \React\Socket\Server('0.0.0.0:3000', $loop);
$server->listen($socket);

if(Environment::isProd()){
    $server->on('error', 'printf');
}

echo 'Listening on ' . str_replace('tcp:', 'http:', $socket->getAddress()) . PHP_EOL;

$loop->run();
