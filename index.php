<?php
namespace TTConsulting\Example;

/** Defines convenient links to objects **/
use TTConsulting\Example\Animal\CatAnimal as Cat;
use TTConsulting\Example\Animal\DogAnimal as Dog;
use TTConsulting\Example\Animal\TurtleAnimal as Turtle;

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
$nursery->put(new Cat('Машка', 3));
$nursery->put(new Dog('Бобик', 6));
$nursery->put(new Turtle('Лариса', 1));

/** Shows all animals in alphabetical order **/
$nursery->animals();

$visitor = new Person(3);