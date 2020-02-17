<?php

/* @var $this yii\web\View */
/* @var $user */

use app\models\User;
use yii\web\Controller;
use frontend\controllers\UserController;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Регистрация завершена успешно';
?>
<h2> Dear <?= $newUser->userName; ?>! </br>Your are a member of Taskforce team!</h2>	
