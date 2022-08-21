<?php

namespace Standings\Controller;

use Standings\Model\Standings;
use Standings\Model\LastFiveStates;

class StandingsController extends Controller
{
    public function index()
    {
        $table = (new Standings())->getTable();

        foreach($table as $index=>$t) {
            $table[$index]->last_five = (new LastFiveStates)->latest($t->team_id);
        }

        return $this->view('index', ['table'=>$table]);
    }
}
