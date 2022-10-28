<?php

namespace App\Console\Commands\Tenants;

use App\Models\Tenant;
use App\Service\TenantServcie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:seeder {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $class = $this->argument('class');
        $tenants = Tenant::get();
        $tenants->each(function ($tenant) use($class){
            TenantServcie::switchToTenant($tenant);
            $this->info('Start seeding : '.$tenant->domain);
            $this->info('---------------------------------------');
            Artisan::call('db:seed' , [
                '--class' => 'Database\\Seeders\\Tenants\\'.$class,
                '--database' => 'tenant'
            ]);
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
