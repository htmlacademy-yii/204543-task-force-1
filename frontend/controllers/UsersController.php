<?php

namespace frontend\controllers;

use app\models\Users;
use app\models\Category;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\Url;


class UsersController extends \yii\web\Controller

{  
    public function actionIndex()
    {
        
      $users = new Users();
        $users->email = 'robinson@bk.home';
        $users->userName = 'Antony Rob';
        $users->password = '14256_qwer';
        $users->dt_add = '2020-02-13';

        //проверяем, есть ли пользователь с таким же email
        $user = Users::findOne(['email' => $users->email]);
        if($user) {
             throw new NotFoundHttpException("Пользователь с таким email  уже зарегистрирован");
        }   else {
        // сохранение модели в базе данных} 
        $users->insert();
        }
        
        return $this->render('index', ['users' => $users]);
    }
    
    //actionView($id) - запрос к таблицt users для страницы users/view/id
    public function actionView($id)
    {
        $user = Users::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID=$id не найден");
        }
        return $this->render('view', ['user' => $user]);
    }

    //actionUser($id) - запрос к таблицам users и profiles для страницы users/user/id
    public function actionUser($id)
    {
        $profile = Profiles::find()->where($user_id)->joinWith('users')->one($id);

        $users = $profile->users;

        return $this->render('user', ['user' => $users]);
    }

   


/*
    public function actionUser    {
        $query = new Query();
        
        $query->select('u.email', 'u.userName')->from('users u')
            ->join('INNER JOIN', 'profiles p', 'p.about', 'p.phone', 'p.skype', 'p.user_id = u.id');
           
        // выполнить запрос и получить результат в виде ассоциативного массива
        $rows = $query->one($id);

        return $this->render('user', ['user' => $row]);
    }
  */
}
