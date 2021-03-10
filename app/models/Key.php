<?php

namespace app\models;

use app\models\Purchase;
use app\models\Order;

class Key
{
    public Order $order;
    public DefaultModel $defaultModel;
    public Purchase $purchase;

    public function __construct()
    {
        $this->order = new Order();
        $this->defaultModel = new DefaultModel();
        $this->purchase = new Purchase();
    }

    public function generate($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public function create($order_id)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $key = $this->generate($permitted_chars);
        $result = $this->defaultModel->insert(
            "`licence_keys`",
            'key_body, order_id',
            [$key, $order_id]
        );
        return $result;
    }

    public function getAllKeysByPurchaseId($purchase_id)
    {
        $keys = array();
        $orders = $this->order->orderMapper(intval($purchase_id));
        foreach($orders as $key => $value)
        {
            $order_id = $orders[$key]->id;
            $keys[] = $this->defaultModel->get(
                '`licence_keys`',
                "key_body",
                "order_id = $order_id"
            );
        }
        return $keys;
    }

}