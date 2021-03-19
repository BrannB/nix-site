<?php


namespace app\controllers;
use app\tools\Templeater;

class AboutusController
{
    public Templeater $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
    }

    public function Index() {
        $template = 'aboutusTpl';
        $layout = 'aboutus';
        $this->templeater->renderContent($template, $layout,);
    }
}