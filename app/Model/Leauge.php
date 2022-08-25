<?php

namespace Standings\Model;

use Standings\Library\Database;

class Leauge
{
    use Database;

    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    static $statusMap = [
        self::STATUS_DISABLED => 'Pasif',
        self::STATUS_ENABLED => 'Aktif'
    ];

    public function getLeauge(int $leauge_id)
    {
        $sth = $this->connection->prepare("SELECT * FROM leauges WHERE id=:leauge_id");
        $sth->execute(['leauge_id'=>$leauge_id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, LeaugeEntity::class);

        return $sth->fetch();
    }

    /**
     * @param int $status
     * @return array|false
     * status parametresi Enum ile zorlanabilir. https://www.php.net/manual/tr/language.enumerations.basics.php
     * Bunun için PHPv8.1 olması gerekir.
     */
    public function getLeauges(int $status = -1): array|false
    {
        if($status > 0) {
            $sth = $this->connection->prepare("SELECT * FROM leauges WHERE status=:status");
            $sth->execute(['status'=>$status]);
        } else {
            $sth = $this->connection->prepare("SELECT * FROM leauges");
            $sth->execute();
        }

        $sth->setFetchMode(\PDO::FETCH_CLASS, LeaugeEntity::class);

        return $sth->fetchAll();

    }

    public function insert(LeaugeEntity $entity): int|bool
    {
        $sth = $this->connection->prepare("INSERT INTO leauges(display_name, status) VALUES (:display_name, :status)");
        $sth->execute([
            'display_name' => $entity->display_name,
            'status' => $entity->status
        ]);

        return $this->connection->lastInsertId();
    }

    public function update(LeaugeEntity $entity): int|bool
    {
        $leauge = $this->getLeauge($entity->id);
        if(!$leauge)
            throw new \Exception('Lig bulunamadı');

        $sth = $this->connection->prepare("UPDATE leauges SET display_name=:display_name, status=:status WHERE id=:id");
        return $sth->execute([
            'display_name' => $entity->display_name,
            'status' => $entity->status,
            'id' => $entity->id
        ]);
    }

    public function remove(int $leauge_id): int|bool
    {
        $leauge = $this->getLeauge($leauge_id);
        if(!$leauge)
            throw new \Exception('Lig bulunamadı');

        return $this->connection->prepare("DELETE FROM leauges WHERE id=:id")->execute(['id'=>$leauge_id]);

    }

}