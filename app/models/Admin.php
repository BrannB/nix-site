<?php

namespace app\models;


class Admin
{
    private DefaultModel $defaultModel;

    public function __construct()
    {
        $this->defaultModel = new DefaultModel();
    }

    public function getAllUsers()
    {
        return $this->defaultModel->get('`user`');
    }

    public function getAllOrders()
    {
        return $this->defaultModel->get('`order`');
    }
    public function getAllProducts()
    {
        return $this->defaultModel->get('`product`');
    }
    public function getAllPurchases()
    {
        return $this->defaultModel->get('`purchases`');
    }
}