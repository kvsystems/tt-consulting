<?php
namespace TTConsulting\Example;

use TTConsulting\Example\Animal\AGenericAnimal;
use TTConsulting\Example\Sort\AGenericSort;

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
     * @param AGenericAnimal $animal
     * @return bool
     */
    public function put(AGenericAnimal $animal) : bool {
        if($this->count() < self::CAPACITY) {
            $this->_cage[] = $animal;
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    /**
     * Performs cage sorting.
     * @param AGenericSort $sort
     * @return array
     */
    public function sort(string $sort, array $cage = []) : array {
        return !empty($cage)
            ? AGenericSort::type($sort)->sort($cage)
            : AGenericSort::type($sort)->sort($this->_cage);
    }

    /**
     * Counts animals in the nursery.
     * @return int
     */
    public function count() : int {
        return count($this->_cage);
    }

}