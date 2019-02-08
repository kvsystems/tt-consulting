<?php
use PHPUnit\Framework\TestCase;
use TTConsulting\Example\Sort\AGenericSort;
use TTConsulting\Example\Sort\TypeSort;
use TTConsulting\Example\Sort\StringSort;
use TTConsulting\Example\Sort\TimeSort;
use TTConsulting\Example\Animal\AGenericAnimal;

class SortTest extends TestCase {

    public function testStringType()  {
        $this->assertInstanceOf(StringSort::class, AGenericSort::type('StringSort'));
    }

    public function testTimeType()  {
        $this->assertInstanceOf(TimeSort::class, AGenericSort::type('TimeSort'));
    }

    public function testTypeType()  {
        $this->assertInstanceOf(TypeSort::class, AGenericSort::type('TypeSort'));
    }

    public function testStringSort()  {
        $cage = [
            AGenericAnimal::create('CatAnimal', 'Антон', 3),
            AGenericAnimal::create('DogAnimal', 'Яша', 3)
        ];
        $sort = AGenericSort::type('StringSort');
        $this->assertEquals('Антон', $sort->sort($cage)[0]->nickname());
    }

    public function testTimeSort()  {
        $cage[] = AGenericAnimal::create('CatAnimal', 'Антон', 3);
        sleep(1);
        $cage[] = AGenericAnimal::create('DogAnimal', 'Яша', 3);
        $sort = AGenericSort::type('TimeSort');
        $this->assertEquals('Антон', $sort->sort($cage)[0]->nickname());
    }

    public function testTypeSort()  {
        $cage = [
            AGenericAnimal::create('CatAnimal', 'Антон', 3),
            AGenericAnimal::create('DogAnimal', 'Яша', 3)
        ];
        $sort = AGenericSort::type('TypeSort', ['DogAnimal']);
        $this->assertEquals('Яша', $sort->sort($cage)[0]->nickname());
    }

}