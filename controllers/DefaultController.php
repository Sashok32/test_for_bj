<?php

namespace controllers;

use models\Exercises;
use models\User;
use widgets\Paginator;
use widgets\Sort;

class DefaultController extends Controller
{

        public function Index () {

            $countModel = Exercises::countAll();

            $sort = new Sort([
                'name'=>'имя пользователя',
                'email'=>'email',
                'done'=>'статус',
            ]);

            $pages = new Paginator($countModel, '3');

            $model = Exercises::findAll([
                'sort' => $sort->sortBy(),
                'limit' => $pages->limit(),
                'offset' => $pages->offset(),
            ]);

            return $this->render('index', [
                        'model' => $model,
                        'viewSort' => $sort->viewSort(),
                        'viewPages' => $pages->viewPages(),
                    ]);
        }
}