<?php

namespace Standings\Model;

use Standings\Library\Database;

class Team
{
    use Database;

    public function getTeam(int $team_id): TeamEntity|false
    {
        $sth = $this->connection->prepare("SELECT * FROM teams WHERE id=:team_id");
        $sth->execute(['team_id'=>$team_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, TeamEntity::class);

        return $sth->fetch();
    }

    public function getTeams(): array|false
    {
        // TODO: Gelecekte sayfalama eklenebilir.
        $sth = $this->connection->query("SELECT * FROM teams");
        $sth->setFetchMode(\PDO::FETCH_CLASS, TeamEntity::class);

        return $sth->fetchAll();
    }

    public function insert(TeamEntity $entity)
    {
        $sth = $this->connection->prepare("INSERT INTO teams (short_code, display_name) VALUES(:short_code, :display_name)");
        $sth->execute([
            'short_code' => $entity->short_code,
            'display_name' => $entity->display_name
        ]);

        return $this->connection->lastInsertId();
    }

    public function update(TeamEntity $entity)
    {
        $team = $this->getTeam($entity->id);

        if(!$team)
            throw new \Exception('Takım bulunamadı.');

        $sth = $this->connection->prepare("UPDATE teams SET display_name=:display_name, short_code=:short_code WHERE id=:id");
        return $sth->execute([
            'display_name' => $entity->display_name,
            'short_code' => $entity->short_code,
            'id' => $entity->id
        ]);
    }

    public function remove(int $team_id)
    {
        $team = $this->getTeam($team_id);

        if(!$team)
            throw new \Exception('Takım bulunamadı');

        return $this->connection->prepare("DELETE FROM teams WHERE id=:id")->execute(['id'=>$team_id]);
    }
}