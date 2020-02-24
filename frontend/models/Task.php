<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id id задания
 * @property int $author_id id заказчика
 * @property int $executor_id id  исполнителя
 * @property int $location_id код города
 * @property string $title название задания
 * @property string $description описание задания
 * @property int $category_id категория работ
 * @property int $budget бюджет/стоимость работ
 * @property string $end_date дата окончания работ
 * @property string $task_status статус задания
 *
 * @property Chat[] $chats
 * @property Review[] $reviews
 * @property User $author
 * @property Category $category
 * @property User $executor
 * @property Location $location
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'executor_id', 'location_id', 'title', 'description', 'category_id', 'budget', 'end_date', 'task_status'], 'required'],
            [['author_id', 'executor_id', 'location_id', 'category_id', 'budget'], 'integer'],
            [['end_date'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 450],
            [['task_status'], 'string', 'max' => 120],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id задания'),
            'author_id' => Yii::t('app', 'id заказчика'),
            'executor_id' => Yii::t('app', 'id  исполнителя'),
            'location_id' => Yii::t('app', 'почтовый индекс города'),
            'title' => Yii::t('app', 'название задания'),
            'description' => Yii::t('app', 'описание задания'),
            'category_id' => Yii::t('app', 'категория работ'),
            'budget' => Yii::t('app', 'бюджет/стоимость работ'),
            'end_date' => Yii::t('app', 'дата окончания работ'),
            'task_status' => Yii::t('app', 'статус задания'),
        ];
    }

    /**
     * Gets query for [[Chats]].
     *
     * @return \yii\db\ActiveQuery|ChatQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery|ReviewQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
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
     * Gets query for [[Executor]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(User::className(), ['id' => 'executor_id']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery|LocationQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
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
