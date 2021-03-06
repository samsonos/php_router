<?php
/**
 * Created by PhpStorm.
 * User: egorov
 * Date: 30.11.2014
 * Time: 15:06
 */
namespace samson\router;

/**
 * Generic routing interface
 * @package samson\router
 */
interface IRouter
{
    /**
     * Add route
     * @param string        $template   Template for matching
     * @param callable      $handler    External handler
     * @param string|null   $name       Unique route name, if not passed it would be generated
     * @return IRoute|bool Created route or false if something went wrong
     */
    public function add($template, $handler, $name = null);

    /**
     * Find IRoute instance by unique name
     * @param string $name Unique route name
     * @return IRoute|bool Found IRoute instance or false
     */
    public function get($name);

    /**
     * Perform route searching using template
     * @param string $template Template for route search
     * @return IRoute|bool Found IRoute instance or false
     */
    public function search($template);

    /**
     * Load routes collection from file or folder.
     * If folder is passed then all files matching *Route.php would
     * be loaded.
     * @param string $path Path to file or folder for loading
     * @return int Amount of routes loaded
     */
    public function load($path);

    /**
     * Store current routes collection to file
     * @param string $path Path to file for saving
     * @return int Amount of routes saved
     */
    public function save($path);
}

