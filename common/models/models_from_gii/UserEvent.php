<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userevent".
 *
 * @property int $id id типа события
 * @property int $user_id id  исполнителя
 * @property string $name наименование события
 * @property string $icon константа имени события
 *
 * @property User $user
 */
class UserEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userevent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'icon'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 120],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id типа события'),
            'user_id' => Yii::t('app', 'id  исполнителя'),
            'name' => Yii::t('app', 'наименование события'),
            'icon' => Yii::t('app', 'константа имени события'),
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
     * @return UserEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserEventQuery(get_called_class());
    }
}