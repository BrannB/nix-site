<?php

class Templeater
{
    public function renderContent($template, $layout, array $products)
    {
        require_once __DIR__ . "\\..\\templates\\header.php";
        ob_start();
        require_once __DIR__ . "\\..\\templates\\" . $template .".php";
        $content = ob_get_clean();
        require_once __DIR__ . "\\..\\templates\\" . $layout . ".php";
        require_once __DIR__ . "\\..\\templates\\footer.php";

    }
}