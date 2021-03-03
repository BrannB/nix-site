<?php


namespace app\controllers;
use app\models\Product;
use app\models\Purchase;
use app\tools\Templeater;
use framework\sessions\Session;

class ViewMyOrdersController
{
    public array $route;
    public Purchase $purchase;
    public Session $session;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->purchase = new Purchase();
        $this->session = Session::getInstance();
    }

    public function Index()
    {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];
        $purchaseObject = new Purchase();
        $obj = new Templeater();
        $purchases = $purchaseObject->purchaseMapper($this->session->get('id'));
        $obj->renderContent($template, $layout,
            ['purchases' => $purchases, 'session' => $this->session]);
    }
}