<?php

namespace Standings\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return $this->view('index');
    }

    public function teams()
    {
        return $this->view('teams');
    }
}