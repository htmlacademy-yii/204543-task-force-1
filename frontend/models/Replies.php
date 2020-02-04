<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property int $id id отклика
 * @property string $dt_add дата и время создания отклика
 * @property int $rate
 * @property string $description текст отклика
 * @property int $user_id id исполнителя
 * @property int $task_id id задачи
 *
 * @property User $user
 * @property Task $task
 */
class Replies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'rate', 'description', 'user_id', 'task_id'], 'required'],
            [['dt_add'], 'safe'],
            [['rate', 'user_id', 'task_id'], 'integer'],
            [['description'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id отклика'),
            'dt_add' => Yii::t('app', 'дата и время создания отклика'),
            'rate' => Yii::t('app', 'Rate'),
            'description' => Yii::t('app', 'текст отклика'),
            'user_id' => Yii::t('app', 'id исполнителя'),
            'task_id' => Yii::t('app', 'id задачи'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
     * {@inheritdoc}
     * @return RepliesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RepliesQuery(get_called_class());
    }
}
