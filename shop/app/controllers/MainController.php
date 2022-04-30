<?php

namespace app\controllers;

use axross\App;
use axross\Language;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction()
    {
        $lang = App::$app->getProperty('language');

        $slides = R::findAll('slider');

        $products = $this->model->get_hits($lang, 6);
        
        $this->set(compact('slides', 'products'));
        $this->setMeta(Language::get('main_index_meta_title'), Language::get('main_index_meta_description'), Language::get('main_index_meta_keywords'));
    }
}