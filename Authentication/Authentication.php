<?php

namespace Authentication;

class Authentication
{
    public $login;
    public $pass;

    public function auth($login, $pass) : bool
    {
        $this->login = $login;
        $this->pass = $pass;
        return true;
    }

    public function isAuth(): bool
    {
        if (($this->login == 'login') && ($this->pass == 'pass'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function logOut(): void
    {
        session_abort();

        session_start();
        session_abort();
    }
}
