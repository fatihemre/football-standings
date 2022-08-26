<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;
use Standings\Model\Fixture;
use Standings\Model\FixtureEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class XhrController extends Controller
{

    public function index()
    {
        return $this->view('index');
    }

    public function result(Request $request)
    {
        echo json_encode(['type'=>'success', 'message'=>'XHR Response Test']);
        exit;
    }

}