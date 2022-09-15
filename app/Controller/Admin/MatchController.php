<?php

namespace Standings\Controller\Admin;

use Standings\Controller\BaseController;
use Standings\Model\ActiveWeek;
use Standings\Model\Fixture;
use Standings\Model\FixtureView;
use Standings\Model\Goal;
use Standings\Model\GoalEntity;
use Standings\Model\MatchEntity;
use Standings\Model\Matches;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MatchController extends BaseController
{

    public function index(?int $id=null)
    {
        $active_week = $id ?? (new ActiveWeek())->get()->active_week;
        $weeks = (new Fixture())->getWeeks(1);

        if($id > end($weeks)->week)
            return redirectTo('/manage/matches/' . end($weeks)->week);

        $matches = (new FixtureView())->getMatches(1, $active_week);

        return $this->view('index', [
            'page'=>'matches',
            'matches' => $matches,
            'match_statuses' => MatchEntity::$statusMap,
            'weeks'=> $weeks,
            'selected_week' => $active_week
        ]);
    }

    /**
     * @return void
     * @todo move it to GoalController
     */
    public function addGoal(Request $request, Response $response)
    {
        $data = json_decode($request->getContent());
        $match_id = $data->match_id;
        $team_id = $data->team_id;

        $entity = new GoalEntity();
        $entity->match_id = (int)$match_id;
        $entity->team_id = (int)$team_id;

        $addGoal = (new Goal())->insert($entity);

        // Exception Handler yazılacak.

        $response->setContent(json_encode(['type'=>'success','response'=>$addGoal]));
        $response->send();
    }

    public function removeGoal(Request $request, Response $response)
    {
        $data = json_decode($request->getContent());
        $match_id = $data->match_id;
        $team_id = $data->team_id;

        $entity = new GoalEntity();
        $entity->match_id = (int)$match_id;
        $entity->team_id = (int)$team_id;

        try {
            $removeLatestGoal = (new Goal())->removeLastGoal($entity);
            $response->setContent(json_encode(['type'=>$removeLatestGoal ? 'success' : 'failed']));
        } catch (\Throwable $e) {
            $response->setContent(json_encode(['type'=>'failed', 'response'=>$e->getMessage()]));
        } finally {
            $response->send();
        }

    }

    public function changeMatchStatus(Request $request, Response $response)
    {
        $data = json_decode($request->getContent());
        $match_id = (int) $data?->match_id;
        $status = (int) $data?->status;

        try {
            $match = (new Matches())->updateMatchStatus($match_id, $status);
            $response->setContent(json_encode(['type'=>$match ? 'success' : 'failed']));
        } catch (\Throwable $e) {
            $response->setContent(json_encode(['type'=>'failed', 'response'=>$e->getMessage()]));
        } finally {
            $response->send();
        }
    }

}