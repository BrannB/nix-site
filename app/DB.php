<?php

namespace app;
use PDO;

class DB
{
    private static $instance;
    private $host;
    private $user;
    private $password;
    private $db_name;
    private $dbConfig;

    public function __construct()
    {
        $dbConfig = require_once dirname(__DIR__) . '/app/config/config.php';
        $this->dbConfig = $dbConfig;
    }

    public static function getInstance() : DB
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function configMapper()
    {
        $this->host = $this->dbConfig['host'];
        $this->user = $this->dbConfig['user'];
        $this->password = $this->dbConfig['password'];
        $this->db_name = $this->dbConfig['db_name'];
    }

    public function connect()
    {
        $this->configMapper();
        $db_connect = new PDO("mysql:dbname={$this->db_name};host={$this->host}",
            $this->user, $this->password);
        return $db_connect;
    }

}