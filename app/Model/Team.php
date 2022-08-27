<?php

namespace Standings\Model;

use Standings\Library\Database;
use Standings\Library\Pagination;

class Team
{
    use Database, Pagination;

    public function getTeam(int $team_id): TeamEntity|false
    {
        $sth = $this->connection->prepare("SELECT * FROM teams WHERE id=:team_id");
        $sth->execute(['team_id'=>$team_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, TeamEntity::class);

        return $sth->fetch();
    }

    public function getTeams(int $page=1): array|false
    {
        $isPaginated = in_array(Pagination::class, class_uses(Team::class), true);
        $sql = "SELECT * FROM teams";
        if($isPaginated) {
            $totalRecords = $this->connection->query("SELECT count(id) FROM teams");
            $totalRecords->execute();
            $paginate = $this->paginate((int) $totalRecords->fetchColumn(), $page, '/manage/teams');
            $sql .= " LIMIT {$paginate['offset']}, {$paginate['limit']}";
        }
        $sth = $this->connection->query($sql);
        $sth->setFetchMode(\PDO::FETCH_CLASS, TeamEntity::class);
        if($isPaginated) {
            $paginate['items'] = $sth->fetchAll();
            return $paginate;
        }

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