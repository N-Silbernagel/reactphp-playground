<?php


namespace app\controller;

use app\controller\traits\IndexResponse;
use app\controller\traits\SaveResponse;
use app\routing\JsonResponse;
use app\routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class UserController implements Controller
{
    use IndexResponse, SaveResponse;

    public static array $users = [
        [
            "id" => 1,
            "name" => "John",
        ],
        [
            "id" => 2,
            "name" => "Jane",
        ],
        [
            "id" => 3,
            "name" => "Michael",
        ]
    ];

    #[Route("users", [Router::GET])]
    public static function index(ServerRequestInterface $request): Response
    {
        return JsonResponse::generate(
            self::$users
        );
    }

    #[Route("users", [Router::POST])]
    public static function save(ServerRequestInterface $request): Response
    {
        $newUser = [
            "id" => 4,
            "name" => "Me",
        ];

        array_push(self::$users, $newUser);

        return JsonResponse::generate(
            $newUser,
            201
        );
    }
}