<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Profile".
 *
 * @property int $user_id
 * @property string $address
 * @property string $bd
 * @property string $about
 * @property string $phone
 * @property string $skype
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
        return 'Profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address', 'bd', 'about', 'phone', 'skype'], 'required'],
            [['user_id'], 'integer'],
            [['bd'], 'safe'],
            [['about'], 'string'],
            [['address'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 15],
            [['skype'], 'string', 'max' => 120],
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
            'user_id' => 'id пользователя',
            'address' => 'Адрес',
            'bd' => 'День рождения',
            'about' => 'Краткая информация',
            'phone' => 'Телефон',
            'skype' => 'Skype',
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
