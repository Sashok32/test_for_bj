<?php

namespace controllers;

use models\Exercises;
use models\User;
use widgets\Helper;

class TaskController extends Controller
{

        public function Update () {
            $id = $_GET['id'] ?? '';
            if (!empty($id) && empty($_POST)) {
                $error = 'Такой задачи в базе нет';
                $task = Exercises::findOne($id);
                if (!empty($task)) {
                    return $this->render('update', ['task' => $task, 'error' => '']);
                } else {
                    return $this->render('update', ['error' => $error]);
                }
            }

            if (!empty($_POST)) {
                if (!User::isAdmin()) {
                    return $this->render('update', ['task' => $_POST, 'noPermission' => true]);
                }
                if (Exercises::updateTask($_POST)) {
                        Helper::setFlush('Обновление задачи прошло успешно');
                        header('Location: /');
                }
            }
        }

    public function Create () {
        if (!empty($_POST)) {
            if (Exercises::createTask($_POST)) {
                Helper::setFlush('Добавление задачи прошло успешно');
                header('Location: /');
            }
        } else {
            return $this->render('create');
        }
    }


}