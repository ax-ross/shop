<?php

namespace app\models\admin;

use app\models\AppModel;
use axross\App;
use RedBeanPHP\R;

class Product extends AppModel
{
    public function get_products($lang, $start, $perpage): array
    {
        return R::getAll("SELECT p.*, pd.title FROM product p JOIN product_description pd on p.id = pd.product_id WHERE pd.language_id = ? LIMIT $start, $perpage", [$lang['id']]);
    }

    public function get_downloads($q): array
    {
        $data = [];
        $data['items'] = [];
        $downloads = R::getAssoc("SELECT download_id, name FROM download_description WHERE name LIKE ? LIMIT 10", ["%{$q}%"]);
        if ($downloads) {
            $i = 0;
            foreach ($downloads as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        return $data;
    }

    public function product_validate(): bool
    {
        $errors = '';
        if (!is_numeric($_POST['price']) || $_POST['price'] < 0) {
            $errors .= 'Цена должна быть положительным числом<br>';
        }
        if (!is_numeric($_POST['old_price']) || $_POST['price'] < 0) {
            $errors .= 'Старая цена должна быть положительным  числом<br>';
        }

        foreach ($_POST['product_description'] as $lang_id => $item) {
            $item['title'] = trim($item['title']);
            $item['excerpt'] = trim($item['excerpt']);
            if (empty($item['title'])) {
                $errors .= "Не заполнено Наименование во вкладке {$lang_id}<br>";
            }
            if (empty($item['excerpt'])) {
                $errors .= "Не заполнено Краткое описание во вкладке {$lang_id}<br>";
            }
            if (empty($item['content'])) {
                $errors .= "Не заполнено Описание товара во вкладке {$lang_id}<br>";
            }
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }

    public function save_product(): bool
    {
        $lang = App::$app->getProperty('language')['id'];
        R::begin();
        try {
            $product = R::dispense('product');
            $product->category_id = $_POST['parent_id'] == 0 ? null : (int)$_POST['parent_id'];
            $product->price = isset($_POST['price']) ? (int)$_POST['price'] : 0;
            $product->old_price = isset($_POST['old_price']) ? (int)$_POST['price'] : 0;
            $product->status = isset($_POST['status']) ? 1 : 0;
            $product->hit = isset($_POST['hit']) ? 1 : 0;
            $product->img = $_POST['img'] ?: NO_IMAGE;
            $product->is_download = isset($_POST['is_download']) ? 1 : 0;
            $product_id = R::store($product);
            $product->slug = AppModel::create_slug('product', 'slug', $_POST['product_description'][$lang]['title'], $product_id);
            R::store($product);

            foreach ($_POST['product_description'] as $lang_id => $item) {
                R::exec("INSERT INTO product_description (product_id, language_id, title, content, excerpt, keywords, description) VALUES (?, ?, ?, ?, ?, ?, ?)", [
                    $product_id, $lang_id, $item['title'], $item['content'], $item['excerpt'], $item['keywords'], $item['description']
                ]);
            }

            if (isset($_POST['gallery']) && is_array($_POST['gallery'])) {
                $sql = "INSERT INTO product_gallery (product_id, img) VALUES ";
                foreach ($_POST['gallery'] as $item) {
                    $sql .= "({$product_id}, ?),";
                }
                $sql = rtrim($sql, ',');
                R::exec($sql, $_POST['gallery']);
            }

            if ($product->is_download) {
                $download_id = $_POST['is_download'];
                R::exec("INSERT INTO product_download (product_id, download_id) VALUES (?, ?)", [$product_id, $download_id]);
            }
            R::commit();
            return true;
        } catch (\Exception $e) {

            R::rollback();
            $_SESSION['form_data'] = $_POST;
            return false;
        }
    }

}