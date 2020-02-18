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

<pre>
<h2> <?= $user->userName; ?></h2>	
</pre>

<pre>
	<ul>
		<li>КОНТАКТЫ</li>
		<li><?= $user->profile->about; ?></li>
		<li>Телефон: <?= $user->profile->phone; ?></li>
		<li>email:   <?= $user->email; ?></li>
		<li>skype:   <?= $user->profile->skype; ?></li>
	</ul>
</pre>

