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

    public array $rules = [
        'required' => ['email', 'password', 'name', 'address'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6]
        ]
    ];

    public array $labels = [
        'email' => 'user_signup_email_input',
        'password' => 'user_signup_password_input',
        'name' => 'user_signup_name_input',
        'address' => 'user_signup_address_input',
    ];

    public static function check_auth(): bool
    {
        return isset($_SESSION['user']);
    }




}