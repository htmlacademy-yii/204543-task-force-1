<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id id записи локации
 * @property int $town_id код города
 * @property float $latitude широта города (географ.)
 * @property float $longitude долгота города (географ.)
 *
 * @property Town $town
 * @property Task[] $tasks
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
            [['town_id', 'latitude', 'longitude'], 'required'],
            [['town_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
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
            'town_id' => Yii::t('app', 'код города'),
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
     * {@inheritdoc}
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}
