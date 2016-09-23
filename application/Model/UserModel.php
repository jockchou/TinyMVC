<?php
/**
 * @author    JockChou (http://jockchou.github.io)
 * @link      https://github.com/jockchou/TinyMVC
 * @copyright Copyright (c) 2016 JockChou
 * @license   https://raw.githubusercontent.com/jockchou/TinyMVC/master/LICENSE (Apache License)
 */
namespace TinyMVC\App\Model;

use TinyMVC\Core\Model;

/**
 * Class UserModel
 * @package TinyMVC\App\Model
 */
class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->loadDB();
    }

    /**
     * @param string $userName
     * @return mixed
     */
    public function getUserByName($userName)
    {
        $sql = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(":username", $userName);
        $sth->execute();

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }
}