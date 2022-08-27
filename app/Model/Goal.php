<?php

namespace Standings\Model;

use Standings\Library\Database;

class Goal
{
    use Database;

    public function insert(GoalEntity $entity): int|false
    {
        $sth = $this->connection->prepare("INSERT INTO goals(match_id, team_id) VALUES(:match, :team)");
        $sth->execute([
            'match' => $entity->match_id,
            'team' => $entity->team_id
        ]);

        return $this->connection->lastInsertId();
    }

    public function removeLastGoal(GoalEntity $entity): int|bool
    {
        $sth = $this->connection->prepare("SELECT * FROM goals WHERE match_id=:match AND team_id=:team ORDER BY id DESC");
        $sth->execute(['match'=>$entity->match_id, 'team'=>$entity->team_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, GoalEntity::class);

        $latestGoal = $sth->fetch();
        if($latestGoal) {
            $sth = $this->connection->prepare("DELETE FROM goals WHERE id=:id");
            return $sth->execute(['id'=>$latestGoal->id]);
        }
        return false;

    }
}