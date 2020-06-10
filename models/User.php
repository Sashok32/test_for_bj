<?php


namespace models;


/**
 * Class User
 * @package models
 */
class User extends Model
{

    public static function tableName() {
        return 'users';
    }

    public static function login($login, $pass) {
        $table = static::tableName();
        $login = (string)$login;
        $pass = md5($pass);
        $query = \MVC::getBase()->connection()->query("SELECT * FROM $table WHERE user = '{$login}' AND password = '{$pass}'")->fetch();

        if (!empty($query) && $query['user'] == 'admin') {
            $_SESSION['admin'] = $query['user'];
            $_SESSION['email'] = $query['email'];
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin() {
        if (!empty($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }
    public static function userName() {
        if (self::isAdmin()) {
            return $_SESSION['admin'];
        }
    }
    public static function userEmail() {
        if (self::isAdmin()) {
            return $_SESSION['email'];
        }
    }
}