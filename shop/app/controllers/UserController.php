<?php


namespace app\controllers;

use app\models\User;
use axross\App;

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
}
