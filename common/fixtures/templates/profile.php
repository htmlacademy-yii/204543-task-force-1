<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'user_id' => $faker->unique()->numberBetween(1,10),
    'address' => $faker->address,
    'phone' => $faker->unique()->e164phoneNumber(1, 11), 
    'email' => $faker->unique()->email,
    'skype' => $faker->unique()->word,
    'other_messenger' =>$faker->unique()->word, 

];