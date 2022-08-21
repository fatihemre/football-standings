<?php

namespace Standings\Library;

trait Database
{
    protected \PDO|null $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->connection = new \PDO(config('DB_CONNECTION') . ':host='.config('DB_HOST').';dbname='.config('DB_DATABASE').';charset='.config('DB_CHARSET').';port=' . config('DB_PORT'), config('DB_USERNAME'), config('DB_PASSWORD'));
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}