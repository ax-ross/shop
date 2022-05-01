<?php


namespace app\controllers;

use axross\App;

class CartController extends AppController
{


    public function addAction()
    {
        $lang = App::$app->getProperty('language');
        $id = (int)$_GET['id'];
        $amount = (int)$_GET['amount'];
        
        if (!$id) {
            return false;
        }

        $product = $this->model->get_product($id, $lang);
        if (!$product) {
            return false;
        }

        $this->model->add_to_cart($product, $amount);
        if ($this->isAjax()) {
            debug($_SESSION['cart'], 1);
        }
        redirect();
        return true;
    }
}