<?php


namespace app\controller;


use app\routing\JsonResponse;
use app\routing\Router;
use React\Http\Message\Response;

class TestController implements Controller
{
    #[Route('sync', [Router::GET])]
    public function sync(): Response
    {
        return JsonResponse::generate([
            "data" => "here",
        ]);
    }

    #[Route('async', [Router::GET])]
    public function async(): Response
    {
        return JsonResponse::generate([
            "data" => "here",
        ]);
    }
}