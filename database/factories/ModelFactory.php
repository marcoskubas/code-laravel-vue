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
$factory->define(CodeLaravelVue\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->safeEmail,
		'password'       => $password ?: $password = bcrypt('secret'),
		'remember_token' => str_random(10),
    ];
});

$factory->state(CodeLaravelVue\User::class, 'admin', function(Faker\Generator $faker) {

    return [
		'role' => CodeLaravelVue\User::ROLE_ADMIN,
    ];
});

$factory->define(CodeLaravelVue\Models\Bank::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'logo'          => md5(time()) . '.jpg',
    ];
});