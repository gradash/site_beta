<?php

class Router
{

    private static $routes = array();

    public static function route($pattern, $callback)
    {

        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/'; // change slashes
        self::$routes[$pattern] = $callback;
    }

    public static function run($url)
    { // give URL and search for route
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {

                array_shift($params); //shift array to remove slash
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}
