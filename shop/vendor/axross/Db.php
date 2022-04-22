<?php

namespace axross;

use RedBeanPHP\R;


class Db
{

    use TSingleton;

    private function __construct()
    {
        $db =require_once CONFIG . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if (!R::testConnection()) throw new \Exception('Ошибка подключения к базе данных', 500);
        R::freeze(true);
        if (DEBUG) R::debug(true, 3);
    }
}