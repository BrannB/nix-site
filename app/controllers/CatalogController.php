<?php

namespace app\controllers;
use framework\sessions\Session;
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
        $flag = 0;
        if (!empty($_POST)) {
            foreach ($_SESSION['cart_list'] as $key => $value) {
                foreach ($_SESSION['cart_list'][$key] as $key1 => $value1) {
                    if ($key1 == "id" && $value1 == $_POST['addToBucketBtn']) {
                        if(!isset($_SESSION['cart_list'][$key]->amount))
                            $_SESSION['cart_list'][$key]->amount = 1;
                        $flag = 1;
                    }
                    if($flag == 1) break;
                }
                if($flag == 1) break;
            }
            if($flag == 1)
            {
                $_SESSION['cart_list'][$key]->amount += 1;
                header('Location: ../catalog');
                return 1;
            }
            else {
                $product = $this->DefaultModel->getById('product', $_POST['addToBucketBtn']);
                $_SESSION['cart_list'][] = $product;
                header('Location: ../catalog');
            }
        }
        return 1;
    }
}