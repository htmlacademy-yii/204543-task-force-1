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
$this->id = 112;
$this->user = $user;
?>
<h1> User Page is expected </h1>

<?= foreach ($user as $user) {
            echo $user->userName, $user->email, $user->profiles->about, $user->profiles->phone, $users->profiles->skype;
        } ?>
<h1> <?= $user->userName; ?></h1>	


<p>	<?= $user->profiles->about; ?></p>
	
<h3>Контакты</h3>
<ul>
	<li><?= $user->profile->phone; ?></li>
	<li><?= $user->email; ?></li>
	<li><?= $user->profile->skype; ?></li>
</ul>
