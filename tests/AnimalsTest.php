<?php
use PHPUnit\Framework\TestCase;
use TTConsulting\Example\Animal\AGenericAnimal;
use TTConsulting\Example\Animal\CatAnimal;
use TTConsulting\Example\Animal\DogAnimal;
use TTConsulting\Example\Animal\TurtleAnimal;

class AnimalsTest extends TestCase {

    public function testCat()   {
        $this->assertInstanceOf(
            CatAnimal::class, AGenericAnimal::create('CatAnimal', 'Василий', 3)
        );
    }

    public function testDog()   {
        $this->assertInstanceOf(
            CatAnimal::class, AGenericAnimal::create('DogAnimal', 'Василий', 3)
        );
    }

    public function testTurtle()   {
        $this->assertInstanceOf(
            CatAnimal::class, AGenericAnimal::create('TurtleAnimal', 'Василий', 3)
        );
    }

    public function testCatVoice()   {
        $animal = AGenericAnimal::create('CatAnimal', 'Василий', 3);
        $this->assertIsString($animal->voice());
    }

    public function testDogVoice()   {
        $animal = AGenericAnimal::create('DogAnimal', 'Василий', 3);
        $this->assertIsString($animal->voice());
    }

    public function testTurtleVoice()   {
        $animal = AGenericAnimal::create('TurtleAnimal', 'Василий', 3);
        $this->assertIsString($animal->voice());
    }

    public function testNickname()  {
        $animal = AGenericAnimal::create('TurtleAnimal', 'Василий', 3);
        $this->assertEquals('Василий', $animal->nickname());
    }

    public function testAge()  {
        $animal = AGenericAnimal::create('TurtleAnimal', 'Василий', 3);
        $this->assertEquals(3, $animal->age());
    }

    public function testEntered()  {
        $animal = AGenericAnimal::create('TurtleAnimal', 'Василий', 3);
        $this->assertIsInt($animal->nickname());
    }

    public function testTag()  {
        $animal = AGenericAnimal::create('TurtleAnimal', 'Василий', 3);
        $this->assertIsString($animal->nickname());
    }

}