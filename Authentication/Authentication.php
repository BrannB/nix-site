<?php

namespace Authentication;

use app\sessions\Session;

class Authentication
{
    public $login = 'login';
    public $pass = 'pass';
    public Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function isAuth(): bool
    {
        return $this->session->sessionExists();
    }
    public function auth(string $login, string $pass): bool
    {
        if ($this->login == $login && $this->pass == $pass) {
            $this->session->start();
            $this->session->set('name', $login);
            $this->session->set('pass', $pass);
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
