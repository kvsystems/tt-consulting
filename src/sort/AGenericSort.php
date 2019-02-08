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
     * @param array $params
     * @return AGenericSort
     */
    public static function type(string $type, array $params = []) : AGenericSort {
        $type = __NAMESPACE__ . '\\' . $type;
        return new $type($params);
    }

    /**
     * 
     * @param array $cage
     * @return array
     */
    public abstract function sort(array $cage) : array;

}