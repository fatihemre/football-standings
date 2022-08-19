<?php

namespace Standings\Controller;

use Standings\Model\Standings;

class StandingsController extends Controller
{
    public function index()
    {
        $table = (new Standings())->getTable();
        return $this->view('index', ['table'=>$table]);
    }
}
