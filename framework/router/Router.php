<?php

use brannLogger\Logger;
use framework\tools\Exceptions\TplException;
use framework\tools\Exceptions\LayoutException;

class Router
{
    public static array $routes = [];   # array of routes
    public static array $route = [];  # current route

    public static function addRoute(string $key, array $values)
    {
        self::$routes[$key] = $values;
    }

    public function getUrl()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function routeCheck($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if (preg_match("#$pattern#", $url, $result))
            {
                foreach ($result as $key => $value)
                {
                    if (is_string($key))
                    {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action']))
                {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public function matchRoute()
    {
        $logger = new Logger('errorlogs', 'logger/log');
        if (self::routeCheck(self::removeQueryString(self::getUrl())))
        {
            $controller = ucfirst(self::$route['controller']) . "Controller";
            $act = ucfirst(self::$route['action']);
            $str = "app\\controllers\\$controller";
            if (class_exists($str))
            {
                $object = new $str(self::$route);
                $object->$act();
            } else {
                $logger->warning("Tpl is not found", ["Route for: \"" . self::getUrl() . "\" is not found(Tpl)"]);
                throw new TplException('Tpl is not found');
            }
        } else {
            $logger->warning("Layout not found", ["Route for: \"" . self::getUrl() . "\" is not found(Layout)"]);
            throw new LayoutException('Layout is not found');
        }

    }

    public static function removeQueryString($uri) {
        if ($uri) {
            $parts = explode('?', $uri);
            if (strpos($parts['0'], "=") === false) {
                return trim($parts['0'],'/');
            } else {
                return '';
            }
        }
        else return false;
    }
}

