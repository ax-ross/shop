<?php

namespace app\controllers\admin;

use app\models\admin\Download;
use axross\App;
use axross\Pagination;
use RedBeanPHP\R;

/** @property Download $model */
class DownloadController extends AppController
{
    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('download');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $downloads = $this->model->get_downloads($lang, $start, $perpage);

        $title = 'Цифровые товары';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'downloads', 'pagination', 'total'));
    }
}