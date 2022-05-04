<?php


namespace app\models;

use axross\App;
use RedBeanPHP\R;

class Category extends AppModel
{


    public function get_category($slug, $lang): array
    {
        return R::getRow("SELECT c.*, cd.* FROM category c JOIN category_description cd on c.id = cd.category_id WHERE c.slug = ? AND cd.language_id = ?", [$slug, $lang['id']]);
    }


    public function get_child_ids($id): string
    {
        $lang = App::$app->getProperty('language')['code'];
        $categories = App::$app->getProperty("categories_{$lang}");
        $child_ids = '';
        foreach ($categories as $k => $v) {
            if ($v['parent_id'] == $id) {
                $child_ids .= $k . ',';
                $child_ids .= $this->get_child_ids($k);
            }
        }
        return $child_ids;
    }

    public function get_products($child_ids, $lang): array
    {
        return R::getAll("SELECT p.*, pd.* FROM product p JOIN product_description pd on p.id = pd.product_id WHERE p.status = 1 AND p.category_id IN ($child_ids) AND pd.language_id = ?", [$lang['id']]);
    }

}