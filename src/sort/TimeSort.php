<?php
namespace TTConsulting\Example\Sort;

/**
 * Class TimeSort.
 * @package TTConsulting\Example\Sort
 */
class TimeSort extends AGenericSort {

    public function sort(array $cage) : array {
        return array_values($cage);
    }

}