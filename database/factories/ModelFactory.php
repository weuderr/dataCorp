<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(str_random(5)),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\DataBody::class, function (Faker\Generator $faker) {

	$user = factory(App\User::class)->create();

    return [
    	'user_id' => $user->id,
		'massa' => $faker->randomFloat(2,25,150),
		'imc' => $faker->randomFloat(2,15,35),
		'gordura' => $faker->randomFloat(2,4,80),
		'musculo' => $faker->randomFloat(2,4,80),
		'calorias_diarias' => $faker->numberBetween(1200,3000),
		'idade_corporal' => $faker->numberBetween(10,150),
		'gordura_visceral' => $faker->numberBetween(1,10)
    ];
});
