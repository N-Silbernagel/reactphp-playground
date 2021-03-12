<?php


namespace app\controller\traits;


use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

/**
 * The Class can handle request to fetch all elements of a resource
 * @package app\controller\traits
 */
Trait DeleteResponse
{
    abstract public static function delete(ServerRequestInterface $request): Response;
}