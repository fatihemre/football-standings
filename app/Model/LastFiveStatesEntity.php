<?php

namespace Standings\Model;


class LastFiveStatesEntity {

    public int $id;
    public int $home_team_id;
    public int $away_team_id;
    public int $home_team_score;
    public int $away_team_score;
    public string $state;
}