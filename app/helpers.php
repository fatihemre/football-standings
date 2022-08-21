<?php

$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(APP_PATH .'/.env');

if (!function_exists('config')) {
    function config($str) {
        return $_ENV[$str] ?? NULL;
    }
}