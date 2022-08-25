<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;

class MatchController extends Controller
{

    public function index()
    {
        return $this->view('index', ['page'=>'matches']);
    }

}