<?php


namespace app\controllers;
use app\tools\Templeater;

class MainController
{
    public function Index() {
        $template = 'mainTpl';
        $layout = 'main';

        $obj = new Templeater();
        $obj->renderContent($template, $layout);
    }
}