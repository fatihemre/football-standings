<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Standings\Controller\Admin\LeaugeController;
use Standings\Controller\Admin\MatchController;
use Standings\Controller\Admin\FixtureController as AdminFixtureController;
use Standings\Controller\Admin\TeamController;

use Standings\Middleware\AdminMiddleware;

$adminRouter = &$router;

$adminRouter->group('manage', function($adminRouter){

    $adminRouter->get('', function(Request $request, Response $response) {
        return redirectTo('/manage/leauges');
    });

    $adminRouter->get('teams', [TeamController::class, 'index']);

    $adminRouter->group('fixtures', function($adminRouter) {
        $adminRouter->get('', [AdminFixtureController::class, 'index']);

        $adminRouter->get('create', [AdminFixtureController::class, 'create']);
        $adminRouter->post('create', [AdminFixtureController::class, 'store']);

        $adminRouter->get('edit/:id', [AdminFixtureController::class, 'edit']);
        $adminRouter->post('edit/:id', [AdminFixtureController::class, 'update']);

        $adminRouter->get('remove/:id', [AdminFixtureController::class, 'remove']);
    });

    $adminRouter->group('leauges', function($adminRouter) {
        $adminRouter->get('', [LeaugeController::class, 'index']);

        $adminRouter->get('create', [LeaugeController::class, 'create']);
        $adminRouter->post('create', [LeaugeController::class, 'store']);

        $adminRouter->get('edit/:id', [LeaugeController::class, 'edit']);
        $adminRouter->post('edit/:id', [LeaugeController::class, 'update']);

        $adminRouter->get('remove/:id', [LeaugeController::class, 'remove']);
    });

    $adminRouter->get('matches', [MatchController::class, 'index']);

}, ['before'=> AdminMiddleware::class]);