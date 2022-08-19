<?php

namespace Standings\Model;

class StandingsEntity
{
    public string $display_name;
    public string $short_code;
    public int $win;
    public int $draw;
    public int $lose;
    public int $played;
    public int $goal_scored;
    public int $goal_conceded;
    public int $goal_difference;
    public int $points;
}