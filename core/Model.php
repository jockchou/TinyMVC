<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\Core;

class Model
{
    protected $config;
    protected $pdo = null;

    function __construct()
    {
        $this->config = require CFG_PATH . ENV . APP_DS . "database.php";
    }

    public function loadDB($name = 'default')
    {
        if ($this->pdo != null) {
            return $this->pdo;
        } else {
            try {
                $config = $this->config[$name];
                $this->pdo = new \PDO($config['dsn'], $config['username'], $config['password'], $config['options']);

                return $this->pdo;
            } catch (\PDOException $e) {
                throw new TinyException("DB connection failed: " . $e->getMessage());
            }
        }
    }
}