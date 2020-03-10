<?php

use yii\db\Migration;
use frontend\models\Category;
 


/**
 * Class m200307_160239_change_new_category_icons
 */
class m200307_160239_change_new_category_icons extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
   { 
        $category = Category::findOne(['name' => 'Курьерские услуги']);
        $category->icon = 'delivary';
        $category->save();

        $category = Category::findOne(['name' => 'Уборка']);
        $category->icon = 'clean';
        $category->save();

        $category = Category::findOne(['name' => 'Переезды']);
        $category->icon = 'cargo';
        $category->save();

        $category = Category::findOne(['name' => 'Компьютерная помощь']);
        $category->icon = 'neo';
        $category->save();

        $category = Category::findOne(['name' => 'Ремонт квартирный']);
        $category->icon = 'flat';
        $category->save();

        $category = Category::findOne(['name' => 'Ремонт техники']);
        $category->icon = 'repair';
        $category->save();

        $category = Category::findOne(['name' => 'Красота']);
        $category->icon = 'beauty';
        $category->save();

        $category = Category::findOne(['name' => 'Фото']);
        $category->icon = 'photo';
        $category->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200307_160239_change_new_category_icons cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200307_160239_change_new_category_icons cannot be reverted.\n";

        return false;
    }
    */
}
