<?php

namespace Standings\Controller\Web;

use Standings\Controller\BaseController;
use Standings\Model\FixtureView;

class MatchController extends BaseController
{
    public function index()
    {
        $fixture = new FixtureView();
        $_matches = $fixture->getMatches(1);

        $all = [];
        foreach($_matches as $m) {
            $all['Maç ' . $m->week . '/38'][] = $m;
        }

        return $this->view('index', ['all'=>$all]);
    }
}
