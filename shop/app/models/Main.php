<?php

namespace app\models;

use RedBeanPHP\R;

class Main extends \axross\Model
{

    public function get_names(): array
    {
        return $names = R::findAll('name');
    }

}