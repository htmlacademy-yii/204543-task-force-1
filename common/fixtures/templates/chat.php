php yii fixture/load User <?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
	'user_id' => $faker->numberBetween(1,10),
	'task_id' => $faker->numberBetween(1,5),
    'created_at' => $faker->dateTimeBetween('2019-01-01', 'now')->format('Y-m-d H:i:s'),  
    'message' => $faker->text($maxNbChars = 120), 
];


