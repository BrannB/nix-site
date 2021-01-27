<?php

class Templeater
{
    public function renderContent($template, $layout, array $products)
    {
        $layouts = __DIR__ . "/../pages/layout/";
        $templates = __DIR__ . "/../pages/templates/";

        require_once "../pages/header.php";
        ob_start();
        require_once $templates . $template . ".php";
        $content = ob_get_clean();
        require_once $layouts . $layout . ".php";
        require_once "../pages/footer.php";
    }
}