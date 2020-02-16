<?php

namespace frontend\controllers;

use app\models\User;
use app\models\Profile;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\Url;


class UserController extends \yii\web\Controller

{  
    public function actionIndex()
    {
       $user = User::findOne(112);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=112 не найден");
        }

     

                  
        return $this->render('index', ['user' => $user]);
    }
    
    //actionView($id) - запрос к таблицe User для страницы User/view/id
    public function actionView($id)
    {
        $user = User::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }
        return $this->render('view', ['user' => $user]);
    }

    //actionUser($id) - запрос к таблицам users и profiles для страницы users/user/id
   
}
