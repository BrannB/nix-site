<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "../vendor/autoload.php";
    require_once '../framework/config/routes.php';

    use brannLogger\Logger;
    use framework\Authentication\Authentication;
    use framework\tools\Exceptions\TplException;
    use framework\tools\Exceptions\LayoutException;
    use framework\tools\Exceptions\DataBaseException;

    $logger = new Logger("errorlogs", "../framework/tools/logger/log");
    $session = new Authentication();
    $session->session->start();

    try {
        $router = new Router();
        $router->matchRoute();
    } catch (DataBaseException $errors) {
        $logger->warning($errors->getMessage());
        echo $errors->getMessage();
    } catch (TplException $errors) {
        $logger->warning('Tpl is not found');
        echo $errors->getMessage();
    } catch (LayoutException $errors) {
        $logger->warning('Layout not found');
        echo $errors->getMessage();
    } catch (Exception $errors) {
        $logger->warning('');
        echo $errors->getMessage();
    }

