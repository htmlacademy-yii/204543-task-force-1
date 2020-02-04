<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id id записи локации
 * @property int $town_id id города 
 * @property float $latitude широта города (географ.)
 * @property float $longitude долгота города (географ.)
 *
 * @property Town $town
 * @property Task[] $tasks
 * @property User[] $users
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'town_id', 'latitude', 'longitude'], 'required'],
            [['id', 'town_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['id'], 'unique'],
            [['town_id'], 'exist', 'skipOnError' => true, 'targetClass' => Town::className(), 'targetAttribute' => ['town_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id записи локации'),
            'town_id' => Yii::t('app', 'id города '),
            'latitude' => Yii::t('app', 'широта города (географ.)'),
            'longitude' => Yii::t('app', 'долгота города (географ.)'),
        ];
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
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery|TaskQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['location_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['location_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}