<?php

const ACTIVE_FIXTURE_ID = 1;

try {

    $db = new \PDO('mysql:host=127.0.0.1;dbname=football;charset=utf8;port=3307', 'root', '');
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

} catch (\PDOException $e) {
    die($e->getMessage());
}