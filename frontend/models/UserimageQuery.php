<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Userimage]].
 *
 * @see Userimage
 */
class UserimageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Userimage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Userimage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
