<?php


namespace app\controllers;

use app\models\User;

class UserController extends AppController
{


    public function signupAction()
    {
        if (User::check_auth()) {
            redirect(base_url());
        }

        if (!empty($_POST)) {
            $data = $_POST;
            $this->model->load($data);
        }

        $this->setMeta(gt('tpl_signup'));
    }


}