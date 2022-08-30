<?php

use Standings\Controller\Web\AuthController;
use Standings\Controller\Web\MatchController;
use Standings\Controller\Web\HomeController;
use Standings\Controller\Web\StandingsController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Standings\Middleware\AdminMiddleware;

$webRouter = &$router;

$webRouter->get('/', [HomeController::class, 'index']);
$webRouter->get('/matches', [MatchController::class, 'index']);
$webRouter->get('/standings', [StandingsController::class, 'index']);

$webRouter->group('auth', function($webRouter) {

    $webRouter->get('', function (Request $request, Response $response){
        return redirectTo('/auth/login');
    });

    $webRouter->get('login', [AuthController::class, 'login']);
    $webRouter->post('login', [AuthController::class, 'check']);
    $webRouter->get('logout', [AuthController::class, 'logout'], ['before'=> AdminMiddleware::class]);
});