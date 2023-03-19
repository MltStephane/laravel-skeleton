<?php

namespace App\Console\Commands\Permission;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class SetupCommand extends Command
{
    protected $signature = 'permission:setup';

    protected $description = 'Setup permissions by generating the default roles.';

    public function handle(): void
    {
        $roles = ['admin', 'user'];

        $this->components->info('Setup permissions by generating the default roles : ' . implode(', ', $roles));

        foreach ($roles as $role) {
            $this->components->task(str($role)->title(), function () use ($role) {
                return Role::updateOrCreate(['name' => $role]);
            });
        }
    }
}
