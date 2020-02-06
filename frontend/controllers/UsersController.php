<?php

namespace frontend\controllers;

use frontend\models\Users;
use frontend\models\Category;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class UsersController extends \yii\web\Controller
{  
    public function actionIndex()
    {
        
      $user = new Users();
        $user->email = 'petrov.ivan@mail.ru';
        $user->name = 'Petrov Ivan';
        $user->password = '789456_23';

        $user->dt_add = '22.01.2020';
        // сохранение модели в базе данных
        $user->insert();
        return $this->render('index', ['user' => $user]);
    }
     
    /*

    public function actionIndex()
    {
        $users = Users::findAll([102,104,106,108,120]);
        
        if ($users) {
        	print($user->email);
            print($user->name);
            print($user->password);
            print($user->dt_add);
        }
        
        return $this->render('index', ['users' => $users]);
    } */
    public function actionView($id)
    {
        $user = Users::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }
        return $this->render('view', ['users' => $user]);
    }

    public function actionFilter($category)
    {
        $users = Users::findAll(['category' => $category]);
        return $this->render('index', ['users' => $users]);
    }

}
