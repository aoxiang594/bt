<?php
namespace KingHang\Bt\Tests;

use KingHang\Bt\System;
use PHPUnit\Framework\TestCase;

class SystemTest extends TestCase
{
    protected $instance;

    public function setUp()
    {
        $this->instance = new System('http://1.15.247.212:8888', 'SRAqJfXpaprHh7cu8YGRv9ywSijeb4wc');
    }

    public function testPushManager()
    {
        $this->assertInstanceOf(System::class, $this->instance);
    }

    public function testSystemTotal()
    {
        $res = $this->instance->getSystemTotal();
        $this->assertArrayHasKey('memTotal', $res);
    }

    public function testDiskInfo()
    {
        $this->assertArrayHasKey('filesystem', $this->instance->getDiskInfo()[0]);
    }
}