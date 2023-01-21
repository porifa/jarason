<?php

namespace Porifa\Jarason\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Porifa\Jarason\JarasonServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            JarasonServiceProvider::class,
        ];
    }
}
