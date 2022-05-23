<?php

namespace app\controllers\admin;


use app\models\admin\Category;
use axross\App;

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
                if ($this->model->save_category()) {
                    $_SESSION['success'] = 'Категория сохранена';
                } else {
                    $_SESSION['errors'] = 'Ошибка!';
                }
            }
            redirect();
        }
        $title = 'Добавление категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }

    /**
     * @throws \Exception
     */
    public function editAction()
    {
        $id = (int)$_GET['id'];
        if (!empty($_POST)) {
            if ($this->model->category_validate()) {
                if ($this->model->update_category($id)) {
                    $_SESSION['success'] = 'Категория успешно обновлена';
                } else {
                    $_SESSION['errors'] = 'Ошибка';
                }
            }
            redirect();
        }
        $category = $this->model->get_category($id);
        if (!$category) {
            throw new \Exception('Not found category', 404);
        }
        $lang = App::$app->getProperty('language')['id'];
        App::$app->setProperty('parent_id', $category[$lang]['parent_id']);
        $title = 'Редактирование категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'category'));
    }
}
