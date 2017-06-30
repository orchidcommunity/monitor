<?php

use Orchid\Monitor\Monitor;
use PHPUnit\Framework\TestCase;

class MonitorTest extends TestCase
{
    /**
     * @var
     */
    public $monitor;

    public function setUp()
    {
        $this->monitor = new Monitor();
    }

    /**
     * test.
     */
    public function test_is_info()
    {
        $info = $this->monitor->info();

        $this->assertEquals(true, property_exists($info, 'uname'));
        $this->assertEquals(true, property_exists($info, 'webserver'));
        $this->assertEquals(true, property_exists($info, 'phpVersion'));
        $this->assertEquals(true, property_exists($info, 'cpu'));
    }

    /**
     * test.
     */
    public function test_is_hardware()
    {
        $hardware = $this->monitor->hardware();

        $this->assertEquals(true, property_exists($hardware, 'temperature'));
        $this->assertEquals(true, property_exists($hardware, 'uptime'));
    }

    /**
     * test.
     */
    public function test_is_loadAverage()
    {
        $loadAverage = $this->monitor->loadAverage();

        $this->assertEquals(true, property_exists($loadAverage, 'oneMin'));
        $this->assertEquals(true, property_exists($loadAverage, 'fiveMins'));
        $this->assertEquals(true, property_exists($loadAverage, 'fifteenMins'));
    }

    /**
     * test.
     */
    public function test_is_memory()
    {
        $memory = $this->monitor->memory();

        $this->assertEquals(true, property_exists($memory, 'total'));
        $this->assertEquals(true, property_exists($memory, 'used'));
        $this->assertEquals(true, property_exists($memory, 'buffers'));
        $this->assertEquals(true, property_exists($memory, 'cache'));
    }

    /**
     * test.
     */
    public function test_is_network()
    {
        $network = $this->monitor->network();

        $this->assertEquals(true, property_exists($network, 'down'));
        $this->assertEquals(true, property_exists($network, 'up'));
    }

    /**
     * test.
     */
    public function test_is_storage()
    {
        $storage = $this->monitor->storage();

        $this->assertEquals(true, !is_null($storage));
    }
}
