<?php

namespace app\services;
use framework\DataBase\DB;
use PDO;

class UserService
{
    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stm = $this->connect()->prepare($sql);
        $stm->execute(['id' => $id]);
        $stm->setFetchMode(PDO::FETCH_OBJ);
        return $stm->fetch();
    }

    public function getByEmail(string $email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stm = $this->connect()->prepare($sql);
        $stm->execute(["email" => $email]);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stm->fetchAll();
        return $result;
    }

    public function getByUname($uname)
    {
        $sql = "SELECT * FROM user WHERE uname = :uname";
        $stm = $this->connect()->prepare($sql);
        $stm->execute(['uname' => $uname]);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stm->fetchAll();
        return $result;
    }

    public function create($fname, $lname, $email, $uname, $password, $country): bool
    {
        $sql = "INSERT INTO user (first_name, last_name, email, uname, password, country) 
                VALUE (:fname, :lname, :email, :uname, :password, :country)";
        $stm = $this->connect()->prepare($sql);
        $result = $stm->execute(['fname' => $fname,  'lname' => $lname, 'email' => $email,
            'uname' => $uname, 'password' => $password, 'country' => $country]);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update(int $id, $fname, $lname, $email, $uname, $password, $country): bool
    {
        $sql = "UPDATE user SET (
            first_name = :fname, 
            last_name = :lname,
            email = :email,
            uname = :uname,
            password = :password,
            country = :country, 
        ) WHERE id = :id";
        $stm = $this->connect()->prepare($sql);
        $result = $stm->execute(['fname' => $fname,  'lname' => $lname, 'email' => $email,
            'uname' => $uname, 'password' => $password, 'country' => $country]);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM user
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $result = $statement->execute(['id' => $id]);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

}
