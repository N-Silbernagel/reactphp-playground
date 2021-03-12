<?php


namespace app\controller;


use app\controller\traits\IndexResponse;
use app\routing\JsonResponse;
use app\routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class HomeController implements Controller
{
    use IndexResponse;

    #[Route("/", [Router::GET])]
    public static function index(ServerRequestInterface $request): Response
    {
        return  JsonResponse::generate(
            [
                "meaningfulNumber" => 20000,
            ]
        );
    }
}