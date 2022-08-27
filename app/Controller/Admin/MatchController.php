<?php

namespace Standings\Controller\Admin;

use Standings\Controller\Controller;
use Standings\Model\ActiveWeek;
use Standings\Model\FixtureView;
use Standings\Model\Goal;
use Standings\Model\GoalEntity;
use Standings\Model\Matches;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MatchController extends Controller
{

    public function index()
    {
        // TODO: sayfadan hafta seçilebilir.

        $matches = (new FixtureView())->getMatches(1, (new ActiveWeek())->get()->active_week);

        return $this->view('index', ['page'=>'matches', 'matches' => $matches]);
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

}