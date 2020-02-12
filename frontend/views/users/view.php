<?php

/* @var $this yii\web\View */
/* @var $users */

use app\models\Users;
use app\models\Profiles;
use yii\web\Controller;
use frontend\controllers\UsersController;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Исполнитель';

$this->users = $users;
?>
<h1> User Page is expected </h1>


<h2> <?= $user->userName; ?></h2>	

	
<h3>Контакты</h3>

	<li><?= $user->email; ?></li>
	

