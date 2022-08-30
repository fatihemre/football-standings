<?php

namespace Standings\Controller\Admin;

use Standings\Controller\BaseController;
use Standings\Model\Fixture;
use Standings\Model\FixtureEntity;
use Symfony\Component\HttpFoundation\Request;

class FixtureController extends BaseController
{

    public function index()
    {
        $fixtures = (new Fixture())->getFixtures();
        return $this->view('index', ['page'=>'fixtures', 'fixtures'=>$fixtures]);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
        $display_name = $request->get('display_name');

        $entity = new FixtureEntity();
        $entity->display_name = $display_name;
        $fixture = new Fixture;

        if(!$fixture->insert($entity)) {
            flash('warning', 'Fikstür kaydedilemedi');
            return redirectTo('/manage/fixtures/create');
        }

        flash('success', 'Fikstür başarıyla kaydedildi');
        return redirectTo('/manage/fixtures');
    }

    public function edit(int $id) {
        $fixture = (new Fixture())->getFixture($id);

        return $this->view('edit', ['page'=>'fixtures', 'fixture'=>$fixture]);
    }

    public function update(int $id, Request $request)
    {
        $display_name = $request->get('display_name');

        $entity = new FixtureEntity();
        $entity->id = $id;
        $entity->display_name = $display_name;

        $fixture = new Fixture;

        try {
            if(!$fixture->update($entity)) {
                flash('warning', 'Fikstür güncellenemedi');
            } else {
                flash('success', 'Fikstür başarıyla güncellendi');
            }
        } catch (\Exception $e) {
            flash('warning', $e->getMessage());
        } finally {
            return redirectTo('/manage/fixtures/edit/' . $id);
        }
    }

    public function remove(int $id)
    {
        try {
            (new Fixture())->remove($id);
            flash('success', 'Fikstür başarıyla silindi.');
        } catch (\Exception $e) {
            flash('warning', $e->getMessage());
        } finally {
            return redirectTo('/manage/fixtures');
        }
    }




}