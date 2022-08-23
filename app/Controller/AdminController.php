<?php

namespace Standings\Controller;

use Standings\Model\Leauge;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        return redirectTo('/manage/leauges');
    }

    public function teams()
    {
        return $this->view('teams', ['page'=>'teams']);
    }
    public function seasons()
    {
        return $this->view('seasons', ['page'=>'seasons']);
    }
    public function matches()
    {
        return $this->view('matches', ['page'=>'matches']);
    }
    public function leauges()
    {
        $leauges = (new Leauge())->getLeauges();

        return $this->view('leauges', ['page'=>'leauges', 'leauges'=>$leauges, 'leauge_statuses' => Leauge::$statusMap]);
    }
}