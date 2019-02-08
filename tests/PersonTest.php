<?php
use PHPUnit\Framework\TestCase;
use TTConsulting\Example\Person;
use TTConsulting\Example\Animal\AGenericAnimal;

class PersonTest extends TestCase {

    private $_volume = 7;
    private $_visitor;
    private $_animal;

    public function setUp() {
        $this->_visitor = new Person('Александр', 7);
        $this->_animal  = AGenericAnimal::create('CatAnimal', 'Василий', 3);
    }

    public function testCreatePerson()  {
        $this->assertInstanceOf(Person::class, $this->_visitor);
    }

    public function testTake() {
        $this->assertTrue($this->_visitor->take($this->_animal));
    }

    public function testCapacity()   {
        for($i = 0; $i <= $this->_volume; $i++) $result = $this->_visitor->take($this->_animal);
        $this->assertFalse($result);
    }

    public function testName()  {
        $this->assertEquals('Александр', $this->_visitor->name());
    }

    public function testCount() {
        $this->assertTrue($this->_visitor->take($this->_animal));
        $this->assertEquals(1, $this->_visitor->count());
    }

}