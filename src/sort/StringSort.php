<?php
namespace TTConsulting\Example\Sort;

/**
 * Class StringSort.
 * @package TTConsulting\Example\Sort
 */
class StringSort extends AGenericSort {

    /**
     * Sorts animals alphabetically
     * @param array $cage
     * @return array
     */
    public function sort(array $cage) : array {
        uasort($cage,function($objA, $objB){
            if($objA->nickname() < $objB->nickname()) return -1;
            elseif($objA->nickname() > $objB->nickname()) return 1;
            else return 0;
        });
        return $cage;
    }

}