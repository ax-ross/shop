<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\language\Language;
use axross\App;
use axross\Controller;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        $languages = App::$app->setProperty('languages', Language::getLanguages());
        $lang = App::$app->setProperty('language', Language::getLanguage($languages));
        \axross\Language::load($lang['code'], $this->route);
    }

}