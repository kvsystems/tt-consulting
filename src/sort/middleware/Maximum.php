<?php
namespace TTConsulting\Example\Sort\Middleware;

/**
 * Class Maximum
 * Works with maximum result values.
 * @package TTConsulting\Example\Sort\Middleware
 */
class Maximum implements IMiddleware {

    public function filter(array $cage = []) : array    {
        $max = 0; $result = [];
        foreach($cage as $animal)
            if($max < $animal->entered()) $temp = $animal;
        if(isset($temp)) $result[] = $temp;
        return $result;
    }

}