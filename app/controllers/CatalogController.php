<?php

namespace app\controllers;

use Framework\pagination\Pagination;
use framework\sessions\Session;
use app\tools\Templeater;
use app\models\DefaultModel;
use app\models\Product;
use PDO;

class CatalogController
{
    public DefaultModel $DefaultModel;
    private session $session;
    private Pagination $pagination;
    public Product $product;

    public function __construct()
    {
        $this->DefaultModel = new DefaultModel();
        $this->session = Session::getInstance();
        if(!isset($_GET['page']))
            $_GET['page'] = 1;
        $this->pagination = new Pagination($_GET['page'], 3, count($this->getAll()));
        $this->product = new Product();
    }

    public function getAll()
    {
        $sql = "SELECT *  
                FROM product";
        $statement = $this->DefaultModel->db_connect->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function Index() {
        $pag = $this->pagination;
        $template = 'catalogTpl';
        $layout = 'catalog';
        $products = $this->product->getPagination($this->pagination->getPageNumber(), 3);
        $obj = new Templeater();
        $obj->renderContent($template, $layout,
            ['products' => $products, 'session' => $this->session, 'pagination' => $pag]);

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