<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Task".
 *
 * @property int $id
 * @property string $dt_add
 * @property int $category_id
 * @property string $description
 * @property string $expire
 * @property string $name
 * @property string $address
 * @property float $budget
 * @property float $latitude
 * @property float $longitude
 *
 * @property Reply[] $replies
 * @property Category $category
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'required'],
            [['dt_add'], 'safe'],
            [['category_id'], 'integer'],
            [['description', 'expire'], 'string'],
            [['budget', 'latitude', 'longitude'], 'number'],
            [['name'], 'string', 'max' => 120],
            [['address'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'description' => Yii::t('app', 'Description'),
            'expire' => Yii::t('app', 'Expire'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'budget' => Yii::t('app', 'Budget'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        ];
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery|ReplyQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }
}
