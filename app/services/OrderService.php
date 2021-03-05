<?php

namespace app\services;

use framework\DataBase\DB;
use app\models\Purchase;
use PDO;

class OrderService
{
    public Purchase $purchase;
    public function __construct()
    {
        $this->purchase = new Purchase();
    }

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function create($user_id, $product_id, $product_amount) : bool
    {
        $purchase_id = $this->purchase->getLastIdByUserId($user_id);
        $sql = 'INSERT INTO `order` (purchase_id, product_id, product_amount) 
                VALUE (:purchase_id, :product_id, :product_amount)';
        $stm = $this->connect()->prepare($sql);
        $result = $stm->execute([
            'purchase_id' => intval($purchase_id),
            'product_id' => intval($product_id),
            'product_amount' => intval($product_amount)
        ]);
        if($result)
            return true;
        else
            return false;
    }

    public function getAllUserOrdersById($id)
    {
        $sql = "SELECT * FROM `order` WHERE purchase_id = :id";
        $stm = $this->connect()->prepare($sql);
        $stm->execute(['id' => $id]);
        $result = $stm->fetchAll();
        return $result;
    }
}