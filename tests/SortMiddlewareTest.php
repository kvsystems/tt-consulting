<?php
use PHPUnit\Framework\TestCase;
use TTConsulting\Example\Sort\Middleware\Maximum;
use TTConsulting\Example\Sort\Middleware\Minimum;
use TTConsulting\Example\Animal\AGenericAnimal;

class SortMiddlewareTest extends TestCase {

    private $_cage = [];

    public function setUp() {
        $this->_cage[] = AGenericAnimal::create('CatAnimal', 'Антон', 3);
        sleep(1);
        $this->_cage[] = AGenericAnimal::create('DogAnimal', 'Яша', 3);
    }

    public function testMaximumInstance() {
        $this->assertInstanceOf(Maximum::class, new Maximum());
    }

    public function testMinimumInstance() {
        $this->assertInstanceOf(Minimum::class, new Minimum());
    }

    public function testMaximumFilter() {
        $filter = new Maximum();
        $this->assertEquals('Яша', $filter->filter($this->_cage)[0]->nickname());
    }

    public function testMinimumFilter() {
        $filter = new Minimum();
        $this->assertEquals('Антон', $filter->filter($this->_cage)[0]->nickname());
    }

}