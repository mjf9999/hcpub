<?php
define('BASE_PATH', realpath(__DIR__ . '/../'));

if (!function_exists('base_path')) {
    function base_path()
    {
        return BASE_PATH;
    }
}

if (!function_exists('config')) {

    function config($name)
    {
        $config = require_once base_path() . '/config/config.php';
        return $config[$name] ?? null;
    }
}
