<?php

namespace app\controllers\admin;

use app\models\admin\User;
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


        if (!User::isAdmin() && $route['action'] != 'login-admin') {
            redirect(ADMIN . '/user/login-admin');
        }

        new AppModel;
        $languages = App::$app->setProperty('languages', Language::getLanguages());
        $lang = App::$app->setProperty('language', Language::getLanguage($languages));
    }
}
