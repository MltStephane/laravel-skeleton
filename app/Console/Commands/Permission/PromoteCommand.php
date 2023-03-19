<?php

declare(strict_types=1);

namespace App\Console\Commands\Permission;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class PromoteCommand extends Command
{
    protected $signature = 'permission:promote-user';

    protected $description = 'Assign a role to a user (Laravel Permission)';

    public function handle(): int
    {
        $this->components->info($this->description);

        $users = User::query()->pluck('email')->toArray();
        $roles = Role::all()->pluck('name')->toArray();

        $userEmail = $this->components->choice('Select an user', $users);

        while (empty($userEmail)) {
            $this->components->error('User cannot be empty.');

            $userEmail = $this->components->choice('Select an user', $users);
        }

        if (User::whereEmail($userEmail)->exists()) {
            $user = User::whereEmail($userEmail)->firstOrFail();

            if ($user->getRoleNames()->isNotEmpty()) {
                $roleNames = $user->getRoleNames()->join(', ');
                $this->components->info("User {$userEmail} has roles : {$roleNames}");
            }

            $roleName = $this->components->choice('Select a role', $roles);

            while (empty($roleName)) {
                $this->components->error('User cannot be empty.');

                $roleName = $this->components->choice('Select a role', $roles);
            }

            if (Role::whereName($roleName)->exists()) {
                if ($user->hasRole($roleName)) {
                    $this->components->info("User assigned roles already contains {$roleName}");
                } else {
                    $user->assignRole($roleName);

                    if (! $user->hasRole($roleName)) {
                        $this->components->error("Role {$roleName} cannot be assigned to user");

                        return self::FAILURE;
                    } else {
                        $this->components->info("Role {$roleName} has been assigned to user");
                    }
                }
            }

            return self::SUCCESS;
        }

        return self::FAILURE;
    }
}
