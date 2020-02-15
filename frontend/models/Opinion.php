<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Opinion".
 *
 * @property int $id
 * @property string $dt_add
 * @property int $rate
 * @property string $description
 */
class Opinion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Opinion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'rate', 'description'], 'required'],
            [['dt_add'], 'safe'],
            [['rate'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dt_add' => Yii::t('app', 'Dt Add'),
            'rate' => Yii::t('app', 'Rate'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return OpinionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OpinionQuery(get_called_class());
    }
}
