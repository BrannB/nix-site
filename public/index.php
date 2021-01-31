<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../autoloader.php';
    require_once '../app/router/Router.php';
    require_once '../app/config/routes.php';

    use app\tools\logger\Logger;
    use app\tools\Exceptions\NewException;

    $logger1 = new Logger();
    try
    {
        $router = new Router();
        $router->matchRoute();
    }
    catch (NewException $error)
    {
       echo $error->getMessage();
    }

