<?php

namespace app\controllers;


use app\models\User;
use framework\Authentication\Authentication;
use app\tools\Templeater;

class BucketController
{
    private Authentication $authSession;
    private User $userModel;

    private Templeater $renderClass;
    private $products;

    public function __construct()
    {
        if (isset($_SESSION['cart_list'])) {
            $this->products = $_SESSION['cart_list'];
        }
        $this->userModel = new User();
        $this->authSession = new Authentication();
        $this->renderClass = new Templeater();
    }

    public function Index() {
        $template = 'bucketTpl';
        $layout = 'bucket';

        $sessionCartList = $this->authSession->session->keyExists('cart_list');

        if ($sessionCartList) {
            $products = $this->products;
        } else {
            $products = [];
        }

        $session = $this->authSession->session;

        $this->renderClass->renderContent($template, $layout, ['products' => $products, 'session' => $session]);
    }

    public function remove()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $oldPrice = $this->authSession->session->get('finalPrice');
                $product = $this->authSession->session->get('cart_list');
                $this->authSession->session->delete('cart_list',"$delProduct");
                $productPrice = $product[$delProduct];
                if (!empty($productPrice->price)) {
                    $productPrice = $productPrice->price;
                } else {
                    $productPrice = 0;
                }
                $newPrice = $oldPrice - $productPrice;
                $this->authSession->session->set('finalPrice', $newPrice);
                header('Location: ../bucket');
            }
        }
    }

    public function setAmount($id = null)
    {
        if($id != null)
        {
            foreach ($_SESSION['cart_list'] as $key => $value) {
                if ($key == strval($id)) {
                    $value->amount += 1;
                }
            }
            header('Location: ../catalog');
            return 1;
        }

        if (!empty($_POST)) {
            if (isset($_POST['changeAmount-'])) {
                foreach ($_SESSION['cart_list'] as $key => $value) {
                    if ($key == $_POST['changeAmount-']) {
                        $value->amount -= 1;
                    }
                }
            } elseif(isset($_POST['changeAmount+'])) {
                foreach ($_SESSION['cart_list'] as $key => $value) {
                    if ($key == $_POST['changeAmount+']) {
                        $value->amount += 1;
                    }
                }
            }
        }
        header('Location: ../bucket');
    }
}