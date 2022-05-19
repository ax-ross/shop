<?php

namespace app\controllers\admin;

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
}
