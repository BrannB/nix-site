<?php

namespace app\models;

use app\services\OrderService;

class Order
{
    public OrderService $orderService;
    public DefaultModel $defaultModel;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->defaultModel = new DefaultModel();
    }

    public function create($purchase_id, $product_id, $product_amount)
    {
        return $this->orderService->create($purchase_id, $product_id, $product_amount);
    }

    public function getAllUserOrdersById($id)
    {
        return $this->orderService->getAllUserOrdersById($id);
    }

    public function getAllOrdersByPurchaseId($id)
    {
        return $this->defaultModel->get('`order`','*', "purchase_id = $id");
    }

    public function orderMapper($id)
    {
        $order = $this->getAllOrdersByPurchaseId(intval($id));
        $orderData = [];
        foreach ($order as $orders) {
            $object = new Order();
            $object->id = $orders->id;
            $object->purchase_id = $orders->purchase_id;
            $object->product_name = $this->defaultModel->get('`product`','name', "id = $orders->product_id");
            $object->price = $this->defaultModel->get('`product`','price', "id = $orders->product_id");
            $object->product_amount = $orders->product_amount;
            $object->price[0]->price *= $object->product_amount;
            array_push($orderData, $object);
        }
        return $orderData;
    }

}