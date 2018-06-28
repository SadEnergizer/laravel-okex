<?php

namespace Sadenergizer\Okex;

use Illuminate\Support\Facades\Facade;

class Okex extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'okex';
    }
}
