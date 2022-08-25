<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;

class SeasonController extends Controller
{

    public function index()
    {
        return $this->view('index', ['page'=>'seasons']);
    }

}