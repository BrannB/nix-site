<?php

namespace app\controllers;

use app\tools\Templeater;
use models\Product;

class CatalogController
{
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function Index()
    {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];
        $item = new Product();
        $productsList = $item->getInfo();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, $productsList);
    }
}