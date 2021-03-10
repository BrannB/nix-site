<?php

namespace app\controllers;

use app\models\Key;
use app\models\Purchase;
use framework\DataBase\DB;
use PDO;
use app\models\User;
use framework\Authentication\Authentication;
use app\tools\Templeater;
use app\models\Order;

class BucketController
{
    private Authentication $authSession;
    private User $userModel;
    private Templeater $templeater;
    private $products;
    private Order $order;
    private Purchase $purchase;
    private Key $gameKey;

    public function __construct()
    {
        if (isset($_SESSION['cart_list'])) {
            $this->products = $_SESSION['cart_list'];
        }
        $this->userModel = new User();
        $this->authSession = new Authentication();
        $this->templeater = new Templeater();
        $this->order = new Order();
        $this->purchase = new Purchase();
        $this->gameKey = new Key();
    }

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
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

        $this->templeater->renderContent($template, $layout,
            ['products' => $products, 'session' => $session]);
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

    public function makeOrder()
    {
        if (!empty($_POST)) {
            if (isset($_POST['makeOrder'])) {
                $user_id = $this->authSession->session->get("id");
                $this->purchase->create(
                    intval($this->authSession->session->get("id")),
                    intval($_SESSION['finalPrice']),
                    'pending'
                );
                foreach ($_SESSION['cart_list'] as $key => $value) {
                    foreach ($_SESSION['cart_list'][$key] as $key1 => $product_id) {
                        if ($key1 == "id") {
                            $this->order->create(
                                intval($user_id),
                                intval($product_id),
                                intval($_SESSION['cart_list'][$key]->amount)
                            );
                        }
                    }
                }

                $this->authSession->session->set("cart_list", []);
                header("Location: ../viewMyOrders");
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