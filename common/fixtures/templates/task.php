<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
	'created_at' => $faker->dateTimeBetween('2019-01-01', 'now')->format('Y-m-d H:i:s'),
    'author_id' => $faker->numberBetween(1,10),
    'executor_id' => $faker->numberBetween(1,10),
    'location_id' => $faker->numberBetween(100000,699999),
    'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    'description' => $faker->text($maxNbChars = 200), 
    'category_id' => $faker->numberBetween(1,6),
    'budget' => $faker->numberBetween(300,10000),
    'end_date' =>$faker->dateTimeBetween('2019-01-01', '2020-01-21')->format('Y-m-d'), 
    'task_status'=> $faker->randomElement($array = ['new','cancel','inprogress', 'completed', 'failed']), 

];