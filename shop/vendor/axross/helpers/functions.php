<?php

use axross\App;
use axross\Language;

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
    if ($die) {
        die();
    }
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/' . (App::$app->getProperty('lang') ? App::$app->getProperty('lang') . '/' : '');
}

function gt($key)
{
    return Language::get($key);
}

function et($key)
{
    echo Language::get($key);
}

function get_cart_icon($id)
{
    if (!empty($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart'])) {
        $icon = '<i class="bi bi-cart-check-fill"></i>';
    } else {
        $icon = '<i class="bi bi-cart" ></i>';
    }
    return $icon;
}