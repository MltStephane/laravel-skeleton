<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        $allUsers = User::all();
        $newUsers = $allUsers->count() + 1;
        $oldUsers = $allUsers->where('created_at', '<', now()->subMonth())->count() + 1;

        return self::adminView('livewire.admin.dashboard', [
            'users' => $allUsers,
            'userIncreasePercentage' => (($newUsers - $oldUsers) / $oldUsers) * 100,
        ]);
    }
}
