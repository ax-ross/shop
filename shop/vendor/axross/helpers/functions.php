<?php

use axross\App;

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, true) . '<pre>';
    if ($die) die();
}

function redirect($http = false)
{   
    if ($http) $redirect = $http;
    else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/' . (App::$app->getProperty('lang') ? App::$app->getProperty('lang') . '/' : '');
}