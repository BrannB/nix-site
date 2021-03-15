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
    public array $getFromDb;
    public static $search;
    public function __construct()
    {
        $this->DefaultModel = new DefaultModel();
        $this->session = Session::getInstance();
        if(!isset($_GET['page']))
            $_GET['page'] = 1;
        $this->pagination = new Pagination($_GET['page'], 3, count($this->getAll()));
        $this->product = new Product();
        self::$search = '';
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
        if(isset($_POST['searchByName'])) {
            $template = 'searchByNameTpl';
            $layout = 'catalog';
            $this->session->set('search', $_POST['searchByName']);
        } elseif(isset($_POST['sortDesc'])) {
            $template = 'catalogDescTpl';
            $layout = 'catalog';
        } elseif (isset($_POST['sortAsc'])) {
            $template = 'catalogAscTpl';
            $layout = 'catalog';
        } else {
            $template = 'catalogTpl';
            $layout = 'catalog';
        }
        $pag = $this->pagination;
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

    public function catalogApi()
    {
        $products = [];
        $getFromDb = $this->product->getProductsDb();
        foreach ($getFromDb as $key => $value) {
            if(isset($_POST['searchByName']))
            {
                if (strripos($value->name, $_POST['searchByName']) === false)
                    continue;
            }
            $product = [];
            $product['id'] = $value->id;
            $product['name'] = $value->name;
            $product['description'] = $value->description;
            $product['price'] = $value->price;
            $product['status'] = $value->status;
            $product['image'] = $value->image;
            array_push($products, $product);
        }
        $productsJson = json_encode($products, JSON_UNESCAPED_UNICODE);
        echo $productsJson;

    }

    public function catalogDescApi()
    {
        $products = [];
        $getFromDb = $this->product->getProductsByPriceDESC();
        foreach ($getFromDb as $key => $value) {
            if(isset($_POST['searchByName']))
            {
                if (strripos($value->name, $_POST['searchByName']) === false)
                    continue;
            }
            $product = [];
            $product['id'] = $value->id;
            $product['name'] = $value->name;
            $product['description'] = $value->description;
            $product['price'] = $value->price;
            $product['status'] = $value->status;
            $product['image'] = $value->image;
            array_push($products, $product);
        }
        $productsJson1 = json_encode($products, JSON_UNESCAPED_UNICODE);
        echo $productsJson1;

    }

    public function catalogAscApi()
    {
        $products = [];
        $getFromDb = $this->product->getProductsByPriceASC();
        foreach ($getFromDb as $key => $value) {
            if(isset($_POST['searchByName']))
            {
                if (strripos($value->name, $_POST['searchByName']) === false)
                    continue;
            }
            $product = [];
            $product['id'] = $value->id;
            $product['name'] = $value->name;
            $product['description'] = $value->description;
            $product['price'] = $value->price;
            $product['status'] = $value->status;
            $product['image'] = $value->image;
            array_push($products, $product);
        }
        $productsJson1 = json_encode($products, JSON_UNESCAPED_UNICODE);
        echo $productsJson1;

    }

    public function catalogSearchApi()
    {
        $products = [];
        $getFromDb = $this->product->getProductsDb();
        foreach ($getFromDb as $key => $value)  {
            if (strripos($value->name, $this->session->get('search')) === false)
                continue;
            $product = [];
            $product['id'] = $value->id;
            $product['name'] = $value->name;
            $product['description'] = $value->description;
            $product['price'] = $value->price;
            $product['status'] = $value->status;
            $product['image'] = $value->image;
            array_push($products, $product);
        }
        $productsJson1 = json_encode($products, JSON_UNESCAPED_UNICODE);
        echo $productsJson1;
    }
}