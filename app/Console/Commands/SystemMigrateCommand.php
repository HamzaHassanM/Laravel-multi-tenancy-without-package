<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:migrate';

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
        $this->info('Start migrating LandLord SYSTEM');
        $this->info('---------------------------------------');
        Artisan::call('migrate --path=database/migrations/system/  --database=landlord');
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
