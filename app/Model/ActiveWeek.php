<?php

namespace Standings\Model;

use Standings\Library\Database;

class ActiveWeek
{
    use Database;

    public function get(): ActiveWeekEntity
    {
        $sth = $this->connection->query("SELECT * FROM active_week");
        $sth->setFetchMode(\PDO::FETCH_CLASS, ActiveWeekEntity::class);
        return $sth->fetch() ?? new ActiveWeekEntity();
    }
}