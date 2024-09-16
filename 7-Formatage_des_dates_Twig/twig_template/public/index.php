<?php 

use EsperoSoft\Faker\Faker;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__). '/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__).'/templates');

$twig = new \Twig\Environment($loader, [
    // 'cache' => dirname(__DIR__).'/var/cache',
]);

$faker = new Faker();

$users = [];
for ($i=0; $i < 15; $i++) { 
    $user = [
        'full_name' => $faker->full_name(),
        'email' => $faker->email(),
        'address' => [
            'street' => $faker->streetAddress(),
            'code_postal' => $faker->codepostal(),
            'city' => $faker->city(),
            'country' => $faker->country(),
        ],
        'age' => rand(6, 60),
        'cover' => $faker->image(),
        'picture' => $faker->image(),
        'createdAt' => $faker->dateTime(),
    ];
    $users[] = $user;
}


echo $twig->render('home.html.twig',[
    "title" => "Home",
    "users" => $users
]);
