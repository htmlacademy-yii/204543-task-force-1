<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "town".
 *
 * @property int $id код города
 * @property string $name название города
 *
 * @property Location[] $locations
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'town';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 120],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id города'),
            'name' => Yii::t('app', 'название города'),
        ];
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery|LocationQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['town_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TownQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TownQuery(get_called_class());
    }
}