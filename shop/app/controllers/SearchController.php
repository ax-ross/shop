<?php

namespace app\controllers;

use axross\App;
use axross\Pagination;

class SearchController extends AppController
{


    public function indexAction()
    {
        $search = (string)$_GET['search'];
        $lang = App::$app->getProperty('language');
        $page = isset($_GET['page']) ? abs((int)$_GET['page']) : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = $this->model->get_count_find_products($search, $lang);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->get_find_products($search, $lang, $start, $perpage);
        $this->setMeta(gt('tpl_search_title'));
        $this->set(compact('search', 'products', 'pagination', 'total'));
    }
}