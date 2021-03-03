<?php

namespace app\models;
use app\services\UserService;
use app\services\OrderService;

class User
{
    private UserService $userService;
    public Order $order;
    public DefaultModel $baseModel;
    private OrderService $orderService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->orderService = new OrderService();
        $this->baseModel = new DefaultModel();
        $this->order = new Order();
    }

    public function checkUserExistByEmail($email)
    {
        return $this->userService->getByEmail($email);
    }

    public function checkUserExistByUname($uname)
    {
        return $this->userService->getByUname($uname);
    }

    public function createUser($fname, $lname, $email, $uname, $pass, $country): bool
    {
        return ($this->userService->create($fname, $lname, $email, $uname, $pass, $country));
    }

    public function getNameById(int $id): string
    {
        $user = $this->userService->getById($id);
        return $user->name;
    }

    public function getUserById(int $id)
    {
        return $this->userService->getById($id);
    }

    public function register($fname, $lname, $email, $uname, $pass, $country): bool
    {
        return ($this->userService->create($fname, $lname, $email, $uname, $pass, $country));
    }

    public function update(int $id, $fname, $lname, $email, $uname, $pass, $country): bool
    {
        return ($this->userService->update($id, $fname, $lname, $email, $uname, $pass, $country));
    }

    public function makeOrder($user_id, $product_id, $product_amount)
    {
        return ($this->order->create($user_id, $product_id, $product_amount));
    }

    public function deleteById(int $id): bool
    {
        return $this->userService->delete($id);
    }
}