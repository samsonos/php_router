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

    /**
     * Constructor
     * @param string        $template   Template for matching
     * @param callable      $handler    External handler
     * @param string|null   $name       Unique route name, if not passed it would be generated
     */
    public function __construct($template, $handler, $name = null)
    {
        // Validate handler
        if (!is_callable($handler)) {
            return e(
                'Cannot create route[##][##] - Handler[##] is not callable',
                E_SAMSON_FATAL_ERROR,
                array($name, $template, $handler)
            );
        }

        // If no route name is passed - build name
        $this->name = isset($name) ? strtolower($name) : 'route.'.sizeof($this->routes);
        $this->handler = $handler;
        $this->template = $template;

        // TODO: add logic to validate template
    }

    /**
     * Find if this route matches passed template
     * @param string $template Template for matching
     * @return bool True if route matches passed template
     */
    public function matches($template)
    {
        // Try to match passed template with route template
        $matches = array();
        if (preg_match($this->template, $template, $matches)) {
            // TODO: Add logic to read parameters
            $this->parameters = $matches;

            // Route matched
            return true;
        } else { // Passed template does not matches current route template
            return false;
        }
    }

    /**
     * Get route unique name
     * @return string route unique name
     */
    public function name()
    {
        return $this->name;
    }
}