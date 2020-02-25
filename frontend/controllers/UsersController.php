<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\Profile;
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

        $query = new Query();
        $query->select(['u.full_name', 'u.created_at', 'u.about_user'])->from('user u')
            ->where(['role' => '0'])
            ->join('INNER JOIN', 'profile p', 'p.user_id = u.id')
            ->orderBy(['u.created_at' => SORT_ASC])
            ->limit(3);
        
        $users = $query->all(); 
        
        return $this->render('index', ['users' => $users]);

    }

    
    //actionView($id) - запрос к таблицe User для страницы user/view/id
    public function actionView($id)
    {
        $query = new Query($id);

        $query->from(['user u', 'profile p'])
            ->where(['id' => $id])
            ->one($id);
            
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }

        $user = $query;

        return $this->render('view', ['user' => $user]);
    }
}    
   