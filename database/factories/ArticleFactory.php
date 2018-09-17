<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        //
        'title'   => $faker->sentence ,
        'content' => $faker->text ,
        'editormd-html-code' => $faker->text ,
        'user_id' => array_random ( [ 1 , 2 , 3 ,4,5] )
    ];
});
