<?php
namespace TTConsulting\Example\Sort\Middleware;

/**
 * Class Minimum
 * Works with minimum result values.
 * @package TTConsulting\Example\Sort\Middleware
 */
class Minimum implements IMiddleware {

    public function filter(array $cage = []) : array    {
        $min = 0; $result = [];
        if(isset($cage[0])) $min = $cage[0]->entered();
        foreach($cage as $animal)
            if($min >= $animal->entered()) $temp = $animal;
        if(isset($temp)) $result[] = $temp;
        return $result;
    }

}