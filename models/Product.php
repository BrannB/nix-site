<?php

namespace models;

class Product
{
    public $name, $img, $desc, $price, $status, $id;

    public function getInfo()
    {
        $info = file_get_contents("Stock.txt", true);
        $products = explode('---------------', $info);
        $productList = [];
        foreach ($products as $prod) {
            $productParams= explode('~~', $prod);

            $item = new Product();
            $item->name = $productParams[0];
            $item->img = $productParams[1];
            $item->desc = $productParams[2];
            $item->price = $productParams[3];
            $item->status = $productParams[4];
            $item->id = $productParams[5];
            array_push($productList, $item);
        }
        return $productList;
    }
}