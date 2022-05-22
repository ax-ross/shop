<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Category extends AppModel
{

    public function delete_category($id)
    {
        $errors = '';
        $children = R::count('category', 'parent_id = ?', [$id]);
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($children) {
            $errors .= 'Ошибка! В категории есть вложенные категории <br>';
        }
        if ($products) {
            $errors .= 'Ошибка! В категории есть товары <br>';
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            return false;
        } else {
            R::begin();
            try {
                $category = R::findOne('category', 'id = ?', [$id]);
                R::exec("DELETE FROM category_description WHERE category_id = ?", [$id]);
                R::trash($category);
                R::commit();
                $_SESSION['success'] = 'Категория удалена';
                return true;
            } catch (\Exception $e) {
                R::rollback();
                $_SESSION['errors'] = 'Ошибка удаления категории <br>';
                return false;
            }
        }
    }

    public function category_validate(): bool
    {
        $errors = '';
        foreach ($_POST['category_description'] as $lang_id => $item) {
            $item['title'] = trim($item['title']);
            if (empty($item['title'])) {
            $errors .=  "Не заполнено Наименование во вкладке {$lang_id}<br>";
            }
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }

    public function save_category(): bool
    {
        R::begin();
        try {
            $category = R::dispense('category');
            $category->parent_id = $_POST['parent_id'] == 0 ? null : (int)$_POST['parent_id'];
            $category_id = R::store($category);
            $category->slug = AppModel::create_slug('category', 'slug', $_POST['category_description'][1]['title'], $category_id);
            R::store($category);

            foreach ($_POST['category_description'] as $lang_id => $item) {
                R::exec("INSERT INTO category_description (category_id, language_id, title, description, keywords, content) VALUES (?, ?, ?, ?, ?, ?)", [
                    $category_id, $lang_id, $item['title'], $item['description'], $item['keywords'], $item['content']
                ]);
            }
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }
}
