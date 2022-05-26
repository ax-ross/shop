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

    public function editAction()
    {
        $id = (int)$_GET['id'];
        if (isset($_GET['status'])) {
            $status = (int)$_GET['status'];
            if ($this->model->change_status($id, $status)) {
                $_SESSION['success'] = 'Статус заказа успешно изменён';
            } else {
                $_SESSION['errors'] = 'Не удалось изменить статус закза';
            }
        }

        $order = $this->model->get_order($id);
        if (!$order) {
            throw new \Exception('Not found order', 404);
        }

        $title = "Заказ № {$id}";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'order'));
    }
}