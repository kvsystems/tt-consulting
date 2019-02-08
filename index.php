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

/** Try to execution of main script **/
try{

    /** Opens a nursery **/
    $nursery = Nursery::instance();

    /** Puts the animals in the nursery **/
    echo 'We open the nursery and fill with animals, wait...' . PHP_EOL;
    $nursery->put(Animal::create('CatAnimal', 'Васька', 3));     sleep(1);
    $nursery->put(Animal::create('CatAnimal', 'Ариша', 3));     sleep(2);
    $nursery->put(Animal::create('DogAnimal', 'Бобик', 6));      sleep(2);
    $nursery->put(Animal::create('DogAnimal', 'Тузик', 12));     sleep(3);
    $nursery->put(Animal::create('TurtleAnimal', 'Клариса', 1)); sleep(1);
    echo 'Nursery animals count: ' . $nursery->count() . PHP_EOL;
    echo PHP_EOL . PHP_EOL;

    /** Shows cats in alphabetical order **/
    echo 'View cats in alphabetical order:' . PHP_EOL;
    $sorts = [
        Sort::type('StringSort', []),
        Sort::type('TypeSort',   ['CatAnimal'])
    ];
    $cats = $nursery->animals($sorts);
    if(empty($cats)) throw new \Exception('Cats not found');
    foreach($cats as $animal) {
        echo $animal->nickname() . PHP_EOL;
    }
    echo PHP_EOL;

    /** Create a new nursery visitor **/
    $visitor = new Person('Александр', 3);
    echo 'Visitor ' . $visitor->name() . ' comes' . PHP_EOL . PHP_EOL;

    /** Gives a man a dog before others placed in a nursery **/
    echo 'Give a latest dog placed in a nursery to visitor:' . PHP_EOL;
    $sorts = [
        Sort::type('TypeSort', ['DogAnimal']),
        Sort::type('TimeSort', ['Maximum'])
    ];
    $dog = $nursery->animals($sorts);
    if(empty($dog)) throw new \Exception('Dog not found');
    foreach($dog as $animal) {
        $visitor->take($animal);
        $nursery->unset($animal->tag());
        echo 'Give ' . $animal->nickname() . ' to ' . $visitor->name() . PHP_EOL;
    }
    echo $visitor->name() . ' animals count: ' . $visitor->count() . PHP_EOL;
    echo 'Nursery animals count: ' . $nursery->count() . PHP_EOL;
    echo PHP_EOL;

    /** Gives a man a dog after others placed in a nursery **/
    echo 'Give a latest animal placed in a nursery to visitor:' . PHP_EOL;
    $sorts = [
        Sort::type('TimeSort', ['Maximum'])
    ];
    $animal = $nursery->animals($sorts);
    if(empty($animal)) throw new \Exception('Animal not found');
    $animal = $animal[0];
    $visitor->take($animal);
    $nursery->unset($animal->tag());
    echo 'Give ' . $animal->nickname() . ' to ' . $visitor->name() . PHP_EOL;
    echo $visitor->name() . ' animals count: ' . $visitor->count() . PHP_EOL;
    echo 'Nursery animals count: ' . $nursery->count() . PHP_EOL;
    echo PHP_EOL;

} catch(\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}