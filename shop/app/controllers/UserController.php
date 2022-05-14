<?php


namespace app\controllers;

use app\models\User;
use axross\App;
use axross\Pagination;

class UserController extends AppController
{


    public function signupAction()
    {
        $lang = App::$app->getProperty('language');
        if (User::check_auth()) {
            redirect(base_url());
        }

        if (!empty($_POST)) {
            $data = $_POST;
            $this->model->signup($data, $lang);
            redirect(base_url());
        }



        $this->setMeta(gt('tpl_signup'));
    }


    public function loginAction()
    {
        $lang = App::$app->getProperty('language');
        if (User::check_auth()) {
            redirect(base_url());
        }

        if (!empty($_POST)) {
            if ($this->model->login()) {
                $_SESSION['success'] = gt('user_login_success_login');
                redirect(base_url());
            } else {
                $_SESSION['errors'] = gt('user_login_error_login');
                redirect();
            }
        }

        $this->setMeta(gt('tpl_login'));
    }

    public function logoutAction()
    {
        if (User::check_auth()) {
            unset($_SESSION['user']);
        }
        redirect(base_url() . 'user/login');
    }


    public function cabinetAction()
    {
        if (!User::check_auth()) {
            redirect(base_url() . 'user/login');
        }
        $this->setMeta(gt('tpl_cabinet'));
    }

    public function ordersAction()
    {
        if (!User::check_auth()) {
            redirect(base_url() . 'user/login');
        }

        $page = isset($_GET['page']) ? abs((int)$_GET['page']) : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = $this->model->get_count_orders($_SESSION['user']['id']);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders =$this->model->get_user_orders($start, $perpage, $_SESSION['user']['id']);
        
        $this->setMeta(gt('user_orders_title'));
        $this->set(compact('orders', 'pagination', 'total'));
    }
}
