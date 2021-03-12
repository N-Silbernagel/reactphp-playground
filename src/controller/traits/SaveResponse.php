<?php


namespace app\controller\traits;


use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

/**
 * The Class can handle request to fetch all elements of a resource
 * @package app\controller\traits
 */
Trait SaveResponse
{
    abstract public static function save(ServerRequestInterface $request): Response;
}