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
            if (!$this->model->validate($data, $lang)) {
                $this->model->getValidationErrors();
            } else {
                $_SESSION['success'] = gt('user_signup_success_register');
            }
            redirect();
        }

        

        $this->setMeta(gt('tpl_signup'));
    }


}