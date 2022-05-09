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
            $this->model->load($data);
            if (!$this->model->validate($data, $lang) ||!$this->model->checkUnique()) {
                $this->model->getValidationErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $this->model->attributes['password'] = password_hash($this->model->attributes['password'], PASSWORD_DEFAULT);
                if ($this->model->save('user')) {
                    $_SESSION['success'] = gt('user_signup_success_register');
                } else {
                    $_SESSION['errors'] = gt('user_signup_error_register');
                }
            }
            redirect();
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
