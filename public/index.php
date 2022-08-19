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
    $router->run();

} catch (\Throwable $t) {
    die($t->getMessage());
}

