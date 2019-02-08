<?php
namespace TTConsulting\Example\Sort;

/**
 * Class TypeSort.
 * @package TTConsulting\Example\Sort
 */
class TypeSort extends AGenericSort {

    public function sort(array $cage) : array {
        uasort($cage,function($objA, $objB){
            if($objA->nickname() < $objB->nickname()) return -1;
            elseif($objA->nickname() > $objB->nickname()) return 1;
            else return 0;
        });
        return $cage;
    }

}