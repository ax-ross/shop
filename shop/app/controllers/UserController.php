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

    public function orderAction()
    {
        if (!User::check_auth()) {
            redirect(base_url() . 'user/login');
        }

        $order_id = abs((int)$_GET['id']);
        $user_id = $_SESSION['user']['id'];
        $order = $this->model->get_user_order($order_id, $user_id);
        if (!$order) {
            throw new \Exception('Not found order', 404);
        }

        $this->setMeta(gt('user_order_title'));
        $this->set(compact('order'));
    }


    public function filesAction()
    {
        if (!User::check_auth()) {
            redirect(base_url() . 'user/login');
        }

        $lang = App::$app->getProperty('language');
        $page = isset($_GET['page']) ? abs((int)$_GET['page']) : 1;
        $perpage = App::$app->getProperty('pagination');
        $user_id = $_SESSION['user']['id'];
        $total = $this->model->get_count_files($user_id);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $files = $this->model->get_user_files($user_id, $start, $perpage, $lang);
        $this->setMeta(gt('user_files_title'));
        $this->set(compact('files', 'pagination', 'total'));
    }

    public function downloadAction()
    {
        if (!User::check_auth()) {
            redirect(base_url() . 'user/login');
        }

        $id = abs((int)$_GET['id']);
        $lang = App::$app->getProperty('language');
        $user_id = $_SESSION['user']['id'];
        $file = $this->model->get_user_file($id, $user_id, $lang);
        if ($file) {
            $path = WWW . "/downloads/{$file['filename']}";
            if (file_exists($path)) {
                header('Content-Type: applocation/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($file['original_name'] . '"'));
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($path));
                readfile($path);
                exit();
            } else {
                $_SESSION['errors'] = gt('user_download_error');
            }
        }
        redirect();
    }
}
