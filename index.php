<?php
namespace TTConsulting\Example;

use TTConsulting\Example\Animal\AGenericAnimal as Animal;
use TTConsulting\Example\Sort\AGenericSort as Sort;

/** PHP configuration **/
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
date_default_timezone_set( 'Asia/Yekaterinburg' );

/** Composer psr-4 autoload **/
require_once __DIR__ . '/vendor/autoload.php';

/** Opens a nursery **/
$nursery = Nursery::instance();

/** Puts the animals in the nursery **/
$nursery->put(Animal::create('CatAnimal', 'Васька', 3));
$nursery->put(Animal::create('DogAnimal', 'Бобик', 6));
$nursery->put(Animal::create('TurtleAnimal', 'Клариса', 1));

/** Shows all animals in alphabetical order **/
$sorts = [
    Sort::type('StringSort', []),
    Sort::type('TypeSort',   ['CatAnimal'])
];
foreach($nursery->animals($sorts) as $animal) {
    echo $animal->nickname() . PHP_EOL;
}


$visitor = new Person(3);