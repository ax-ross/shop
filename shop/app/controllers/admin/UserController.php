<?php


namespace app\controllers\admin;

use app\models\admin\User;
use axross\App;
use axross\Pagination;
use RedBeanPHP\R;

/**
 * @property User $model;
 */
class UserController extends AppController
{

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = R::count('user');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $users = $this->model->get_users($start, $perpage);
        $title = 'Список пользователей';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'pagination', 'total', 'users'));

    }

    public function viewAction()
    {
        $id = (int)$_GET['id'];
        $user = $this->model->get_user($id);
        if (!$user) {
            throw new \Exception('Not found user', 404);
        }
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = $this->model->get_count_orders($id);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $orders = $this->model->get_user_orders($start, $perpage, $id);
        $title = 'Профиль пользователя';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'pagination', 'total', 'orders', 'user'));
    }

    public function editAction()
    {
        $id = (int)$_GET['id'];
        $user = $this->model->get_user($id);
        if (!$user) {
            throw new \Exception('Not found user', 404);
        }

        if (!empty($_POST)) {

            $data = $_POST;
            $this->model->load($data);
            if (empty($this->model->attributes['password'])) {
                unset($this->model->attributes['password']);
            }
            $lang = App::$app->getProperty('language');
            if (!$this->model->validate($this->model->attributes, $lang) || !$this->model->checkEmail($user)) {
                $this->model->getValidationErrors();
            } else {
                if (!empty($this->model->attributes['password'])) {
                    $this->model->attributes['password'] = password_hash($this->model->attributes['password'], PASSWORD_DEFAULT);
                }
                if ($this->model->update('user', $id)) {
                    $_SESSION['success'] = 'Данные пользователя обновлены';
                } else {
                    $_SESSION['errors'] = 'Ошибка обновления профиля пользователя';
                }
            }
            redirect();
        }
        $title = 'Редактирование пользователя';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'user'));
    }

    public function loginAdminAction()
    {

        if ($this->model::isAdmin()) {
            redirect(ADMIN);
        }

        $this->layout = 'login';
        if (!empty($_POST)) {

            if ($this->model->login(true)) {
                $_SESSION['success'] = 'Вы успешно авторизованы';
            } else {
                $_SESSION['errors'] = 'Логин/пароль введены не верно';
            }
            if ($this->model->isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
    }

    public function logoutAction()
    {
        if ($this->model::isAdmin()) {
            unset($_SESSION['user']);
        }
        redirect(ADMIN . '/user/login-admin');
    }
}
