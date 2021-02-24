<?php

namespace Authentication;

use app\sessions\Session;
use app\services\UserService;
use app\models\User;
use models\DefaultModel;

class Authentication
{
    public User $baseUser;
    public UserService $userService;
    public Session $session;
    public DefaultModel $defaultModel;

    public function __construct()
    {
        $this->baseUser = new User();
        $this->userService = new UserService();
        $this->session = new Session();
        $this->defaultModel = new DefaultModel();
    }

    public function isAuth(): bool
    {
        if($this->session->contains('name'))
            return $this->session->sessionExists();
        else return false;
    }

    public function auth(string $email, string $pass)
    {
        $userExistByUname = $this->baseUser->checkUserExistByUname($email);
        var_dump($userExistByUname);
        if($userExistByUname == $email &&
            password_verify($pass, $userExistByUname->password))
        {
            $this->session->start();
            $this->session->set('name', $userExistByUname->uname);
            return true;
        } else {
            var_dump($userExistByUname);
        }
    }

    public function getLogin(): string
    {
        return $this->session->get('name');
    }

    public function logOut(): void
    {
        $this->session->destroy();
    }
}
