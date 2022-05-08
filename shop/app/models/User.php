<?php


namespace app\models;


class User extends AppModel
{

    public array $attributes = [
        'email' => '',
        'password' => '',
        'name' => '',
        'address' => '',
    ];

    public static function check_auth(): bool
    {
        return isset($_SESSION['user']);
    }




}