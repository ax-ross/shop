<?php

namespace app\controllers;

use axross\App;

class WishlistController extends AppController
{

    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $products = $this->model->get_wishlist_products($lang);
        $this->setMeta(gt('wishlist_index_title'));
        $this->set(compact('products'));
    }


    public function addAction()
    {
        $id = $_GET['id'];
        if (!$id) {
            $answer = ['result' => 'error', 'text' => gt('tpl_wishlist_add_error')];
            exit(json_encode($answer));
        }

        $product = $this->model->get_product($id);
        if ($product) {
            $this->model->add_to_wishlist($id);
            $answer = ['result' => 'success', 'text' => gt('tpl_wishlist_add_success')];
        } else {
            $answer = ['result' => 'error', 'text' => gt('tpl_wishlist_add_error')];
        }
        exit(json_encode($answer));
    }
}