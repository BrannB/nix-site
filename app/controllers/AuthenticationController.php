<?php


namespace app\controllers;

use app\tools\Templeater;


class AuthenticationController
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

        $obj = new Templeater();
        $obj->renderContent($template, $layout, []);
    }
}