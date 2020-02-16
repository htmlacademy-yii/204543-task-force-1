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
     public function actionJson() {
        $users = User::find()->asArray()->all();
        $response = Yii::$app->response;
        $response->data = $users;
        $response->format = Response::FORMAT_JSON;
        return $response;
    }


    public function actionIndex()
    {

        $users = User::findAll([102,103,112,113]);
           
        // выполнить запрос и получить результат в виде двухмерного массива
     
           

        
        return $this->render('index', ['users' => $users]);
    }

    //actionView($id) - запрос к таблицe User для страницы user/view/id
    public function actionView()
    {
        $user = User::findOne(113);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=113 не найден");
        }
        return $this->render('view', ['user' => $user]);
    }

    
   
}
