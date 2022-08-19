<?php

namespace Standings\Controller;

use Standings\Model\FixtureView;

class HomeController extends Controller
{
    public function index()
    {
        $fixture = new FixtureView();
        $matches = $fixture->getMatches(1, 1);

        return $this->view('index', ['matches' => $matches]);
    }
}
