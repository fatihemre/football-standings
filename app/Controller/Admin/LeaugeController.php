<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;
use Standings\Model\Leauge;
use Standings\Model\LeaugeEntity;
use Symfony\Component\HttpFoundation\Request;

class LeaugeController extends Controller
{

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
        $display_name = $request->get('display_name');
        $status = $request->get('status');

        $entity = new LeaugeEntity();
        $entity->display_name = $display_name;
        $entity->status = $status;
        $leauge = new Leauge();

        if(!$leauge->insert($entity)) {
            flash('warning', 'Lig kaydedilemedi');
            return redirectTo('/manage/leauges/create');
        }

        flash('success', 'Lig başarıyla kaydedildi');
        return redirectTo('/manage/leauges');

    }
}