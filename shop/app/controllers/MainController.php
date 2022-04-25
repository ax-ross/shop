<?php

namespace app\controllers;

use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction()
    {
        $slides = R::findAll('slider');
        $this->set(compact('slides'));
    }
}