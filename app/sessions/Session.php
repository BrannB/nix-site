<?php

namespace app\sessions;

class Session
{
    private static $instance;

    public static function getInstance() : Session
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function start(): bool
    {
        session_start();
        return true;
    }

    public function getId(): string
    {
        return session_id();
    }

    public function setId($id): void
    {
        session_id($id);
    }

    public function contains($key): bool
    {
        if (isset($_SESSION[$key])) {
            return true;
        }
        return false;
    }

    public function cookieExists(): bool
    {
        if (!empty($_COOKIE))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function sessionExists(): bool
    {
        if (!empty($_SESSION))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function setName($name): void
    {
        session_name($name);
    }

    public function getName(): string
    {
        return session_name();
    }

    public function destroy(): void
    {
        session_destroy();
    }

    public function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function setSavePath($savePath): void
    {
        session_save_path($savePath);
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public function keyExists($key) : bool
    {
        if (array_key_exists("$key", $_SESSION)) {
            return true;
        } else {
            return false;
        }
    }
}