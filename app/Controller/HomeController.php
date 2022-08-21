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

        $matches = $fixture->getMatches(1, (new ActiveWeek)->get()->active_week);

        return $this->view('index', ['matches' => $matches]);
    }
}
