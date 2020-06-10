<?php


namespace models;

use models\User;


/**
 * Class Exercises
 * @package models
 */
class Exercises extends Model
{

    public static function updateTask($params = []) {
        $table = static::tableName();

        if (!empty($params) && is_array($params)) {
            extract($params);
            if (!empty($id) && !empty($exercise) && isset($done) && isset($updated)) {
                if (\MVC::getBase()->connection()->prepare("UPDATE {$table} SET exercise = '{$exercise}', done = {$done}, updated = {$updated} where id = {$id}")->execute()) {
                    return true;
                }
            }
        }
    }

    public static function createTask($params = []) {
        $table = static::tableName();

        if (!empty($params) && is_array($params)) {
            extract($params);
            if (User::isAdmin()) {
                $name = User::userName();
                $email = User::userEmail();
            }
            if (!empty($name) && !empty($email) && isset($exercise)) {

                if (\MVC::getBase()->connection()->prepare("INSERT INTO {$table} (name, email, exercise) VALUES ('{$name}', '{$email}', '{$exercise}')")->execute()) {
                    return true;
                }
            }
        }

    }

}