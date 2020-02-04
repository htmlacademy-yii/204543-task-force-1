<?php

use yii\db\Migration;

/**
 * Class m200204_144604_create_new_user
 */
class m200204_144604_create_new_user extends Migration
{
    /**
     * {@inheritdoc}
     */
/*    public function safeUp()
    {
         $this->insert('users', [
            
            'email' => 'bruksi@lk.ru',
            'name' => 'Bruksoid',
            'password' => 'Milky123',
            'dt_add' => 04.02.20,
        ]);
    } */

    /**
     * {@inheritdoc}
     */
 /* public function safeDown()
    {
        echo "m200204_144604_create_new_user cannot be reverted.\n";

        return false;
    }
*/
    /*
    // Use up()/down() to run migration code without a transaction. */
    public function up()
    {
        $this->insert('users', [
            
            'email' => 'bruksi@lk.ru',
            'name' => 'Bruksoid',
            'password' => 'Milky123',
            'dt_add' => '2018-11-25 00:00:00',
        ]);
    }

    public function down()
    {
        echo "m200204_144604_create_new_user cannot be reverted.\n";

        return false;
    }
    
}
