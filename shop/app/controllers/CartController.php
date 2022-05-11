<?php


namespace app\controllers;

use app\models\Order;
use app\models\User;
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
            $this->loadView('cart_modal');
        }
        redirect();
        return true;
    }

    public function showAction()
    {
        $this->loadView('cart_modal');
    }

    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        if (isset($_SESSION['cart'][$id])) {
            $this->model->delete_item($id);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }


    public function clearAction()
    {
        if (empty($_SESSION['cart'])) {
            return false;
        }

        $this->model->clear_cart();
        $this->loadView('cart_modal');
        return true;
    }


    public function viewAction()
    {
        $this->setMeta(gt('tpl_cart_title'));
    }

    public function checkoutAction()
    {
        $lang = App::$app->getProperty('language');
        if (!empty($_POST)) {
            if (!User::check_auth()) {
                $user = new User;
                $data = $_POST;
                $user_id =  $user->signup($data, $lang, '', 'cart_checkout_error_register');
            }

            $data['user_id'] = $user_id ?? $_SESSION['user']['id'];
            $data['note'] = (string)$_POST['note'];
            $user_email = $_SESSION['user']['email'] ?? (string)$_POST['email'];

            if (!$order_id = Order::saveOrder($data)) {
                $_SESSION['errors'] = gt('cart_checkout_error_save_order');
            } else {
                $_SESSION['success'] = gt('cart_checkout_order_success');
            }
        }
        redirect();
    }
}
