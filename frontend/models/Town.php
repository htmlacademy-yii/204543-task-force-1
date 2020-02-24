<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "town".
 *
 * @property int $id почтовый код города
 * @property string $town название города
 *
 * @property Location[] $locations
 * @property User[] $users
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
            [['id', 'town'], 'required'],
            [['id'], 'integer'],
            [['town'], 'string', 'max' => 120],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'почтовый код города'),
            'town' => Yii::t('app', 'название города'),
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['town_id' => 'id']);
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
