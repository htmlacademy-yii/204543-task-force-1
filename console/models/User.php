<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $email
 * @property string $userName
 * @property string $password
 * @property string|null $dt_add
 *
 * @property Profile $profile
 * @property Reply[] $replies
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'userName', 'password'], 'required'],
            [['dt_add'], 'safe'],
            [['email', 'userName', 'password'], 'string', 'max' => 120],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'userName' => 'User Name',
            'password' => 'Password',
            'dt_add' => 'Dt Add',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['user_id' => 'id']);
    }
}
