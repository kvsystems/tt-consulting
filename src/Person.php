<?php
namespace TTConsulting\Example;

use TTConsulting\Example\Animal\GenericAnimal;

/**
 * Class Person.
 * @package TTConsulting\Example
 */
class Person {

    /**
     * Cage for animals.
     * @var $_cage array
     */
    private $_cage = [];

    /**
     * Cage volume.
     * @var $_volume int
     */
    private $_volume;

    /**
     * Person constructor.
     * Specifies the cell volume of a new person.
     */
    public function __construct(int $volume = 1)   {
        $this->_volume = $volume;
    }

    /**
     * Starts the animal in a cage.
     * @param GenericAnimal $animal
     * @return bool
     */
    public function take(GenericAnimal $animal) : bool  {
        if($this->count() < $this->_volume) {
            $this->_cage[] = $animal;
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    /**
     * Counts animals in a cage.
     * @return int
     */
    public function count() : int {
        return count($this->_cage);
    }

}