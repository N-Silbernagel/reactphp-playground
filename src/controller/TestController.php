<?php


namespace app\controller;


use app\routing\JsonResponse;
use app\routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class TestController implements Controller
{
    #[Route('sync', [Router::GET])]
    public static function sync(): Response
    {
        return JsonResponse::generate([
            "data" => "here",
        ]);
    }

    #[Route('async', [Router::GET])]
    public static function async(): Response
    {
        return JsonResponse::generate([
            "data" => "here",
        ]);
    }
}