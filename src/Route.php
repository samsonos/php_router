<?php
/**
 * Created by PhpStorm.
 * User: egorov
 * Date: 30.11.2014
 * Time: 15:57
 */
namespace samson\router;

/**
 * Route class
 * @package samson\router
 */
class Route implements IRoute
{
    /** @var string Template for matching  */
    protected $template;

    /** @var callable External handler */
    protected $handler;

    /** @var string Unique name */
    protected $name;

    /** @var array Collection of passed parameters, key => value */
    protected $parameters;
} 