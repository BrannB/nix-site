<?php

namespace app\tools;

class Templeater
{
    public function renderContent($template, $layout, array $products = [])
    {
        $layouts = __DIR__ . "/../../app/view/pages/layout/";
        $templates = __DIR__ . "/../../app/view/pages/templates/";

        require_once "../app/view/pages/header.php";

        ob_start();
        require_once $templates . $template . ".php";
        $template = ob_get_clean();

        require_once $layouts . $layout . ".php";

        require_once "../app/view/pages/footer.php";
    }
}
