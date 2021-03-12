<?php


namespace app\routing;


use app\controller\Controller;

class Route
{
    public function __construct(
        /** the uri path which the Route Handles */
        private string $uri,
        /** the methods the route is reachable through */
        private array $methods,
        /** @var Controller The Controller class to handle the route's logic */
        private string $controller,
        /** @var string the name of the method in the controller that will handle the route's logic */
        private string $controllerMethodName,
    ) {}

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return Controller
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @return string
     */
    public function getControllerMethodName(): string
    {
        return $this->controllerMethodName;
    }
}