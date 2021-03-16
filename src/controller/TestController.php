<?php


namespace app\controller;


use app\routing\JsonResponse;
use app\routing\Router;
use Carbon\Carbon;
use React\Http\Message\Response;

class TestController implements Controller
{
    #[Route('sync', [Router::GET])]
    public static function sync(): Response
    {
        $initTime = Carbon::now();
        return JsonResponse::generate([
            "took" => $initTime->diffInMicroseconds()
        ]);
    }

    #[Route('async', [Router::GET])]
    public static function async(): Response
    {
        $initTime = Carbon::now();
        return JsonResponse::generate([
            "took" => $initTime->diffInMicroseconds()
        ]);
    }
}