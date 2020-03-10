<?php

use yii\db\Migration;
use frontend\models\Userstatistic;
use frontend\models\User;


/**
 * Class m200309_205845_new_time_of_last_visit
 */
class m200309_205845_new_time_of_last_visit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user3 = Userstatistic::find()
                ->where(['user_id' => 3])
                ->one();

        $user3->last_visit = "2020-03-09 23:29:00";
        $user3->save();

        $user5 = Userstatistic::find()                
                ->where(['user_id' => 5])
                ->one();;
        $user5->last_visit = "2020-03-09 21:15:00";
        $user5->save();

        $user8 = Userstatistic::find()
                ->where(['user_id' => 8])
                ->one();;
        $user8->last_visit = "2020-03-08 17:59:00";
        $user8->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200309_205845_new_time_of_last_visit cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200309_205845_new_time_of_last_visit cannot be reverted.\n";

        return false;
    }
    */
}
