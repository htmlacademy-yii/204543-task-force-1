<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property int $user_id id пользователя
 * @property int $task_id id задания
 * @property string $created_at время создания поста в чате
 * @property string $message содержание поста в чате
 *
 * @property Task $task
 * @property User $user
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'task_id', 'created_at', 'message'], 'required'],
            [['user_id', 'task_id'], 'integer'],
            [['created_at'], 'safe'],
            [['message'], 'string', 'max' => 255],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'id пользователя'),
            'task_id' => Yii::t('app', 'id задания'),
            'created_at' => Yii::t('app', 'время создания поста в чате'),
            'message' => Yii::t('app', 'содержание поста в чате'),
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return ChatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChatQuery(get_called_class());
    }
}
