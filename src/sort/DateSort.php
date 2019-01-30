<?php
namespace TTConsulting\Example\Sort;

/**
 * Class DateSort.
 * @package TTConsulting\Example\Sort
 */
class DateSort extends AGenericSort {

    public function sort(array $cage) : array {
        uasort($cage,function($objA, $objB){
            if($objA->entered() < $objB->entered()) return -1;
            elseif($objA->entered() > $objB->entered()) return 1;
            else return 0;
        });
        return $cage;
    }

}