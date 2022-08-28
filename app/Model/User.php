<?php

namespace Standings\Model;

use Standings\Library\Database;
use Standings\Model\UserEntity;

class User
{
    use Database;

    public function getUser($email, $password)
    {
        $sth = $this->connection->prepare("SELECT * FROM users WHERE email=:email");
        $sth->execute(['email'=>$email]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserEntity::class);
        return $sth->fetch();
    }

}