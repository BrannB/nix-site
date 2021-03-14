<?php

namespace framework\Authentication;

use framework\sessions\Session;
use app\services\UserService;
use app\models\User;
use app\models\DefaultModel;

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
        $this->session = Session::getInstance();
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
        $userExist = $this->baseUser->checkUserExistByEmail($email);
        if(empty($userExist))
            return false;
        if($userExist[0]['email'] == $email &&
            password_verify($pass, $userExist[0]['password']))
        {
            $this->session->set('id', $userExist[0]['id']);
            $this->session->set('uname', $userExist[0]['uname']);
            $this->session->set('name', $userExist[0]['first_name']);
            $this->session->set('email', $userExist[0]['email']);
            $this->session->set('is_admin', $userExist[0]['is_admin']);
            return true;
        } else {
            return false;
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
