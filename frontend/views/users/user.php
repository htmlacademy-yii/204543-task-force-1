<?php

/* @var $this yii\web\View */
/* @var $user */

use app\models\User;
use app\models\Profile;
use yii\web\Controller;
use frontend\controllers\UsersController;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Исполнитель';

?>
			<section class="content-view">

				<?php foreach($users as $user): ?>

                <div class="user__card-wrapper">
                    <div class="user__card">
                        <img src="./img/man-hat.png" width="120" height="120" alt="Аватар пользователя">
                         <div class="content-view__headline">
                            <h1><?= Html::encode($user->full_name); ?></h1>
                             <p><?= Html::encode($user->address); . ',' .$user->getYears($user->birthdate); ?>лет</p>
                            <div class="profile-mini__name five-stars__rate">
                                <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                                <b><?= Html::encode($user->rating()); ?></b>
                            </div>
                            <b class="done-task">Выполнил <?= Html::encode($user->tasksCount()); ?> заказов</b><b class="done-review">Получил<?= Html::encode($user->tasksCount()); ?>отзывов</b>
                         </div>
                        <div class="content-view__headline user__card-bookmark user__card-bookmark--current">
                            <span>Был на сайте <?= Html::encode( $user->deltaTime($user->userstatistic->last_visit)); ?> назад</span>
                             <a href="#"><b></b></a>
                        </div>
                    </div>
                    <div class="content-view__description">
                        <p><?= Html::encode($user->about_user); ?></p>
                    </div>
                    <div class="user__card-general-information">
                        <div class="user__card-info">
                            <h3 class="content-view__h3">Специализации</h3>
                            <div class="link-specialization">

                              	<?php foreach ($user->categories as $category): ?>

                            		<a href="#" class="link-regular"><?=$category->name;?></a>

                        		<?php endforeach; ?>

                            </div>
                            <h3 class="content-view__h3">Контакты</h3>
                            <div class="user__card-link">
                                <a class="user__card-link--tel link-regular" href="#"><?= Html::encode($user->phone); ?>/a>
                                <a class="user__card-link--email link-regular" href="#"><?= Html::encode($user->email); ?></a>
                                <a class="user__card-link--skype link-regular" href="#"><?= Html::encode($user->skype); ?></a>
                            </div>
                         </div>
                        <div class="user__card-photo">
                            <h3 class="content-view__h3">Фото работ</h3>
                            <a href="#"><img src="./img/rome-photo.jpg" width="85" height="86" alt="Фото работы"></a>
                            <a href="#"><img src="./img/smartphone-photo.png" width="85" height="86" alt="Фото работы"></a>
                            <a href="#"><img src="./img/dotonbori-photo.png" width="85" height="86" alt="Фото работы"></a>
                         </div>
                    </div>
                </div>

                <?php endforeach; ?>
		<!-- END of user info -->

        <!-- БЛОК отзвов (review) start -->

                <div class="content-view__feedback">
                    <h2>Отзывы<span>(2)</span></h2>
                    <div class="content-view__feedback-wrapper reviews-wrapper">
                        <div class="feedback-card__reviews">
                            <p class="link-task link">Задание <a href="#" class="link-regular"><?= $task->title;?></a></p>
                            <div class="card__review">
                                <a href="#"><img src="./img/man-glasses.jpg" width="55" height="54"></a>
                                <div class="feedback-card__reviews-content">
                                    <p class="link-name link"><a href="#" class="link-regular"><?= $task->author; ?></a></p>
                                    <p class="review-text">
                                       <?= $task->reviews->reviews_content; ?>
                                    </p>
                                </div>
                                <div class="card__review-rate">
                                    <p class="five-rate big-rate"><?= $task->reviews->rate_stars; ?><span></span></p>
                                </div>
                            </div>
                        </div>
                            <div class="feedback-card__reviews">
                                <p class="link-task link">Задание <a href="#" class="link-regular">«Повесить полочку»</a></p>
                                <div class="card__review">
                                    <a href="#"><img src="./img/woman-glasses.jpg" width="55" height="54"></a>
                                    <div class="feedback-card__reviews-content">
                                        <p class="link-name link"><a href="#" class="link-regular">Морозова Евгения</a></p>
                                        <p class="review-text">
                                            Кумар приехал позже, чем общал и не привез с собой всех
                                            инстументов. В итоге пришлось еще ходить в строительный магазин.
                                        </p>
                                    </div>
                                    <div class="card__review-rate">
                                        <p class="three-rate big-rate">3<span></span></p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        <!-- БЛОК СООБЩЕНИЙ start -->
            <section class="connect-desk">
                <div class="connect-desk__chat">
                    <h3>Переписка</h3>
        <!-- Chats -->
                    <div class="chat__overflow">
                 <!--1st chat-->
                        <div class="chat__message chat__message--out">
                            <p class="chat__message-time"><?= 'время чата'; ?></p>
                            <p class="chat__message-text"><?= 'текст_01';?></p>
                        </div>
                <!--2nd chat-->
                        <div class="chat__message chat__message--in">
                            <p class="chat__message-time">10.05.2019, 14:57</p>
                            <p class="chat__message-text">На задание
                                выделены всего сутки, так что через час</p>
                        </div>
                        <div class="chat__message chat__message--out">
                            <p class="chat__message-time">10.05.2019, 14:57</p>
                            <p class="chat__message-text">Хорошо. Думаю, мы справимся</p>
                        </div>
                    </div>
                <!--Форма для сообщения-->
                    <p class="chat__your-message">Ваше сообщение</p>
                    <form class="chat__form">
                        <textarea class="input textarea textarea-chat" rows="2" name="message-text" placeholder="Текст сообщения"></textarea>
                        <button class="button chat__button" type="submit">Отправить</button>
                    </form>
                </div>
            </section>
            <!-- БЛОК СООБЩЕНИЙ end -->