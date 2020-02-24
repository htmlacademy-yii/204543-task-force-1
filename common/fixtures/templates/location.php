<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'town_id' => $faker->numberBetween(100000, 699999),
    'latitude' => $faker->latitude($min = -90, $max = 90),
    'longitude' => $faker->longitude($min = -90, $max = 90), 
   ];