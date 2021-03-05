<?php

namespace app\models;
use app\services\PurchaseService;
use app\models\DefaultModel;

class Purchase
{
    public PurchaseService $purchaseService;
    public DefaultModel $defaultModel;
    public $id, $user_id, $total_price, $status, $created_at;

    public function __construct()
    {
        $this->purchaseService = new PurchaseService();
        $this->defaultModel = new DefaultModel();
    }

    public function create($user_id, $total_price, $status)
    {
        return $this->purchaseService->create($user_id, $total_price, $status);
    }

    public function getLastIdByUserId($id)
    {
        return $this->purchaseService->getLastIdByUserId($id);
    }

    public function getAllPurchasesByUserId($id)
    {
        return $this->defaultModel->get('`purchases`','*', "user_id = $id", "id DESC");
    }

    public function purchaseMapper($id)
    {
        $purchase = $this->getAllPurchasesByUserId($id);
        $purchaseData = [];
        foreach ($purchase as $purchases) {
            $object = new Purchase();
            $object->id = $purchases->id;
            $object->user_id = $purchases->user_id;
            $object->total_price = $purchases->total_price;
            $object->status = $purchases->status;
            $object->created_at = $purchases->created_at;
            array_push($purchaseData, $object);
        }
        return $purchaseData;
    }

    public function getIdByUserId($user_id)
    {
        return $this->purchaseService->getIdByUserId($user_id);
    }

}