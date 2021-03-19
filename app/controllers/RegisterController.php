<?php

namespace app\controllers;

use app\tools\Templeater;
use framework\Authentication\Authentication;
use app\models\User;
use framework\sessions\Session;

class RegisterController
{
    public Templeater $renderClass;
    public Authentication $auth;
    public Session $session;
    public User $baseUser;
    public array $route;

    public function __construct(array $route)
    {
        $this->renderClass = new Templeater();
        $this->auth = new Authentication();
        $this->baseUser = new User();
        $this->session = Session::getInstance();
        $this->route = $route;
    }

    public function isValid($fname, $lname, $email, $uname, $pass, $passConfirm)
    {
        $_ERRORS = array();

        $userExistByEmail = $this->baseUser->checkUserExistByEmail($email);
        if (!empty($userExistByEmail))
            $_ERRORS[] = "This email-box has been already registered";
        $userExistByUname = $this->baseUser->checkUserExistByUname($email);
        if (!empty($userExistByUname))
            $_ERRORS[] = "This username has been already registered";
        if($pass !== $passConfirm)
            $_ERRORS[] = "Passwords are not same";
        if (!ctype_alpha($fname))
            $_ERRORS[] = "First name should contain only letters";
        if (!ctype_alpha($lname))
            $_ERRORS[] = "Last name should contain only letters";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $_ERRORS[] = "Invalid email";
        if (iconv_strlen($fname) >= 16 || iconv_strlen($fname) < 2)
            $_ERRORS[] = "First name should contain 2-16 symbols";
        if (iconv_strlen($lname) >= 16 || iconv_strlen($fname) < 2)
            $_ERRORS[] = "Last name should contain 2-16 symbols";
        if (iconv_strlen($uname) >= 16)
            $_ERRORS[] = "Username name should be less than 16 symbols";
        if (iconv_strlen($pass) >= 16 || iconv_strlen($pass) <= 6)
            $_ERRORS[] = "Password should contain 8-16 symbols";

        return $_ERRORS;
    }

    public function register()
    {
        if (!empty($_POST['fname'])) {
            $fname = trim($_POST['fname'], ' ');
            $lname = trim($_POST['lname'], ' ');
            $email = trim($_POST['email'], ' ');
            $uname = trim($_POST['uname'], ' ');
            $pass = trim($_POST['pass'], ' ');
            $passConfirm = trim($_POST['passConfirm'], ' ');

            $fname = ucfirst(strtolower($fname));
            $lname = ucfirst(strtolower($lname));

            $validationErrors = self::isValid($fname, $lname, $email, $uname, $pass, $passConfirm);

            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $country = intval($_POST['country']);

            if(empty($validationErrors)) {
                $this->baseUser->createUser($fname, $lname, $email, $uname, $pass, $country);
                header("Location: ../signin");
            } else {

                echo "Invalid data: <br>";
                for($i = 0; $i < count($validationErrors); $i++) {
                    echo $validationErrors[$i]."<br>";
                }
            }

        }
    }

    public function Index() {
        $template = $this->route['controller'] . 'Tpl';
        $layout = $this->route['controller'];

        $obj = new Templeater();

        $obj->renderContent($template, $layout, []);
    }
}