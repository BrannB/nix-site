<?php

require_once "app/autoloader.php";

$products = require_once("app\stock.php");

$templator = new Templeater();

$templator->renderContent('content','layout', $products);
