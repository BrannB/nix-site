<?php

namespace app\models;
use app\services\UserService;

class User
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
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

    public function deleteById(int $id): bool
    {
        return $this->userService->delete($id);
    }
}