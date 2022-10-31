<?php

namespace App\Service;

use Illuminate\Support\Facades\Facade;

class Tenants extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Tenants';
    }

}
