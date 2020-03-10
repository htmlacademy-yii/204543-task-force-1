<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [

	'user_id' => $faker->numberBetween(1,10),
	'task_id' => $faker->numberBetween(1,9),
	'comment' => $faker->text($maxNbChars = 250),
	'execute_budget' => $faker->numberBetween(300,100000),
	'created_at' => $faker->dateTimeBetween('2019-01-01', 'now')->format('Y-m-d H:i:s'),
];


