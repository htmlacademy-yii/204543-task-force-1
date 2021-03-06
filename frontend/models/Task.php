<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id id задания
 * @property string $add_dt время создания задания
 * @property int $author_id id заказчика
 * @property int $executor_id id  исполнителя
 * @property int $location_id почтовый индекс города
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
            [['add_dt', 'author_id', 'executor_id', 'location_id', 'title', 'description', 'category_id', 'budget', 'end_date', 'task_status'], 'required'],
            [['add_dt', 'end_date'], 'safe'],
            [['author_id', 'executor_id', 'location_id', 'category_id', 'budget'], 'integer'],
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
            'add_dt' => Yii::t('app', 'время создания задания'),
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

    public static function lostTime($add_dt)
    {
        $datetime1 = new \DateTime($add_dt);
        $datetime2 = new \DateTime('now');

        $delta = $datetime1->diff($datetime2);
  
        $days_delta = $delta->format('%d');
        $hours_delta = $delta->format('%h');
        $minutes_delta = $delta->format('%i');

        if($days_delta == 0 && $hours_delta == 0 && $minutes_delta > 0) {
           
            if($minutes_delta == 1) {

                $time_delta = $delta->format('%i минуту');
            } 
            else {
                $time_delta = $delta->format('%i минут');
            }
        }

        if($days_delta == 0 && $hours_delta > 0 && $minutes_delta >= 0) {

            $time_delta = $delta->format('%h часов');
        }

         if($days_delta > 0 && $hours_delta >= 0 && $minutes_delta >= 0) {

            if($days_delta == 1) {

                $time_delta = $delta->format('%d день');
            
            } elseif($days_delta == 2) {

               $time_delta = $delta->format('%d дня'); 
            }

            else { 
            
                $time_delta = $delta->format('%d дней');  
            }
        }

        return $time_delta;
    }
}
