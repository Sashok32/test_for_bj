<?php

namespace controllers;

use models\User;
use widgets\Helper;

class UserController extends Controller
{

    public function Login () {
        $login = $_POST['login'] ?? '';
        $pass = $_POST['password'] ?? '';
        $errorMessage = '';
        if (!empty($login) && !empty($pass)) {
            if (User::login($login, $pass)) {
                Helper::setFlush('Вход выполнен');
                header('Location: /');
            } else {
                $errorMessage = 'Неверно введенный логин или пароль';
            }
        }
        return $this->render('login', ['error' => $errorMessage]);
    }

    public function Logout () {
        unset($_SESSION['admin']);
        session_destroy();
        header('Location: /');
    }

}