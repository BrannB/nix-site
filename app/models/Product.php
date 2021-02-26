<?php

namespace app\models;

use app\DB;

class Product extends DefaultModel
{
    private $db_connect;
    public $id, $name, $description, $status, $price, $image, $quantity;
    public DefaultModel $DefaultModel;

    public function __construct()
    {
        $this->db_connect = DB::getInstance()->connect();
        $this->DefaultModel = new DefaultModel();
    }

    public function getProductsDb()
    {
        return $this->DefaultModel->get('product','*');
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
            $object->quantity = $product->quantity;

            array_push($productData, $object);
        }
        return $productData;
    }
}
