<?php

namespace app\controllers;

class WishlistController extends AppController
{


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