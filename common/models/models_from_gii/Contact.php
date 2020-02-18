<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $user_id id исполнителя
 * @property string $phone номер телефона пользователя
 * @property string $email email пользователя
 * @property string $skype skype пользователя
 * @property int $other_messenger другой мессенжер
 *
 * @property User $user
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'phone', 'email', 'skype', 'other_messenger'], 'required'],
            [['user_id', 'other_messenger'], 'integer'],
            [['phone', 'email', 'skype'], 'string', 'max' => 120],
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
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}