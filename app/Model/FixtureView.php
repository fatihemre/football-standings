<?php

namespace Standings\Model;

use Standings\Library\Database;

class FixtureView
{
    use Database;

    public function getMatches($fixture_id, $week = 0)
    {
        $params = ['fixture_id'=>$fixture_id];
        $sql = "SELECT * FROM fixture_view WHERE fixture_id=:fixture_id";
        if($week > 0) {
            $sql.= " and week=:week";
            $params['week'] = $week;
        }

        $sth = $this->connection->prepare($sql);
        $sth->execute($params);
        $sth->setFetchMode(\PDO::FETCH_CLASS, FixtureViewEntity::class);

        return $sth->fetchAll();
    }

}