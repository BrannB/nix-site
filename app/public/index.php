<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "../../vendor/autoload.php";
    require_once '../../framework/config/routes.php';

    use app\tools\Exceptions\NewException;
    use framework\sessions\Session;
    use Brann\Logger\Logger;

    $logger = new Logger("errorlogs", "../app/tools/logger/log");

    $session = new Session();
    $session->start();
    try {
        $router = new Router();
        $router->matchRoute();
        if (!$router)
        {
            throw new Exception();
        }
    } catch (NewException $error) {
        $logger->warning("All is crashed");
    }

