<?php

namespace app\services;
use app\models\Purchase;
use PDO;
use framework\DataBase\DB;

class PurchaseService
{
    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function create($user_id, $total_price, $status = 'pending')
    {
        $sql = "INSERT INTO `purchases` (user_id, total_price, status) 
                VALUE (:user_id, :total_price, :status)";
        $stm = $this->connect()->prepare($sql);
        $result = $stm->execute([
            'user_id' => $user_id,
            'total_price' => $total_price,
            'status' => $status
        ]);
        if($result)
            return true;
        else
            return false;
    }

    public function getIdByUserId($user_id)
    {
        $sql = 'SELECT id FROM `purchases` WHERE user_id = :user_id';
        $stm = $this->connect()->prepare($sql);
        $stm->execute(['user_id' => $user_id]);
        $id = $stm->fetchAll();
        return intval($id[0][0]);
    }

    public function getLastIdByUserId($user_id)
    {
        $sql = 'SELECT MAX(id) FROM `purchases` WHERE user_id = :user_id';
        $stm = $this->connect()->prepare($sql);
        $stm->execute(['user_id' => $user_id]);
        $id = $stm->fetchAll();
        return intval($id[0][0]);
    }
}