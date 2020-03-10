<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userstatistic".
 *
 * @property int $user_id id  исполнителя
 * @property int $views_number кол-во просмотров аккаунта исполнителя
 * @property int|null $available_now свободен ли исполнитель
 * @property string $last_visit время последнего посещения сайта
 *
 * @property User $user
 */
class Userstatistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userstatistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'views_number', 'last_visit'], 'required'],
            [['user_id', 'views_number', 'available_now'], 'integer'],
            [['last_visit'], 'safe'],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'id  исполнителя'),
            'views_number' => Yii::t('app', 'кол-во просмотров аккаунта исполнителя'),
            'available_now' => Yii::t('app', 'свободен ли исполнитель'),
            'last_visit' => Yii::t('app', 'время последнего посещения сайта'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserstatisticQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserstatisticQuery(get_called_class());
    }
}
