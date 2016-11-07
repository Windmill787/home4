<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 1:22
 */

namespace Vendor\Dir\Components;

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = 'Classes/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURL()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURL();
        foreach ($this->routes as $uriPattern => $path)
        {
            if (preg_match("~$uriPattern~", $uri)){
                $segments = explode('/', $path);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.array_shift($segments);
                $actionName = ucfirst($actionName);
                
                $controllerFile = 'Classes/Controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    echo 'true';
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != NULL){
                    break;
                }
            }
        }

    }
}