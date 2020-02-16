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
        <li>ИСПОЛНИТЕЛИ</li>
        
        <?php foreach($users as $user): ?> 
        
        <li><?= $user->userName; ?></li> 
        
        <?php endforeach; ?> 

    </ul>
</pre>



   
	
