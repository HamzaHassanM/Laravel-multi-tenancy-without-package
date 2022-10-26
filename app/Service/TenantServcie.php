<?php

namespace App\Service;

use Exception;
use App\Models\Tenant;
use Illuminate\Validation\ValidationException;
use Symfony\Component\CssSelector\Exception\ParseException;

class TenantServcie
{

    private static $tenant;
    private static$domain;
    private static $database;

    public static function switchToTenant(Tenant $tenant)
    {
        if(!$tenant instanceof Tenant){
            // throw error or tenant class 
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }
        \DB::purge('system');
        \Config::set('database.connections.tenant.database' , $tenant->database);

        Self::$tenant = $tenant;
        Self::$domain = $tenant->domain;
        Self::$database = $tenant->database;
        \DB::connection('tenant')->reconnect();
        \DB::setDefaultConnection('tenant');
    }

    public static function switchToDefault()
    {
        \DB::purge('system');
        \DB::purge('tenant');
        \DB::connection('system')->reconnect();
        \DB::setDefaultConnection('system');
    }


    public static function getTenant(){
        return Self::$tenant;
    }

}
