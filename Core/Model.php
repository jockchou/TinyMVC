<?php

class Model
{
    protected $config;
    protected $pdo = null;

    function __construct()
    {
        $this->config = require(CFG_PATH . ENV . DIRECTORY_SEPARATOR . "database.php");
    }

    public function loadDB($name = 'default')
    {
        if ($this->pdo != null) {
            return $this->pdo;
        } else {
            try {
                $config = $this->config[$name];
                $this->pdo = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);

                return $this->pdo;
            } catch (PDOException $e) {
                echo 'DB connection failed: ' . $e->getMessage();
            }
        }
    }
}