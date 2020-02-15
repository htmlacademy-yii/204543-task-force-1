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
 * @property string $dt_add
 *
 * @property Profile[] $profiles
 * @property Reply[] $replies
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public $email;
    public $userName;
    public $password;
    public $dt_add;
    

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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'userName' => Yii::t('app', 'UserName'),
            'password' => Yii::t('app', 'Password'),
            'dt_add' => Yii::t('app', 'Dt Add'),
        ];
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
     * Gets query for [[Reply]].
     *
     * @return \yii\db\ActiveQuery|ReplyQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['user_id' => 'id']);
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
