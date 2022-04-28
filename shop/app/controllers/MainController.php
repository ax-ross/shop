<?php

namespace app\controllers;

use axross\App;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction()
    {
        $lang = App::$app->getProperty('language');

        $slides = R::findAll('slider');

        $products = $this->model->get_hits($lang, 6);
        
        $this->set(compact('slides', 'products'));
        $this->setMeta("Главная страница", 'description', 'keywords');
    }
}