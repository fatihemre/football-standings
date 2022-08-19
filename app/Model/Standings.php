<?php

namespace Standings\Model;

use Standings\Library\Database;

class Standings
{
    use Database;

    public function getTable()
    {
        $sth = $this->connection->query("SELECT * FROM standings");
        $sth->setFetchMode(\PDO::FETCH_CLASS, StandingsEntity::class);
        return $sth->fetchAll();
    }
}