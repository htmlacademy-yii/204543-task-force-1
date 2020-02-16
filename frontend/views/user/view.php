<?php

/* @var $this yii\web\View */
/* @var $user */

use app\models\User;
use app\models\Profile;
use yii\web\Controller;
use frontend\controllers\UserController;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Исполнитель';

?>

<h1> User Page is expected </h1>


<h2> <?= $user->userName; ?></h2>	

	
<h3>Контакты</h3>

	<p><?= $user->email; ?></p>
	

