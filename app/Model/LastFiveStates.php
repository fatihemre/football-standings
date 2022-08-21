<?php

namespace Standings\Model;

use Standings\Library\Database;

class LastFiveStates {

    use Database;

    public function latest(int $team_id)
    {
        $sth = $this->connection->prepare("SELECT * FROM last_five_states WHERE home_team_id=:home OR away_team_id=:away");
        $sth->execute(['home'=>$team_id, 'away'=>$team_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, LastFiveStatesEntity::class);
        return $sth->fetchAll();
    }
}