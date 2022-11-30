<?php

namespace Database\Seeders\Landlord;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = [
            ['name'=> 'tenant1', 'domain'=>'app1.multitenant.test' , 'database'=>'tenant1'],
            ['name'=> 'tenant2', 'domain'=>'app2.multitenant.test' , 'database'=>'tenant2'],
            ['name'=> 'tenant3', 'domain'=>'app3.multitenant.test' , 'database'=>'tenant3'],
        ];

        Tenant::insert($tenant);
    }
}
