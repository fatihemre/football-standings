<?php

namespace Standings\Model;

class FixtureViewEntity
{

    public int $id;
    public int $fixture_id;
    public int $week;
    public string $home_team_name;
    public string $home_team_short_code;
    public int $home_team_score;
    public string $away_team_name;
    public string $away_team_short_code;
    public int $away_team_score;
    // TODO: string ifadesinin otomatik olarak DateTime'a cast edilmesi sağlanacak.
    public string $match_day;

}