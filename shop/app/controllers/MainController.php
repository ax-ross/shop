<?php

namespace app\controllers;

use axross\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $names = $this->model->get_names();
        $this->set(compact('names'));
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
    }
}