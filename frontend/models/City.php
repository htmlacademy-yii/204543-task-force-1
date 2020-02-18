<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "City".
 *
 * @property int $id id города
 * @property string $city название города
 * @property float $latitude широта местоположения
 * @property float $longitude долгота местоположения
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['city'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id города'),
            'city' => Yii::t('app', 'название города'),
            'latitude' => Yii::t('app', 'широта местоположения'),
            'longitude' => Yii::t('app', 'долгота местоположения'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CityQuery(get_called_class());
    }
}
