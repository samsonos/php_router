<?php
/**
 * Created by PhpStorm.
 * User: egorov
 * Date: 30.11.2014
 * Time: 14:57
 */

namespace samson\router;

/**
 * Routing service
 * @package samson\router
 */
class Router extends \samson\core\CompressableService implements IRouter
{
    /** @var IRoute[] Collection of routes */
    protected $routes = array();

    /**
     * Add route
     * @param string $template Template for matching
     * @param callable $handler External handler
     * @param string|null $name Unique route name, if not passed it would be generated
     * @return IRoute|bool Created route or false if something went wrong
     */
    public function add($template, $handler, $name = null)
    {
        // Create new route instance
        $route = new Route($template, $handler, $name);

        // Get route unique name
        $name = $route->name();

        // Check if this route exists
        if (!isset($this->routes[$name])) {

            // Add new route to routes collection
            $this->routes[$name] = $route;

            return $route;

        } else { // Signal error
            return e('Cannot add route[##][##] - route already exists', E_SAMSON_FATAL_ERROR, array($name, $template));
        }
    }

    /**
     * Find IRoute instance by unique name
     * @param string $name Unique route name
     * @return IRoute|bool Found IRoute instance or false
     */
    public function get($name)
    {
        $route = & $this->routes[$name];

        if (isset($route)) {
            return $route;
        } else {
            return false;
        }
    }

    /**
     * Perform route searching using template
     * @param string $template Template for route search
     * @return IRoute|bool Found IRoute instance or false
     */
    public function search($template)
    {
        // TODO: Implement search() method.
    }

    /**
     * Load routes collection from file or folder.
     * If folder is passed then all files matching *Route.php would
     * be loaded.
     * @param string $path Path to file or folder for loading
     * @return int Amount of routes loaded
     */
    public function load($path)
    {
        // TODO: Implement load() method.
    }

    /**
     * Store current routes collection to file
     * @param string $path Path to file for saving
     * @return int Amount of routes saved
     */
    public function save($path)
    {
        // TODO: Implement save() method.
    }
}
