<?php


namespace app\controllers;


use app\models\Admin;
use app\tools\Templeater;

class AdminPurchasesController
{
    private Admin $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function Index() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminPurchasesTpl';
        $layout = 'AdminPurchases';
        $purchases = $this->admin->getAllPurchases();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['purchases' => $purchases]);
    }
}