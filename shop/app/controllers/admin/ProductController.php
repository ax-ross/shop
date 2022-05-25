<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use axross\App;
use axross\Pagination;
use RedBeanPHP\R;

/** @property Product $model */
class ProductController extends AppController
{
    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $page = isset($_GET['page']) ? abs((int)$_GET['page']) : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('product');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->get_products($lang, $start, $perpage);
        $title = 'Список товаров';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'products', 'pagination', 'total'));
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->product_validate()) {
                if ($this->model->save_product()) {
                    $_SESSION['success'] = 'Товар добавлен';
                } else {
                    $_SESSION['errors'] = 'Ошибка добавления товара';
                }

            }
            redirect();
        }
        $title = 'Новый товар';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }

    public function getDownloadAction()
    {
        $q = (string)$_GET['q'];
        $downloads = $this->model->get_downloads($q);
        echo json_encode($downloads);
        die();
    }


}