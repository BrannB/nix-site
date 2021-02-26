<?php

namespace app\controllers;
use app\sessions\Session;
use app\tools\Templeater;
use app\models\DefaultModel;
use app\models\Product;

class CatalogController
{
    public DefaultModel $DefaultModel;
    private session $session;

    public function __construct()
    {
        $this->DefaultModel = new DefaultModel();
        $this->session = Session::getInstance();
    }

    public function Index() {
        $template = 'catalogTpl';
        $layout = 'catalog';
        $productObject = new Product();
        $products = $productObject->productMapper();
        $obj = new Templeater();
        $obj->renderContent($template, $layout,
            ['products' => $products, 'session' => $this->session]);
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            $product = $this->DefaultModel->getById('products',$_POST['Product']);
            $_SESSION['cart_list'][] = $product;
            header('Location: ../catalog');
        }
    }
}