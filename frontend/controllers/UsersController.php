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
       // $company = Company::find()->where(1)->joinWith('contacts')->one();
       // $contacts = $company->contacts;
       //*** 
        $query = User::find()
                ->where(['user.role' => '0'])
                ->joinWith('userstatistic')
                ->innerJoinWith('categories')
                ->joinWith('tasks')
                ->joinWith('reviews')
                ->orderBy(['user.created_at' => SORT_DESC]);
                //->limit(3) -  запрос при выборке с limit(3) выгружает только первый элемент - первого по сортировке user'a 
            
         
        $users = $query->all();


 /*  foreach ($users as $user) {
    
            $last_visit = $users->last_visit;
        
        }*/

         //$last_visit = $users->userstatstic->last_visit;
         
     /*   $users = User::find()
            ->where(['user.role' => '0'])
            ->joinWith('userstatistic', 'userstatistic.user_id = user.id'  )

            //->joinWith ('userstatistic', 'userstatistic.user_id = user.id'  )
            //->joinWith ('tasks', 'task.executor_id = user.id')
            //->joinWith ('reviews', 'review.executor_id = user.id')
            ->orderBy(['user.created_at' => SORT_ASC])
            ->limit(3)
            ->all(); 

       // $tasks = Task::find()
        ->where(['executor_id = users['id']']); */


        return $this->render('index', ['users' => $users, 
                                      /* 'last_visit' => $last_visit*/]);
    }

/*
    public function actionIndex()
    {
        $query = new Query();

        $query->from('user')
            ->where(['user.role' => '0'])
            ->join('INNER JOIN', 'userstatistic', 'userstatistic.user_id = user.id'  )
            ->orderBy(['user.created_at' => SORT_ASC])
            ->limit(3);        

        $users = $query->all();

        foreach ($users as $user) {
        
        // определяем кол-во заданий исполнителя 
            
            $tasks = Task::find()
                    ->where(['executor_id' => $user['id']])
                    ->asArray()
                    ->all();
                    
            $tasks_count = count($tasks);
      
        // определяем кол-во отзывов об исполнителе  
            $reviews = Review::find()
                    ->where(['executor_id' => $user['id']])
                    ->asArray()
                    ->all();
                    
            $reviews_count = count($reviews);
            $users_total[] = $reviews;
        // определяем рейтинг исполнителя = среднее арифметическое от значения 'rate_stars'

            $rate_stars = Review::find()
                    ->where(['executor_id' => $user['id']])
                    ->select('rate_stars')
                    ->asArray()
                    ->all();

            $rate_stars_count = count($rate_stars);

            $users_total[] = $reviews; 

            foreach ($rate_stars as $value) {
               $value = (float)$value;
            }
            
            //$int_stars = array_map('float', $rate_stars);  
           
            $stars = array_sum(array_column($rate_stars, 'rate_stars');// count($rate_stars);


        //определяем время, прошедшее после последнего посещения сайта исполнителем

            $time_delta = User::lostTime($user['last_visit']);

            //?? как вывести из цикла значения $tasks_count, $reviews_count  и $time_delta для КАЖДОГО из исполнителей из $users?? 
            // выводится только последнее значение, для последнего по выборке исполнителя
            // надо бы их как-то добавлять в массив $users, чтобы потом в шаблоне легко было выводить... но пока не получилось. 
        
        } 

        return $this->render('index', ['users' => $users,'tasks_count' => $tasks_count, 'reviews' => $reviews, 'rate_stars' => $rate_stars, 'stars' => $stars, 'int_stars' => $int_stars,'rate_stars_count' => $rate_stars_count, 'rate_stars' => $rate_stars, 'reviews_count' => $reviews_count, 'time_delta' => $time_delta, 'tasks' => $tasks, 'categories' =>$categories ]);
 
    }
*/
    
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
   