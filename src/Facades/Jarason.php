<?php

namespace Porifa\Jarason\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Porifa\Jarason\Jarason
 */
class Jarason extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Porifa\Jarason\Jarason::class;
    }
}
