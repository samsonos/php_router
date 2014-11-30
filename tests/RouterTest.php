<?php
namespace tests;

/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>
 * on 04.08.14 at 16:42
 */
class RouterTest extends \PHPUnit_Framework_TestCase
{
    /** @var \samson\router\Router Pointer to file service */
    public $router;

    /** Tests init */
    public function setUp()
    {
        // Get instance using services factory as error will signal other way
        $this->router = \samson\core\Service::getInstance('samson\router\Router');

        // Initialize service
        $this->router->init(array());
    }
}
