<?php


namespace app\controllers;


use app\models\Admin;
use app\models\DefaultModel;
use app\tools\Templeater;

class AdminProductsController
{
    private Admin $admin;
    private DefaultModel $defautlModel;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->defautlModel = new DefaultModel();
    }

    public function Index() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminProductsTpl';
        $layout = 'AdminProducts';
        $products = $this->admin->getAllProducts();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['products' => $products]);
    }

    public function adminCrudProductIndex() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminCrudProductTpl';
        $layout = 'AdminCrudProduct';
        $products = $this->admin->getAllProducts();
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['products' => $products]);
    }

    public function adminCreateProductIndex() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $template = 'AdminCreateProductTpl';
        $layout = 'AdminCreateProduct';
        $obj = new Templeater();
        $obj->renderContent($template, $layout);
    }

    public function adminCreateProduct() {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $category = $_POST['category'];


            $this->defautlModel->insert(
                '`product`',
                'name, description, image, status, price, category',
                [$name, $description, $image, $status, $price, $category]
            );
            header("Location: ../adminProducts");
        }
    }

    public function adminDeleteProduct() {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->defautlModel->delete(
                'product',
                "id = $id"
            );
            header("Location: ../adminProducts");
        }
    }

    public function adminUpdateProductIndex() {
        if ($_SESSION['is_admin'] == 0)
            header("Location: ../main");
        $id =  $_POST['id'];
        $template = 'AdminUpdateProductTpl';
        $layout = 'AdminUpdateProduct';
        $product = $this->defautlModel->get(
            'product',
            '*',
            "id = $id"
        );
        $obj = new Templeater();
        $obj->renderContent($template, $layout, ['product' => $product]);
    }

    public function adminUpdateProduct() {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $category = $_POST['category'];

            $this->defautlModel->update(
                'product', [
                "name" => $name,
                "description" => $description,
                "image" => $image,
                "price" => $price,
                "status" => $status,
                "category" => $category
            ],
                ["id = $id"],
                ""
            );
            header("Location: ../adminCrudProduct");
        }
    }


}