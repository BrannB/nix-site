<?php

namespace app\controllers;
use app\models\User;
use app\tools\Templeater;
use framework\Authentication\Authentication;

class MemberController
{
    public array $route;
    public Templeater $templeater;
    public Authentication $auth;
    public User $user;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->user = new User();
        $this->auth = new Authentication();
        $this->templeater = new Templeater();
    }

    public function Index()
    {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];

        $obj = new Templeater();
        $obj->renderContent($template, $layout, []);
    }

    public function ProductsListApi()
    {
        if (isset($_SESSION['name'])) {
            $orders = $this->user->getAllOrdersForUser($this->auth->session->get('id'));
        }

        $ordersArray = [];
        foreach ($orders as $value) {
            $order = [];
            $order['name'] = $value->name;
            $order['surname'] = $value->surname;
            $order['email'] = $value->email;
            $order['qty'] = $value->qty;
            $order['name'] = $value->name;
            $order['price'] = $value->price;
            array_push($ordersArray, $order);
        }

        $jsonProductsStr = json_encode($ordersArray, JSON_UNESCAPED_UNICODE);

        echo $jsonProductsStr;
    }
}

