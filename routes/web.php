<?php

use Standings\Controller\AuthController;
use Standings\Controller\FixtureController;
use Standings\Controller\HomeController;
use Standings\Controller\StandingsController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Standings\Middleware\AdminMiddleware;

$webRouter = &$router;

$webRouter->get('/', [HomeController::class, 'index']);
$webRouter->get('/fixture', [FixtureController::class, 'index']);
$webRouter->get('/standings', [StandingsController::class, 'index']);

$webRouter->group('auth', function($webRouter) {

    $webRouter->get('', function (Request $request, Response $response){
        return redirectTo('/auth/login');
    });

    $webRouter->get('login', [AuthController::class, 'login']);
    $webRouter->post('login', [AuthController::class, 'check']);
    $webRouter->get('logout', [AuthController::class, 'logout'], ['before'=> AdminMiddleware::class]);
});