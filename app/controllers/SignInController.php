<?php

namespace app\controllers;

use app\tools\Templeater;

class SignInController
{
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function authorization()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name'], ' ');
            $surname = trim($_POST['surname'], ' ');
            $email = trim($_POST['email'], ' ');
            $password = trim($_POST['password'], ' ');

            $this->auth->setDataForReg($name, $surname, $email, $password);
            $auth = $this->auth->auth();
            if ($auth) {
                $_SESSION['cart_list'] = [];
                $_SESSION['wish_list'] = [];
            }
            header("Location: ../login");
        }
    }


    public function Index()
    {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];
        $obj = new Templeater();
        $obj->renderContent($template, $layout, []);
    }


}