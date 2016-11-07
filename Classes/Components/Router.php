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

    public function getURL()
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

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                echo $controllerName."<br>";
                echo $actionName."<br>";

                $parameters = $segments;
                echo "<pre>";
                print_r($parameters);
                echo "</pre>";


                $controllerFile = 'Classes/Controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    echo 'true';
                    include($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != null){
                    break;
                }
            }
        }

    }
}