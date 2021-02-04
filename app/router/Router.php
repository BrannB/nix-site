<?php



use app\tools\logger\Logger;

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

    public static function routeCheck(string $url)
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
        if (self::routeCheck(self::getUrl()))
        {
            $controller = ucfirst(self::$route['controller']) . "Controller";
            $act = ucfirst(self::$route['action']);
            $str = "app\\controllers\\$controller";
            if (class_exists($str))
            {
                $object = new $str(self::$route);
                $object->$act();
            }
        }
    }
}

