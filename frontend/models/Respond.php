<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "respond".
 *
 * @property int $id id отклика
 * @property int $task_id
 * @property int $user_id id  исполнителя
 * @property int $execute_budget бюджет/стоимость работ
 * @property string $comment текст  отклика на задание
 * @property string|null $create_at время создания отклика на задание
 *
 * @property User $user
 */
class Respond extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respond';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id', 'execute_budget', 'comment'], 'required'],
            [['task_id', 'user_id', 'execute_budget'], 'integer'],
            [['create_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id отклика'),
            'task_id' => Yii::t('app', 'Task ID'),
            'user_id' => Yii::t('app', 'id  исполнителя'),
            'execute_budget' => Yii::t('app', 'бюджет/стоимость работ'),
            'comment' => Yii::t('app', 'текст  отклика на задание'),
            'create_at' => Yii::t('app', 'время создания отклика на задание'),
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
     * {@inheritdoc}
     * @return RespondQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RespondQuery(get_called_class());
    }
}
