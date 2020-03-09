<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id id пользователя
 * @property string $full_name имя и фамилия пользователя
 * @property string|null $created_at дата и время создания аккаунта
 * @property string $role роль: заказчик или исполнитель
 * @property string $password пароль к аккаунту
 * @property string $avatar URL аватара пользователя
 * @property string $about_user рассказ исполнителя о себе
 * @property string $birthdate дата рождения
 * @property int $town_id почтовый код города
 *
 * @property Chat[] $chats
 * @property Profile $profile
 * @property Respond[] $responds
 * @property Review[] $reviews
 * @property Review[] $reviews0
 * @property Task[] $tasks
 * @property Task[] $tasks0
 * @property Town $town
 * @property UserCategory[] $userCategories
 * @property Userevent[] $userevents
 * @property Userimage[] $userimages
 * @property Userstatistic $userstatistic
 */
class User extends \yii\db\ActiveRecord
{    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'role', 'password', 'avatar', 'about_user', 'birthdate', 'town_id'], 'required'],
            [['created_at', 'birthdate'], 'safe'],
            [['town_id'], 'integer'],
            [['full_name', 'avatar'], 'string', 'max' => 200],
            [['role', 'password'], 'string', 'max' => 100],
            [['about_user'], 'string', 'max' => 450],
            [['town_id'], 'exist', 'skipOnError' => true, 'targetClass' => Town::className(), 'targetAttribute' => ['town_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id пользователя'),
            'full_name' => Yii::t('app', 'имя и фамилия пользователя'),
            'created_at' => Yii::t('app', 'дата и время создания аккаунта'),
            'role' => Yii::t('app', 'роль: заказчик или исполнитель'),
            'password' => Yii::t('app', 'пароль к аккаунту'),
            'avatar' => Yii::t('app', 'URL аватара пользователя'),
            'about_user' => Yii::t('app', 'рассказ исполнителя о себе'),
            'birthdate' => Yii::t('app', 'дата рождения'),
            'town_id' => Yii::t('app', 'почтовый код города'),
        ];
    }

    /**
     * Gets query for [[Chats]].
     *
     * @return \yii\db\ActiveQuery|ChatQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Responds]].
     *
     * @return \yii\db\ActiveQuery|RespondQuery
     */
    public function getResponds()
    {
        return $this->hasMany(Respond::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery|ReviewQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews0]].
     *
     * @return \yii\db\ActiveQuery|ReviewQuery
     */
    public function getReviews0()
    {
        return $this->hasMany(Review::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery|TaskQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks0]].
     *
     * @return \yii\db\ActiveQuery|TaskQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Task::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Town]].
     *
     * @return \yii\db\ActiveQuery|TownQuery
     */
    public function getTown()
    {
        return $this->hasOne(Town::className(), ['id' => 'town_id']);
    }

    /**
     * Gets query for [[UserCategories]].
     *
     * @return \yii\db\ActiveQuery|UserCategoryQuery
     */
    public function getUserCategories()
    {
        return $this->hasMany(UserCategory::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('user_category', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Userevents]].
     *
     * @return \yii\db\ActiveQuery|UsereventQuery
     */
    public function getUserevents()
    {
        return $this->hasMany(Userevent::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Userimages]].
     *
     * @return \yii\db\ActiveQuery|UserimageQuery
     */
    public function getUserimages()
    {
        return $this->hasMany(Userimage::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Userstatistic]].
     *
     * @return \yii\db\ActiveQuery|UserstatisticQuery
     */
    public function getUserstatistic()
    {
        return $this->hasOne(Userstatistic::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

     /**
     * get quantity of user tasks
     * @return number of users tasks
     */
    
    public function tasksCount()
    {
        return count($this->tasks);
    }

    /**
     * get quantity of user reviews
     * @return number of users reviews
     */

    public function reviewsCount()
    {
        return count($this->reviews);
    }

    /**
     * @return $rating as arithmetic average of rate_stars in review 
     */
    public function rating() 
    {
        $rating = 0;
        if(count($this->reviews) > 0) {
            $rating = array_sum(array_column($this->reviews, 'rate_stars')) / count($this->reviews);
        }
        return number_format ($rating,  $decimals = 2);
    }

    public function starsNumber()
    {
        $stars = '';
        for($i = 1; $i <= 5; $i++) {
            if($this->rating() >= $i) {
                $stars .= '<span></span>';
            } else {
                $stars .= '<span class="star-disabled"></span>';
            }
        }
        return $stars;
    } 






    /**
     * @return number of days, hours and minutes since last visit of user 
     */
   
    public static function deltaTime($last_visit)
    {
        $datetime1 = new \DateTime($last_visit);
        $datetime2 = new \DateTime('now');

        $delta = $datetime1->diff($datetime2);
  
        $days_delta = $delta->format('%d');
        $hours_delta = $delta->format('%h');
        $minutes_delta = $delta->format('%i');

        if($days_delta == 0 && $hours_delta == 0 && $minutes_delta > 0) {
           
            if($minutes_delta == 1) {

                $time_delta = $delta->format('%i минуту');
            
            } elseif ($minutes_delta >= 2 && $minutes_delta <= 4) {

               $time_delta = $delta->format('%i минуты'); 
            }

            else { 
            
                $time_delta = $delta->format('%i минут'); 
            }
            
        }

        if($days_delta == 0 && $hours_delta > 0 ) {
            
            if($hours_delta == 1) {

                $time_delta = $delta->format('%h час');
            
            } elseif ($hours_delta >= 2 && $hours_delta <= 4) {

               $time_delta = $delta->format('%h часа'); 
            }

            else { 
            
                $time_delta = $delta->format('%h часов'); 
            }
        }
               

         if($days_delta > 0 ) {

            if($days_delta == 1) {

                $time_delta = $delta->format('%d день');
            
            } elseif ($days_delta >= 2 && $days_delta <= 4) {

               $time_delta = $delta->format('%d дня'); 
            }

            else { 
            
                $time_delta = $delta->format('%d дней');  
            }
        }

        return $time_delta;
    }

    public static function getYears($birthdate) 
    {
        $datetime1 = new \DateTime($last_visit);
        $datetime2 = new \DateTime('now');

        $delta = $datetime1->diff($datetime2);

        $age = $delta->format('%y');

        return $age;
  
    }

    public function stars()
    {
        $stars = '';
        for($star = 1; $star <= 5; $star++) {
            if($this->rating() >= $star) {
                $stars .= '<span></span>';
            } else {
                $stars .= '<span class="star-disabled"></span>';
            }
        }
        return $stars;
    } 

}
