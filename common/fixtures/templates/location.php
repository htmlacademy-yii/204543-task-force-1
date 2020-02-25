<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'town_id' => $faker->randomElement($array = [107192,
								    	110213,
								    	132844,
								    	133287,
								    	199007,
								    	210099,
								    	216399,
								    	232886,
								    	257031,
								    	296611,
								    	380567,
								    	430893,
								    	453647,
								    	457564,
								    	470300,
								    	504279,
								    	509927,
								    	551192,
								    	570693,
								    	596258,
								    	614726,
								    	622006,
								    	625447,
									]),
    'latitude' => $faker->latitude($min = -90, $max = 90),
    'longitude' => $faker->longitude($min = -90, $max = 90), 
   ];