<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id id исполнителя
 * @property string $address адрес исполнителя
 * @property string $phone номер телефона пользователя
 * @property string $email email пользователя
 * @property string $skype skype пользователя
 * @property string $other_messenger другой мессенжер
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address', 'phone', 'email', 'skype', 'other_messenger'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string', 'max' => 200],
            [['phone', 'email', 'skype', 'other_messenger'], 'string', 'max' => 120],
            [['phone'], 'unique'],
            [['email'], 'unique'],
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
            'user_id' => Yii::t('app', 'id исполнителя'),
            'address' => Yii::t('app', 'адрес исполнителя'),
            'phone' => Yii::t('app', 'номер телефона пользователя'),
            'email' => Yii::t('app', 'email пользователя'),
            'skype' => Yii::t('app', 'skype пользователя'),
            'other_messenger' => Yii::t('app', 'другой мессенжер'),
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
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
