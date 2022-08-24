<?php

date_default_timezone_set('Europe/Istanbul');
define("APP_PATH", realpath(__DIR__.'/..'));

require_once APP_PATH . '/vendor/autoload.php';

try {

    $router = new \Buki\Router\Router([
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
    $router->get('/', [\Standings\Controller\HomeController::class, 'index']);
    $router->get('/fixture', [\Standings\Controller\FixtureController::class, 'index']);
    $router->get('/standings', [\Standings\Controller\StandingsController::class, 'index']);

    $router->group('manage', function($router){

        $router->get('', [\Standings\Controller\AdminController::class, 'index'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);
        $router->get('/teams', [\Standings\Controller\AdminController::class, 'teams'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);
        $router->get('/seasons', [\Standings\Controller\AdminController::class, 'seasons'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);
        $router->get('/leauges', [\Standings\Controller\AdminController::class, 'leauges'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);

        $router->get('/leauges/create', [\Standings\Controller\Admin\LeaugeController::class, 'create'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);
        $router->post('/leauges/create', [\Standings\Controller\Admin\LeaugeController::class, 'store'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);

        $router->get('/matches', [\Standings\Controller\AdminController::class, 'matches'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);


        $router->get('/logout', [\Standings\Controller\AuthController::class, 'logout'], ['before'=>\Standings\Middleware\AdminMiddleware::class]);
        $router->get('/login', [\Standings\Controller\AuthController::class, 'login']);
        $router->post('/login', [\Standings\Controller\AuthController::class, 'check']);
    });

    $router->run();

} catch (\Throwable $t) {
    echo '<pre>';
    print_r($t);
    exit;
}

