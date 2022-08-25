<?php

namespace Standings\Model;

use Standings\Library\Database;

class Fixture
{
    use Database;

    public function getFixture(int $fixture_id): FixtureEntity|false
    {
        $sth = $this->connection->prepare("SELECT * FROM fixtures WHERE id=:fixture_id");
        $sth->execute(['fixture_id'=>$fixture_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, FixtureEntity::class);

        return $sth->fetch();
    }

    public function getFixtures(): array|false
    {
        $sth = $this->connection->prepare("SELECT * FROM fixtures");
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, FixtureEntity::class);

        return $sth->fetchAll();
    }

    public function insert(FixtureEntity $entity)
    {
        $sth = $this->connection->prepare("INSERT INTO fixtures(display_name) VALUES (:display_name)");
        $sth->execute([
            'display_name' => $entity->display_name
        ]);

        return $this->connection->lastInsertId();
    }

    public function update(FixtureEntity $entity)
    {
        $fixture = $this->getFixture($entity->id);
        if(!$fixture)
            throw new \Exception('Fikstür bulunamadı');

        $sth = $this->connection->prepare("UPDATE fixtures SET display_name=:display_name WHERE id=:id");
        return $sth->execute([
            'display_name' => $entity->display_name,
            'id' => $entity->id
        ]);
    }

    public function remove(int $fixture_id)
    {
        $fixture = $this->getFixture($fixture_id);

        if(!$fixture)
            throw new \Exception('Fikstür bulunamadı');

        return $this->connection->prepare("DELETE FROM fixtures WHERE id=:id")->execute(['id'=>$fixture_id]);
    }
}