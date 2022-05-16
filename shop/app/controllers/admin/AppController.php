<?php

namespace app\controllers\admin;

use app\models\AppModel;
use axross\Controller;
use axross\App;
use app\widgets\language\Language;

class AppController extends Controller
{
    public false|string $layout = 'admin';

    public function __construct($route = [])
    {
        parent::__construct($route);
        new AppModel;
        $languages = App::$app->setProperty('languages', Language::getLanguages());
        $lang = App::$app->setProperty('language', Language::getLanguage($languages));
    }
}
