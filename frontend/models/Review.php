<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id id отзыва
 * @property int $author_id id заказчика
 * @property int $task_id id задания
 * @property int $executor_id
 * @property string $review_content содержание отзыва
 * @property int $rate_stars оценка выполнения задания 1-5 звёзд
 * @property string|null $create_date время создания отзыва
 *
 * @property User $author
 * @property Task $task
 * @property User $executor
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'task_id', 'executor_id', 'review_content', 'rate_stars'], 'required'],
            [['author_id', 'task_id', 'executor_id', 'rate_stars'], 'integer'],
            [['create_date'], 'safe'],
            [['review_content'], 'string', 'max' => 450],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id отзыва'),
            'author_id' => Yii::t('app', 'id заказчика'),
            'task_id' => Yii::t('app', 'id задания'),
            'executor_id' => Yii::t('app', 'Executor ID'),
            'review_content' => Yii::t('app', 'содержание отзыва'),
            'rate_stars' => Yii::t('app', 'оценка выполнения задания 1-5 звёзд'),
            'create_date' => Yii::t('app', 'время создания отзыва'),
        ];
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
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery|TaskQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
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
     * {@inheritdoc}
     * @return ReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReviewQuery(get_called_class());
    }
}
