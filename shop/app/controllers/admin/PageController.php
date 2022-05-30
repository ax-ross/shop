<?php

namespace app\controllers\admin;

use app\models\admin\Page;
use axross\App;
use axross\Pagination;
use RedBeanPHP\R;

/** @property Page $model */
class PageController extends AppController
{
    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('page');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $pages = $this->model->get_pages($lang, $start, $perpage);
        $title = "Список страниц";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'pages', 'pagination', 'total'));

    }

    public function deleteAction()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : '';
        if ($this->model->delete_page($id)) {
            $_SESSION['success'] = 'Страница успешно удалена';
        } else {
            $_SESSION['errors'] = 'Ошибка удаления страницы';
        }
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->page_validate()) {
                if ($this->model->save_page()) {
                    $_SESSION['success'] = 'Страница успешно добавлена';
                } else {
                    $_SESSION['errors'] = 'Ошибка добавления страницы';
                }
            }
            redirect();
        }
        $title = "Добавление страницы";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }

    public function editAction()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : '';
        if (!empty($_POST)) {
            if ($this->model->page_validate()) {
                if ($this->model->update_page($id)) {
                    $_SESSION['success'] = 'Страница успешно обновлена';
                } else {
                    $_SESSION['errors'] = 'Ошибка обновления страницы';
                }
            }
            redirect();
        }

        $page = $this->model->get_page($id);
        if (!$page) {
            throw new  \Exception('Page not found', 404);
        }
        $title = "Редактирование страницы";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'page'));
    }
}