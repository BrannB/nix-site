<?php


namespace app\controllers;
use app\models\Purchase;
use app\tools\Templeater;
use framework\sessions\Session;
use app\models\Order;

class PurchaseDetailsController
{
    public array $route;
    public Purchase $purchase;
    public Session $session;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->session = Session::getInstance();
    }

    public function Index()
    {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];
        $orderObject = new Order();
        $obj = new Templeater();
        $order = $orderObject->orderMapper();
        $obj->renderContent($template, $layout,
            ['order' => $order, 'session' => $this->session]);
    }
}