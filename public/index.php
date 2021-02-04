<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "../vendor/autoload.php";
    require_once '../app/config/routes.php';

    use app\tools\Exceptions\NewException;
    use app\sessions\Session;

    $session = new Session();
    $session->start();
    try {
        $router = new Router();
        $router->matchRoute();

    } catch (NewException $error) {
       echo $error->getMessage();
    }

