<?php

namespace app\controllers\admin;

use app\models\admin\Order;
use axross\App;
use axross\Pagination;
use RedBeanPHP\R;

/** @property Order $model */
class OrderController extends AppController
{
    public function indexAction()
    {
        $status = (isset($_GET['status']) && $_GET['status'] === 'new') ? ' status = 0 ' : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('orders', $status);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders = $this->model->get_orders($start, $perpage, $status);

        $title = "Список заказов";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'orders', 'pagination', 'total'));
    }
}