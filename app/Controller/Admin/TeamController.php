<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;

class TeamController extends Controller
{

    public function index()
    {
        return $this->view('index', ['page'=>'teams']);
    }

}