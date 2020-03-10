<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

	'user_id' => $faker->numberBetween(1, 10),
	'event' => $faker->word,
	'icon' => $faker->randomElement($array = ['create','respond','cancel', 'complete', 'refuse']), 
];


