<?php

namespace Standings\Controller\Admin;

use Standings\Controller\BaseController;
use Standings\Model\Team;
use Standings\Model\TeamEntity;
use Symfony\Component\HttpFoundation\Request;

class TeamController extends BaseController
{

    public function index(Request $request)
    {
        $teams = (new Team())->getTeams($request->get('page', 1));

        return $this->view('index', ['page'=>'teams', 'teams'=>$teams]);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
        $short_code = $request->get('short_code');
        $display_name = $request->get('display_name');

        $entity = new TeamEntity();
        $entity->short_code = $short_code;
        $entity->display_name = $display_name;

        $team = new Team;

        if(!$team->insert($entity)) {
            flash('warning', 'Takım eklenemedi.');
            return redirectTo('/manage/teams/create');
        }

        flash('success', 'Takım başarıyla eklendi.');
        return redirectTo('/manage/teams');
    }

    public function edit(int $id)
    {
        $team = (new Team())->getTeam($id);
        return $this->view('edit', ['page'=>'teams', 'team' => $team]);
    }

    public function update(int $id, Request $request)
    {

        $short_code = $request->get('short_code');
        $display_name = $request->get('display_name');

        $entity = new TeamEntity();
        $entity->id = $id;
        $entity->short_code = $short_code;
        $entity->display_name = $display_name;

        $team = new Team();

        try {
            if(!$team->update($entity)) {
                flash('warning', 'Takım güncellenemedi.');
            } else {
                flash('success', 'Takım başarıyla güncellendi.');
            }
        } catch (\Exception $e) {
            flash('warning', $e->getTraceAsString());
        } finally {
            return redirectTo('/manage/teams/edit/' . $id);
        }
    }

    public function remove(int $id)
    {
        try {
            (new Team())->remove($id);
            flash('success', 'Takım başarıyla silindi');
        } catch (\Exception $e) {
            flash('warning', $e->getMessage());
        } finally {
            return redirectTo('/manage/teams');
        }
    }

}