<?php

namespace frontend\controllers;


use frontend\models\Task;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\helpers\Url;

class TasksController extends \yii\web\Controller
{
      public function actionJson() 
     {
        $users = Task::find()->asArray()->all();
        $response = Yii::$app->response;
        $response->data = $tasks;
        $response->format = Response::FORMAT_JSON;
        return $response;
    }


    public function actionIndex()
    {

        $query = new Query();

        $query->from('task')
            ->where(['task_status' => 'new'])
            ->orderBy(['created_at' => SORT_ASC])
            ->limit(3);
        
        $tasks = $query->all(); 

        return $this->render('index', ['tasks' => $tasks]);

    }

}
