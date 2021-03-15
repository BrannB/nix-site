<?php

namespace app\models;

use framework\DataBase\DB;
use PDO;

class Product extends DefaultModel
{
    public $db_connect;
    public $id, $name, $description, $status, $price, $image, $quantity;
    public DefaultModel $DefaultModel;

    public function __construct()
    {
        $this->db_connect = DB::getInstance()->connect();
        $this->DefaultModel = new DefaultModel();
    }

    public function getProductsDb()
    {
        return $this->DefaultModel->get('product', '*', '', "id DESC", '');
    }

    public function getProductsByPriceDESC()
    {
        return $this->DefaultModel->get('product', '*', '', "price DESC", '');
    }
    public function getProductsByPriceASC()
    {
        return $this->DefaultModel->get('product', '*', '', "price ASC", '');
    }

    public function productMapper()
    {
        $products = $this->getProductsDb();
        $productData = [];
        foreach ($products as $product) {

            $object = new Product();
            $object->id = $product->id;
            $object->name = $product->name;
            $object->description = $product->description;
            $object->status = $product->status;
            $object->price = $product->price;
            $object->image = $product->image;

            array_push($productData, $object);
        }
        return $productData;
    }

    public function getPagination($start, $perpage)
    {
        $sql = "SELECT *  
                FROM product
                LIMIT {$start}, {$perpage}";
        $statement = $this->DefaultModel->db_connect->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }
}
