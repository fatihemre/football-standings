<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(APP_PATH .'/.env');

$session = new Session();
$session->start();

if (!function_exists('config')) {
    function config($str) {
        return $_ENV[$str] ?? NULL;
    }
}

if(!function_exists('session')) {
    function session($value, $set = false) {
        $session = new Session;
        if($set === false) {
            return $session->get($value);
        }
        if($set === -1) {
            return $session->remove($value);
        }
        $session->set($value, $set);
    }
}

if(!function_exists('flash')){
    function flash($type, $message) {
        $session = new Session;
        $session->getFlashBag()->add(
            $type,
            $message
        );
    }
}

if(!function_exists('password')) {
    function password(): PasswordHasherInterface {
        $factory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt'],
            'memory-hard' => ['algorithm' => 'sodium'],
        ]);

        return $factory->getPasswordHasher('common');

    }
}

if(!function_exists('redirectTo')) {
    function redirectTo($url) {
        return new RedirectResponse($url);
    }
}