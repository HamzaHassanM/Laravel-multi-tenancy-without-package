<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Tenants extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Tenants';
    }
}
