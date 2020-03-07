<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

    'name' => $faker->unique()->randomElement($array = ['Курьерские услуги',
									'Уборка',
									'Переезды',
									'Компьютерная помощь',
									'Ремонт квартирный',
									'Ремонт техники',
									'Красота',
									'Фото',
									]),  
    'icon' => $faker->word, 
];
