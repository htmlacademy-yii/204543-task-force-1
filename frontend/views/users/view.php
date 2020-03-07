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
<h2> <?= $user->full_name; ?></h2>	
</pre>

<pre>
	<ul>
		<li>КОНТАКТЫ</li>
		<li><?= $user->about_user; ?></li>
		<li>Телефон: <?= $user->phone; ?></li>
		<li>email:   <?= $user->email; ?></li>
		<li>skype:   <?= $user->skype; ?></li>
	</ul>
</pre>

