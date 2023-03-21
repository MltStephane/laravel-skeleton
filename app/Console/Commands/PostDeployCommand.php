<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;

class PostDeployCommand extends Command
{
    protected $signature = 'post-deploy';

    protected $description = 'Execute post deployment script';

    public function handle(): void
    {
        $start = microtime(true);

        $categorizedCommands = [
            'Dependencies & assets' => [
                'php8.2 /usr/local/bin/composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader',
                'npm install',
                'npm run build',
            ],
            'Artisan' => [
                'artisan migrate --force',
                'artisan optimize',
                'artisan route:clear',
                'artisan schedule:clear-cache',
                'artisan queue:restart',
            ],
        ];

        foreach ($categorizedCommands as $category => $commands) {
            $this->components->info($category);

            foreach ($commands as $command) {
                $this->components->task($command, function () use ($command) {
                    if (str($command)->contains('artisan')) {
                        Artisan::call(str($command)->remove('artisan')->trim()->toString());
                    } else {
                        Process::run($command);
                    }
                });
            }

            $this->newLine();
        }

        $totalDuration = number_format((microtime(true) - $start) * 1000);

        $this->components->info("Total duration : {$totalDuration}ms.");
    }
}
