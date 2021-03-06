<?php


namespace app\controllers;


use app\models\Admin;
use app\tools\Templeater;

class AdminOrdersController
{
    private Admin $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function Index() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminOrdersTpl';
        $layout = 'AdminOrders';
        $orders = $this->admin->getAllOrders();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['orders' => $orders]);
    }
}