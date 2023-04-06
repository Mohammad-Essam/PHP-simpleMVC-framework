<?php
class Route
{
    private static function mapToAction($controller, $action)
    {
        require("controllers/$controller.php");
        $instance = new $controller;
        if(method_exists($instance,$action))
        {
            $instance->$action();
        }
        else
        {
            throw "no method $action in controller $controller";
        }
    }
    static $routes = [
        'GET' =>[],
        'POST' =>[],
    ];

    public static function GET($route, $controller){
        Route::$routes["GET"][$route] = $controller;
    }   

    public static function POST($route, $controller){
        Route::$routes["POST"][$route] = $controller;
    }
    
    public static function beginRouting()
    {

        $method = $_SERVER["REQUEST_METHOD"];
        $route = trim($_SERVER["PATH_INFO"],"/");

        if(array_key_exists($route,static::$routes[$method]))
        {
            static::mapToAction(...explode("@",static::$routes[$method][$route]));
        }
        else
        {
            $otherMethod = $method=="GET"?"POST":"GET";
            if(array_key_exists($route,static::$routes[$otherMethod]))
            {
                echo "this route is defined with the $otherMethod method only";
                die();
            }
            echo "NO ROUTE WITH THIS NAME";
            die();
        }
    }
}

// Route::beginRouting();
// // $_SERVER['Method']