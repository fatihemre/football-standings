<?php

namespace Standings\Model;

class MatchEntity
{
    public int $id;
    public string $match_day;
    public int $fixture_id;
    public int $week;
    public int $home_team_id;
    public int $away_team_id;
}