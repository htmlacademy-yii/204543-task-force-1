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
                    
        return $this->render('index');
    }
    
    //actionView($id) - запрос к таблицt users для страницы users/view/id
    public function actionView($id)
    {
        $user = User::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }
        return $this->render('view', ['user' => $user]);
    }

    //actionUser($id) - запрос к таблицам users и profiles для страницы users/user/id
    public function actionUser($id)
    {
        $profile = Profile::find()->where($user_id)->joinWith('User')->one($id);

        $user = $profile->user;

        return $this->render('user', [ 'user' => $user]);
    }
/*
    public function actionUser    {
        $query = new Query();
        
        $query->select('u.email', 'u.userName')->from('user u')
            ->join('INNER JOIN', 'profile p', 'p.about', 'p.phone', 'p.skype', 'p.user_id = u.id');
           
        // выполнить запрос и получить результат в виде ассоциативного массива
        $rows = $query->one($id);

        return $this->render('user', ['user' => $row]);
    }
  */
}
