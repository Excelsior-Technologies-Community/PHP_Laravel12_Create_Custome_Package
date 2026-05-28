<?php

namespace DemoVendor\DemoPackage\Tests;

use Orchestra\Testbench\TestCase;
use DemoVendor\DemoPackage\Providers\DemoPackageServiceProvider;

class DemoPackageTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [DemoPackageServiceProvider::class];
    }

    /** @test */
    public function test_package_route_returns_ok()
    {
        $response = $this->get('/demo-package');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_config_can_be_merged()
    {
        $this->assertEquals('Hello from DemoPackage!', config('demopackage.message'));
    }
}