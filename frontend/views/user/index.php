<?php

/* @var $this yii\web\View */
/* @var $user */

use app\models\User;
use yii\web\Controller;
use frontend\controllers\UserController;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Пользователи';
?>
<h1> Once the Users list will be here!</h1>	

<pre>
	<ul>
		<li>КОНТАКТЫ</li>
		<li>Имя:     <?= $user->userName; ?></li>
		<li><?= $user->profile->about; ?></li>
		<li>Телефон: <?= $user->profile->phone; ?></li>
		<li>email:   <?= $user->email; ?></li>
		<li>skype:   <?= $user->profile->skype; ?></li>

	</ul>
</pre>



   
	
