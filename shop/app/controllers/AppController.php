<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\language\Language;
use axross\App;
use axross\Controller;
use RedBeanPHP\R;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        $languages = App::$app->setProperty('languages', Language::getLanguages());
        $lang = App::$app->setProperty('language', Language::getLanguage($languages));
        \axross\Language::load($lang['code'], $this->route);

        $categories = R::getAssoc("SELECT c.*, cd.* FROM category c JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = ?", [$lang['id']]);
        App::$app->setProperty("categories_{$lang['code']}", $categories);
    }

}