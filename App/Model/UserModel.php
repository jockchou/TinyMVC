<?php

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->loadDB();
    }

    public function getUserByName($userName)
    {
        $sql = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(":username", $userName);
        $sth->execute();

        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}