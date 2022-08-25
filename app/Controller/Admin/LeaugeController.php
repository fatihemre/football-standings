<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;
use Standings\Model\Leauge;
use Standings\Model\LeaugeEntity;
use Symfony\Component\HttpFoundation\Request;

class LeaugeController extends Controller
{

    public function index()
    {
        $leauges = (new Leauge())->getLeauges();
        return $this->view('index', ['page'=>'leauges', 'leauges'=>$leauges, 'leauge_statuses' => Leauge::$statusMap]);
    }

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

    public function edit(int $id) {
        $leauge = (new Leauge())->getLeauge($id);

        return $this->view('edit', ['page'=>'leauges', 'leauge'=>$leauge, 'leauge_statuses'=>Leauge::$statusMap]);
    }

    public function update(int $id, Request $request)
    {
        $display_name = $request->get('display_name');
        $status = $request->get('status');

        $entity = new LeaugeEntity();
        $entity->id = $id;
        $entity->display_name = $display_name;
        $entity->status = $status;

        $leauge = new Leauge();

        try {
            if(!$leauge->update($entity)) {
                flash('warning', 'Lig güncellenemedi');
                return redirectTo('/manage/leauges/edit/' . $id);
            }
        } catch (\Exception $e){
            flash('warning', $e->getMessage());
            return redirectTo('/manage/leauges/edit/' . $id);
        }

        flash('success', 'Lig başarıyla güncellendi');
        return redirectTo('/manage/leauges/edit/' . $id );

    }

    public function remove(int $id)
    {
        // TODO: direkt silmek yerine softdelete işlemi yapılabilir. Ayrı bir yayın konusu??
        try {
            (new Leauge())->remove($id);

            flash('success', 'Lig başarıyla silindi');
            return redirectTo('/manage/leauges');

        } catch (\Exception $e) {
            flash('warning', $e->getMessage());
            return redirectTo('/manage/leauges');
        }
    }
}