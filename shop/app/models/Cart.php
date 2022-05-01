<?php

namespace app\models;

use RedBeanPHP\R;

class Cart extends AppModel
{


    public function get_product($id, $lang): array
    {
        return R::getRow("SELECT p.*, pd.* FROM product p JOIN product_description pd on p.id = pd.product_id WHERE p.status = 1 AND p.id = ? AND pd.language_id = ?", [$id, $lang['id']]);
    }

    public function add_to_cart($product, $amount = 1)
    {
        $amount = abs($amount);

        if ($product['is_download'] && isset($_SESSION['cart'][$product['id']])) {
            return false;
        }

        if (isset($_SESSION['cart'][$product['id']])) {
            $_SESSION['cart'][$product['id']]['amount'] += $amount;
        } else {
            if ($product['is_download']) {
                $amount = 1;
            }
            $_SESSION['cart'][$product['id']] = [
                'title' => $product['title'],
                'slug' => $product['slug'],
                'price' => $product['price'],
                'amount' => $amount,
                'img' => $product['img'],
                'is_download' => $product['is_download'],
            ];
        }

        $_SESSION['cart.amount'] = !empty($_SESSION['cart.amount']) ? $_SESSION['cart.amount'] + $amount : $amount;
        $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] * $amount : $product['price'] * $amount;
        return true;
    }
}