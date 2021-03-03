<?php

namespace app\models;

use app\services\OrderService;

class Order
{
    public OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function create($purchase_id, $product_id, $product_amount)
    {
        return $this->orderService->create($purchase_id, $product_id, $product_amount);
    }

}