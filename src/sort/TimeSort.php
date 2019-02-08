<?php
namespace TTConsulting\Example\Sort;

/**
 * Class TimeSort.
 * @package TTConsulting\Example\Sort
 */
class TimeSort extends AGenericSort {

    /**
     * Type of sorting by time.
     * @var string
     */
    private $_type;

    /**
     * TimeSort constructor.
     * Sets min, max, all time sorts.
     * @param array $params
     */
    public function __construct(array $params = [])   {
        if(isset($params[0])) {
            $this->_type = __NAMESPACE__ . '\\' . 'Middleware\\' . $params[0];
        }
    }

    /**
     * Sort by time.
     * @param array $cage
     * @return array
     */
    public function sort(array $cage) : array {
        if(!is_null($this->_type)) {
            $class = new $this->_type();
            $cage = $class->filter($cage);
        } else {
            uasort($cage,function($objA, $objB){
                if($objA->entered() < $objB->entered()) return -1;
                elseif($objA->entered() > $objB->entered()) return 1;
                else return 0;
            });
        }
        return array_values($cage);
    }

}