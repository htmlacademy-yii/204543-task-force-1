<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

	'author_id' => $faker->numberBetween(1,10),
	'task_id' => $faker->numberBetween(1,20),
	'executor_id' => $faker->numberBetween(1,10),
	'review_content' => $faker->text($maxNbChars = 250),
	'rate_stars' => $faker->numberBetween(1.00,5.00),
	'create_date' => $faker->dateTimeBetween('2019-01-01', 'now')->format('Y-m-d H:i:s'),  
];


