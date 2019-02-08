<?php

use PHPUnit\Framework\TestCase;
use TTConsulting\Example\Nursery;
use TTConsulting\Example\Animal\AGenericAnimal;
use TTConsulting\Example\Sort\AGenericSort;

class NurseryTest extends TestCase {

    private $_nursery;
    private $_animal;

    public function setUp() {
        $this->_nursery = Nursery::instance();
        $this->_animal  = AGenericAnimal::create('CatAnimal', 'Василий', 3);
    }

    public function testInstance()  {
        $this->assertInstanceOf(Nursery::class, $this->_nursery);
    }

    public function testPut()   {
        $this->assertTrue($this->_nursery->put($this->_animal));
    }

    public function testCapacity()   {
        for($i = 0; $i <= $this->_nursery::CAPACITY; $i++) $result = $this->_nursery->put($this->_animal);
        $this->assertFalse($result);
    }

    public function testAnimals()   {
        $this->assertIsArray($this->_nursery->animals([AGenericSort::type('TypeSort', ['CatAnimal'])]));
    }

    public function testCount() {
        $this->assertEquals(100, $this->_nursery->count());
    }

    public function testUnset() {
        $animal = $this->_nursery->animals([AGenericSort::type('TypeSort', ['CatAnimal'])])[0];
        $this->assertTrue($this->_nursery->unset($animal->tag()));
    }

}