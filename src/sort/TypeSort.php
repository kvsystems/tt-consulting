<?php
namespace TTConsulting\Example\Sort;

/**
 * Class TypeSort.
 * @package TTConsulting\Example\Sort
 */
class TypeSort extends AGenericSort {

    /**
     * Type of animal.
     * @var $_type string
     */
    private $_type;

    /**
     * TypeSort constructor.
     * Set animal type
     * @param array $params
     */
    public function __construct(array $params = [])   {
        if(isset($params[0])) {
            $this->_type = str_replace( 'Sort', 'Animal',__NAMESPACE__ . '\\' . $params[0]);
        }
    }

    /**
     * Sorts animals by type.
     * @param array $cage
     * @return array
     */
    public function sort(array $cage) : array {
        $result = [];
        foreach($cage as $animal) {
            if($animal instanceof $this->_type) $result[] = $animal;
        }
        return $result;
    }

}