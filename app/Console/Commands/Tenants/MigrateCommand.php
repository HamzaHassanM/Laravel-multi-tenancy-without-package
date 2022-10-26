<?php

namespace App\Console\Commands\Tenants;

use App\Models\Tenant;
use App\Service\TenantServcie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenants migration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $tenants = Tenant::get();
        $tenants->each(function ($tenant){
            TenantServcie::switchToTenant($tenant);
            $this->info('Start migrating : '.$tenant->domain);
            $this->info('---------------------------------------');
            Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
