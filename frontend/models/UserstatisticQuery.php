<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Userstatistic]].
 *
 * @see Userstatistic
 */
class UserstatisticQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Userstatistic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Userstatistic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
