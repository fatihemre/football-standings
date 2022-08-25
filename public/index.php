<?php

use Buki\Router\Router;

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

    // Kullanıcı arayüzü için gerekli route listesi. Bellekteki $router değişkenini refere eder.
    require_once APP_PATH. '/routes/web.php';

    // Admin arayüzü için gerekli route listesi. Bellekteki $router değişkenini refere eder.
    require_once APP_PATH. '/routes/admin.php';

    $router->run();

} catch (\Throwable $t) {
    echo '<pre>';
    print_r($t);
    exit;
}

