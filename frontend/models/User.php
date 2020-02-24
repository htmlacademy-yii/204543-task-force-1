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

}
