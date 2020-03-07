<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\Task;
use frontend\models\Review;
use frontend\models\Category;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\Url;


class UsersController extends \yii\web\Controller

{  
     public function actionJson() 
     {
        $users = User::find()->asArray()->all();
        $response = Yii::$app->response;
        $response->data = $users;
        $response->format = Response::FORMAT_JSON;
        return $response;
    }


     public function actionIndex()
    {
        $query = User::find()
            ->where(['user.role' => '0'])
            ->joinWith('userstatistic')
            ->innerJoinWith('categories')
            ->joinWith('tasks')
            ->joinWith('reviews')
            ->orderBy(['user.created_at' => SORT_DESC]);
            //->limit(3) -  запрос при выборке с limit(3) выгружает только первый элемент - первого по сортировке user'a 
  
        $users = $query->all();

        return $this->render('index', ['users' => $users]);
    }


    
    //actionView($id) - запрос к таблицe User для страницы user/view/id
    public function actionView($id)
    {
        $query = new Query($id);

        $query->User::find()->joinWith('profile')->innerJoinWith('categories')->joinWith('tasks')->where(['user.id' => $id])->one();
            
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }

        $user = $query;

        return $this->render('view', ['user' => $user]);
    }
}    
   