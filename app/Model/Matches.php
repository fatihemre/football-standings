<?php

namespace Standings\Model;

use Standings\Library\Database;
use Standings\Library\Pagination;

/**
 * PHP tarafından ayrıldığı için Match ismini kullanamıyoruz.
 */
class Matches
{
    use Database, Pagination;

    public function getMatch(int $match_id)
    {
        $sth = $this->connection->prepare("SELECT * FROM matches WHERE id=:id");
        $sth->execute(['id'=>$match_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, MatchEntity::class);

        return $sth->fetch();
    }

    public function getMatches($week=1)
    {
        $sth = $this->connection->prepare("SELECT * FROM matches WHERE week=:week");
        $sth->execute(['week'=>$week]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, MatchEntity::class);

        return $sth->fetchAll();
    }
}