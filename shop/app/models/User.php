<?php


namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{

    public array $attributes = [
        'email' => '',
        'password' => '',
        'name' => '',
        'address' => '',
    ];

    public array $rules = [
        'required' => ['email', 'password', 'name', 'address'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6]
        ]
    ];

    public array $labels = [
        'email' => 'tpl_signup_email_input',
        'password' => 'tpl_signup_password_input',
        'name' => 'tpl_signup_name_input',
        'address' => 'tpl_signup_address_input',
    ];

    public static function check_auth(): bool
    {
        return isset($_SESSION['user']);
    }


    public function checkUnique($text_error = '')
    {
        $user = R::findOne('user', 'email = ?', [$this->attributes['email']]);
        if ($user) {
            $this->errors['unique'][] = $text_error ?: gt('user_signup_error_email_unique');
            return false;
        }
        return true;
    }


    public function login($is_admin = false)
    {
        $email = isset($_POST['email']) ? trim((string)$_POST['email']) : '';
        $password = isset($_POST['password']) ? trim((string)$_POST['password']) : '';
        if ($email && $password) {
            if ($is_admin) {
                $user = R::findOne('user', "email = ? AND role = 'admin'", [$email]);
            } else {
                $user = R::findOne('user', "email = ?", [$email]);
            }

            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $k => $value) {
                        if (!$k !== 'password') {
                            $_SESSION['user'][$k] = $value;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public function signup($data, $lang, $success = 'user_signup_success_register', $errors = 'user_signup_error_register')
    {
        $this->load($data);
        if (!$this->validate($data, $lang) || !$this->checkUnique()) {
            $this->getValidationErrors();
            $_SESSION['form_data'] = $data;
            redirect();
        } else {
            $this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
            if ($user_id = $this->save('user')) {
                $_SESSION['success'] = gt($success);
            } else {
                $_SESSION['errors'] = gt($errors);
                redirect();
            }
            return $user_id;
        }
    }

    public function get_count_orders($user_id): int
    {
        return R::count('orders', 'user_id = ?', [$user_id]);
    }


    public function get_user_orders($start, $perpage, $user_id): array
    {
        return R::getAll("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC LIMIT $start, $perpage", [$user_id]);
    }

    public function get_user_order($order_id, $user_id): array
    {
        return R::getRow("SELECT o.*, op.* FROM orders o JOIN order_product op on o.id = op.order_id WHERE o.id = ? AND o.user_id = ?", [$order_id, $user_id]);
    }
}
