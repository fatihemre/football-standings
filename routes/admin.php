<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Standings\Controller\Admin\LeaugeController;
use Standings\Controller\Admin\MatchController;
use Standings\Controller\Admin\FixtureController;
use Standings\Controller\Admin\TeamController;
use Standings\Middleware\AdminMiddleware;

$adminRouter = &$router;

$adminRouter->group('manage', function($adminRouter){

    $adminRouter->get('', function(Request $request, Response $response) {
        return redirectTo('/manage/leauges');
    });

    $adminRouter->group('teams', function($adminRouter) {
        $adminRouter->get('', [TeamController::class, 'index']);

        $adminRouter->get('create', [TeamController::class, 'create']);
        $adminRouter->post('create', [TeamController::class, 'store']);

        $adminRouter->get('edit/:id', [TeamController::class, 'edit']);
        $adminRouter->post('edit/:id', [TeamController::class, 'update']);

        $adminRouter->get('remove/:id', [TeamController::class, 'remove']);
    });

    $adminRouter->group('fixtures', function($adminRouter) {
        $adminRouter->get('', [FixtureController::class, 'index']);

        $adminRouter->get('create', [FixtureController::class, 'create']);
        $adminRouter->post('create', [FixtureController::class, 'store']);

        $adminRouter->get('edit/:id', [FixtureController::class, 'edit']);
        $adminRouter->post('edit/:id', [FixtureController::class, 'update']);

        $adminRouter->get('remove/:id', [FixtureController::class, 'remove']);
    });

    $adminRouter->group('leauges', function($adminRouter) {
        $adminRouter->get('', [LeaugeController::class, 'index']);

        $adminRouter->get('create', [LeaugeController::class, 'create']);
        $adminRouter->post('create', [LeaugeController::class, 'store']);

        $adminRouter->get('edit/:id', [LeaugeController::class, 'edit']);
        $adminRouter->post('edit/:id', [LeaugeController::class, 'update']);

        $adminRouter->get('remove/:id', [LeaugeController::class, 'remove']);
    });

    $adminRouter->group('matches', function($adminRouter){
        $adminRouter->get('', [MatchController::class, 'index']);
        $adminRouter->get('/:int', [MatchController::class, 'index']);

        $adminRouter->post('add-goal', [MatchController::class, 'addGoal']);
        $adminRouter->post('remove-goal', [MatchController::class, 'removeGoal']);
    });

}, ['before'=> AdminMiddleware::class]);