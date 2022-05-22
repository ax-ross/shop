<?php

namespace app\controllers\admin;


use app\models\admin\Category;

/** @property Category $model */
class CategoryController extends AppController
{
    public function indexAction()
    {
        $title = 'Категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }

    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        $this->model->delete_category($id);
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->category_validate()) {
                $_SESSION['success'] = 'Категория сохранена';
            }
            redirect();
        }
        $title = 'Добавление категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }
}
