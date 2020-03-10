<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

    'full_name' => $faker->name,
    'created_at' => $faker->dateTimeBetween('2019-01-01', '2020-01-21')->format('Y-m-d'),
    'role' => $faker->numberBetween(0, 1),
    'password' => $faker->password,
    
    'avatar' => $faker->imageUrl, 
    
    'about_user' => $faker->text($maxNbChars = 200),
    'birthdate' => $faker->dateTimeBetween('1920-01-01', '2004-01-01')->format('Y-m-d'), 
    'town_id' =>$faker->numberBetween(100000, 699999), 

];
