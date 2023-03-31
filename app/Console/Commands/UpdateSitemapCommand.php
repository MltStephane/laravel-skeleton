<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class UpdateSitemapCommand extends Command
{
    protected $signature = 'sitemap:update';

    protected $description = 'Update the sitemap';

    public function handle(): int
    {
        $this->components->task($command, function () {
            SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
        });

        return 1;
    }
}
