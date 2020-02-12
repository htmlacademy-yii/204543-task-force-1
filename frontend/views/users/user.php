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
$this->id = 112;
$this->users = $users;
?>
<h1> User Page is expected </h1>

<?= foreach ($users as $user) {
            echo $user->userName, $user->email, $user->profiles->about, $user->profiles->phone, $users->profiles->skype;
        } ?>
<h1> <?= $user->userName; ?></h1>	


<p>	<?= $user->profiles->about; ?></p>
	
<h3>Контакты</h3>
<ul>
	<li><?= $user->profiles->phone; ?></li>
	<li><?= $user->email; ?></li>
	<li><?= $users->profiles->skype; ?></li>
</ul>
