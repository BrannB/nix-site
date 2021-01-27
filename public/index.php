<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // криво работает (исправлю чуть позже)
    #require_once "../autoloader.php";
    require_once("../classes/Storage.php");
    require_once("../classes/Templeater.php");
    require_once("../classes/logger/LoggerInterface.php");
    require_once("../classes/logger/Logger.php");
    require_once("../classes/logger/LogLevel.php");
    use classes\logger\Logger;

    $logger1 = new Logger();
    try
    {
        $products = require_once("../storage/stock.php");
        $page = trim($_SERVER["REQUEST_URI"], '/');
        if ($page == '')
        {
            $page = "catalog";
        }
        $template_name = $page . "Tpl";
        #-----------------TEST----------------------------
        $stok = new Storage($products, $logger1);
        $id = 1;
        if (!($stok->getById($id)))
        {
            throw new Exception("Error! Product with this ID doesn't exist!");
        }
        #-------------------------------------------------
        $templeater = new Templeater();
        $templeater->renderContent($template_name, $page, $products);
    }
    catch (Exception $e)
    {
        $logger1->warning($e->getMessage(), ["id" => $id]);
    }


