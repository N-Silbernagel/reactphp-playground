<?php


namespace app\routing;


use app\controller\Controller;
use app\controller\HomeController;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class Router
{
    const GET = "GET";
    const POST = "POST";
    const PATCH = "PATCH";
    const DELETE = "DELETE";

    /**
     * @var Route[]
     */
    private array $routes = [];

    private array $controllers = [];

    public function &registerController(Controller $controller): self
    {
        array_push($this->controllers, $controller);
        return $this;
    }

    /**
     * @throws \ReflectionException
     */
    public function &resolveRoutes(): self
    {
        foreach ($this->controllers as $registeredController) {
            $reflectedRegisteredController= new \ReflectionClass($registeredController);
            if(!$reflectedRegisteredController->implementsInterface(Controller::class)){
                continue;
            }
            $this->resolveRoutesFromAttributedMethods($reflectedRegisteredController);
        }
        return $this;
    }

    private function resolveRoutesFromAttributedMethods(\ReflectionClass $controllerClassReflection)
    {
        foreach ($controllerClassReflection->getMethods() as $controllerMethod) {
            $routeAttributes = $controllerMethod->getAttributes(\app\controller\Route::class);

            if(empty($routeAttributes)){
                continue;
            }

            /** @var \ReflectionAttribute $routeAttribute */
            $routeAttribute = array_shift($routeAttributes);

            array_push($this->routes, new Route(
                $routeAttribute->getArguments()[0],
                $routeAttribute->getArguments()[1],
                $controllerClassReflection->getName(),
                $controllerMethod->getName()
            ));
        }
    }

    /**
     * @param ServerRequestInterface $request
     * @return Response
     */
    public function route(ServerRequestInterface $request): Response
    {
        /** @var Route|null $matchingRoute */
        $matchingRoutesForPath = array_filter($this->routes, function (Route $route) use ($request) {
            return trim($route->getUri(), '/') === trim($request->getUri()->getPath(), '/');
        });
        if(empty($matchingRoutesForPath)){
            return new Response(
                404
            );
        }

        $matchingRoutesForPathAndMethod = array_filter($matchingRoutesForPath, function (Route $routeThatMatchesPath) use ($request) {
            return in_array($request->getMethod(), $routeThatMatchesPath->getMethods());
        });
        if(empty($matchingRoutesForPathAndMethod)){
            return new Response(
                405
            );
        }
        $matchingRoute = array_shift($matchingRoutesForPathAndMethod);

        return $matchingRoute->getController()::{$matchingRoute->getControllerMethodName()}($request);
    }
}