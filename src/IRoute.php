<?php
/**
 * Created by PhpStorm.
 * User: egorov
 * Date: 30.11.2014
 * Time: 15:46
 */
namespace samson\router;


/**
 * Generic route interface
 * @package samson\router
 */
interface IRoute
{
    /**
     * Find if this route matches passed template
     * @param string $template Template for matching
     * @return bool True if route matches passed template
     */
    public function matches($template);

    /**
     * Get route unique name
     * @return string route unique name
     */
    public function name();
} 