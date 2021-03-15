<?php
namespace app\controllers;

use app\models\Admin;
use app\models\DefaultModel;
use app\tools\Templeater;

class AdminUsersController
{
    private Admin $admin;
    private DefaultModel $defautlModel;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->defautlModel = new DefaultModel();
    }


    public function Index()
    {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminUsersTpl';
        $layout = 'AdminUsers';
        $users = $this->admin->getAllUsers();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['users' => $users]);
    }

    public function adminCrudUserIndex()
    {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminCrudUserTpl';
        $layout = 'AdminCrudUser';
        $users = $this->admin->getAllUsers();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['users' => $users]);
    }

    public function adminDeleteUser()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->defautlModel->delete(
                'user',
                "id = $id"
            );
            header("Location: ../adminUsers");
        }
    }

    public function adminUpdateUserIndex()
    {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $id = $_POST['id'];
        $template = 'AdminUpdateUserTpl';
        $layout = 'AdminUpdateUser';
        $user = $this->defautlModel->get(
            'user',
            '*',
            "id = $id"
        );
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['user' => $user]);
    }

    public function adminUpdateUser()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $uname = $_POST['uname'];
            $country = $_POST['country'];
            $isAdmin = $_POST['isAdmin'];

            $this->defautlModel->update(
                'user', [
                "first_name" => $fname,
                "last_name" => $lname,
                "email" => $email,
                "uname" => $uname,
                "country" => $country,
                "is_admin" => $isAdmin
            ],
                ["id = $id"],
                ""
            );
            header("Location: ../adminUsers");
        }
    }

    public function adminGetUserPurchases()
    {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        if (!empty($_POST)) {
            $template = 'AdminGetUserPurchasesTpl';
            $layout = 'AdminGetUserPurchases';
            $id = $_POST['id'];
            $purchases = $this->defautlModel->get('purchases', "*", "user_id = $id");
            $obj = new Templeater();
            $obj->renderContent($template, $layout, ['purchases' => $purchases]);
        }
    }
}