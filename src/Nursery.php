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
    public static function instance()   {
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
     * Counts animals in the nursery.
     * @return int
     */
    public function count() {
        return count($this->_cage);
    }

}