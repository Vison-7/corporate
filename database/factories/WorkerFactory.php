<?php

use Faker\Generator as Faker;

$factory->define(Corp\Worker::class, function (Faker $faker) {
   return ['name' => $faker->name,
           'since_date' =>  $faker->date($format = 'Y-m-d', $max = 'now')
          ];
});