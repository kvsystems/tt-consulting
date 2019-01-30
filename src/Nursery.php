<?php
namespace TTConsulting\Example;
use TTConsulting\Example\Animal\GenericAnimal;

/**
 * Class Nursery
 * @package TTConsulting\Example
 */
class Nursery {

    /**
     * Nursery capacity.
     * @const CAPACITY int
     */
    const CAPACITY = 100;

    /**
     * Nursery instance.
     * @var $_instance Nursery
     */
    private static $_instance;

    /**
     * Animal cages in a nursery.
     * @var $_cage array
     */
    private $_cage = [];

    /** Hiding creating magic methods **/
    private function __construct(){}
    private function __clone(){}

    /**
     * Receiving nursery instance.
     * @return Nursery
     */
    public static function instance() : Nursery {
        return self::$_instance === null
            ? self::$_instance = new static()
            : self::$_instance;
    }

    /**
     * Puts the animal in the nursery.
     * @param GenericAnimal $animal
     * @return bool
     */
    public function put(GenericAnimal $animal) : bool {
        if($this->count() < self::CAPACITY) {
            $this->_cage[] = $animal;
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    /**
     * Shows all animals.
     * @return array
     */
    public function animals() : array {
        return $this->_cage;
    }

    /**
     * Sorts animals by name.
     */
    public function sort()   {
        for($i = 0; $i < $this->_cage; $i++) {

        }
        uasort($this->_cage,function($objA, $objB){
            if($objA->nickname() < $objB->nickname()) return -1;
            elseif($objA->nickname() > $objB->nickname()) return 1;
            else return 0;
        });
    }

    /**
     * Counts animals in the nursery.
     * @return int
     */
    public function count() : int {
        return count($this->_cage);
    }

}