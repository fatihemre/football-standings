<?php

namespace Standings\Model;

class MatchEntity
{
    const STATUS_NOT_STARTED = 0;
    const STATUS_STARTED = 1;
    const STATUS_HALF_TIME = 2;
    const STATUS_FULL_TIME = 3;
    const STATUS_OVERTIME = 4;
    const STATUS_POSTPONED = 5;
    const STATUS_CANCELLED = 6;

    public static array $statusMap = [
        self::STATUS_NOT_STARTED => 'Maç henüz başlamadı',
        self::STATUS_STARTED => 'Maç başladı',
        self::STATUS_HALF_TIME => 'İlk yarı bitti',
        self::STATUS_FULL_TIME => 'Maç bitti',
        self::STATUS_OVERTIME => 'Uzatmalar',
        self::STATUS_POSTPONED => 'Maç ertelendi',
        self::STATUS_CANCELLED => 'Maç iptal edildi'
    ];

    public int $id;
    public string $match_day;
    public int $fixture_id;
    public int $week;
    public int $home_team_id;
    public int $away_team_id;
    public int $status;
}