<?php

use Buki\Router\Router;
use Standings\Controller\Admin\LeaugeController;
use Standings\Controller\Admin\MatchController;
use Standings\Controller\Admin\FixtureController as AdminFixtureController;
use Standings\Controller\Admin\TeamController;
use Standings\Controller\AuthController;
use Standings\Controller\FixtureController;
use Standings\Controller\HomeController;
use Standings\Controller\StandingsController;
use Standings\Middleware\AdminMiddleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

date_default_timezone_set('Europe/Istanbul');
define("APP_PATH", realpath(__DIR__.'/..'));

require_once APP_PATH . '/vendor/autoload.php';

try {

    $router = new Router([
        'paths' => [
            'controllers' => APP_PATH .'/app/Controller',
            'middlewares' => APP_PATH .'/app/Middleware'
        ],
        'namespaces' => [
            'controllers' => 'Standings\Controller',
            'middlewares' => 'Standings\Middleware'
        ],
        'debug' => true
    ]);
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/fixture', [FixtureController::class, 'index']);
    $router->get('/standings', [StandingsController::class, 'index']);

    $router->group('manage', function($router){

        $router->get('', function(Request $request, Response $response) {
            return redirectTo('/manage/leauges');
        });

        $router->get('teams', [TeamController::class, 'index']);

        $router->group('fixtures', function($router) {
            $router->get('', [AdminFixtureController::class, 'index']);

            $router->get('create', [AdminFixtureController::class, 'create']);
            $router->post('create', [AdminFixtureController::class, 'store']);

            $router->get('edit/:id', [AdminFixtureController::class, 'edit']);
            $router->post('edit/:id', [AdminFixtureController::class, 'update']);

            $router->get('remove/:id', [AdminFixtureController::class, 'remove']);
        });

        $router->group('leauges', function($router) {
            $router->get('', [LeaugeController::class, 'index']);

            $router->get('create', [LeaugeController::class, 'create']);
            $router->post('create', [LeaugeController::class, 'store']);

            $router->get('edit/:id', [LeaugeController::class, 'edit']);
            $router->post('edit/:id', [LeaugeController::class, 'update']);

            $router->get('remove/:id', [LeaugeController::class, 'remove']);
        });

        $router->get('matches', [MatchController::class, 'index']);

    }, ['before'=> AdminMiddleware::class]);

    $router->group('auth', function($router) {

        $router->get('', function (Request $request, Response $response){
            return redirectTo('/auth/login');
        });

        $router->get('login', [AuthController::class, 'login']);
        $router->post('login', [AuthController::class, 'check']);
        $router->get('logout', [AuthController::class, 'logout'], ['before'=> AdminMiddleware::class]);
    });

    $router->run();

} catch (\Throwable $t) {
    echo '<pre>';
    print_r($t);
    exit;
}

