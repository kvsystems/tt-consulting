<?php
namespace TTConsulting\Example\Sort;

/**
 * Class AGenericSort.
 * @package TTConsulting\Example\Sort
 */
abstract class AGenericSort {

    /**
     * Creates sort type.
     * @param string $type
     * @return AGenericSort
     */
    public static function type(string $type) : AGenericSort {
        $type = __NAMESPACE__ . '\\' . $type;
        return new $type();
    }

    /**
     * 
     * @param array $cage
     * @return array
     */
    public abstract function sort(array $cage) : array;

}