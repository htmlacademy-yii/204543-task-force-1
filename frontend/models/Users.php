<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $dt_add
 *
 * @property Profile[] $profiles
 * @property Reply[] $replies
 */
class Users extends \yii\db\ActiveRecord
{   
    public $email;
    public $name;
    public $password;
    public $dt_add;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'password'], 'required'],
            [['dt_add'], 'safe'],
            [['email', 'name', 'password'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'email пользователя',
            'name' => 'имя пользователя',
            'password' => 'пароль' ,
            'dt_add' => 'дата регистрации'),
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery|ReplyQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
