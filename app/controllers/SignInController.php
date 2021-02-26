<?php

namespace app\controllers;

use app\tools\Templeater;
use framework\Authentication\Authentication;

class SignInController
{
    public array $route;
    public Authentication $auth;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->auth = new Authentication();
    }

    public function authentication()
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $result = $this->auth->auth($email, $pass);
        if($result)
        {
            header("Location: ../member");
        } else {
            echo "Incorrect values";
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