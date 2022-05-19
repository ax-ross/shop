<?php

namespace app\models\admin;

use axross\Model;
use RedBeanPHP\R;

class Category extends Model
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
}
