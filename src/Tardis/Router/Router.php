<?php

declare(strict_types=1);

namespace Tardis\Router;

use Tardis\Router\RouterInterface;

class Router implements RouterInterface
{
    /**
     * returns an array of route from our routing table
     * @var array
     */
    protected array $routes = [];
    
    /**
     * returns an array of route parameters
     * @var array
     */
    protected array $params = [];

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function add(): void
    {
        $this->routes[$route] = $params
    }

    /**
     * @inheritDoc
     */
    public function dispatch(string $url) : void
    {
        if($this->match($url)):
            $controllerString = $this->params['controller'];
            $controllerString = $this->transformUpperCamelCase($controllerString);
            $controllerString = $this->getNamespace($controllerString);
        endif;    

    }

    public function transformUpperCamelCase(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Matche the route 
     *
     * @param string $url
     * @return boolean
     */
    private function match(string $url) : bool
    {
        foreach($this->routes as $route => $params):
            if(preg_match($route, $url, $matches)): 
                foreach ($matches as $key => $params):
                    if (is_string($key)):
                    $params[$key] = $params;
                    endif;
                endforeach;
            endif;
            $this->params = $params;
            return true;
        endforeach;
       return false;

    }
}