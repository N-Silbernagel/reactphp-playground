<?php


namespace app\controller\traits;


use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

/**
 * The Class can handle request to fetch a resource
 * @package app\controller\traits
 */
Trait FindResponse
{
    abstract public static function find(ServerRequestInterface $request): Response;
}