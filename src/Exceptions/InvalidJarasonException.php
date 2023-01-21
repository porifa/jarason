<?php

namespace Porifa\Jarason\Exceptions;

use Exception;

class InvalidSomething extends Exception
{
    public function __construct()
    {
        parent::__construct(
            'Something is Invalid'
        );
    }
}
