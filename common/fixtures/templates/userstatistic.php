<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

	'user_id' => $faker->unique()->numberBetween(1,10),
	'views_number' => $faker->numberBetween(0,15),	
	'available_now' =>$faker->numberBetween(0,1),
	'last_visit' => $faker->dateTimeBetween('2020-02-22', 'now')->format('Y-m-d H:i:s'), 

];


