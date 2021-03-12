<?php


namespace app\controller\traits;


use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

/**
 * The Class can handle request to fetch all elements of a resource
 * @package app\controller\traits
 */
Trait UpdateResponse
{
    abstract public static function update(ServerRequestInterface $request): Response;
}