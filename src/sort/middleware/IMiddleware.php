<?php
namespace TTConsulting\Example\Sort\Middleware;

/**
 * Interface IMiddleware
 * @package TTConsulting\Example\Sort\Middleware
 */
interface IMiddleware {

    /**
     * Basic filtering function.
     * @param array $cage
     * @return array
     */
    public function filter(array $cage = []) : array;

}