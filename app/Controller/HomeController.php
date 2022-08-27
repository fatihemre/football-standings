<?php

namespace Standings\Controller;

use Standings\Model\ActiveWeek;
use Standings\Model\ActiveWeekEntity;
use Standings\Model\FixtureView;

class HomeController extends Controller
{
    public function index()
    {
        $fixture = new FixtureView();
        $activeWeek =(new ActiveWeek)->get()->active_week;

        $matches = $fixture->getMatches(1, $activeWeek);

        return $this->view('index', ['matches' => $matches, 'active_week' =>$activeWeek]);
    }
}
