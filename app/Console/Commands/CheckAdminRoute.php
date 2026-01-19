<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckAdminRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-admin-route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking admin route...');
        try {
            $request = \Illuminate\Http\Request::create('/admin', 'GET');
            $response = app('router')->dispatch($request);
            $this->info('Route exists and is accessible. Status: ' . $response->getStatusCode());
            if ($response->getStatusCode() == 500) {
                $this->error('500 error detected. Checking logs...');
                $logPath = storage_path('logs/laravel.log');
                if (file_exists($logPath)) {
                    $logs = file($logPath);
                    $lastLines = array_slice($logs, -10);
                    $this->error('Last 10 lines of log:');
                    foreach ($lastLines as $line) {
                        $this->error($line);
                    }
                }
            }
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
