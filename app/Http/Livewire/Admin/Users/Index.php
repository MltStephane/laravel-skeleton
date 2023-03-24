<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use WireElements\Pro\Concerns\InteractsWithConfirmationModal;

class Index extends Component
{
    use WithPagination;
    use InteractsWithConfirmationModal;

    public function render()
    {
        $allUsers = User::all();
        $newUsers = $allUsers->count() + 1;
        $oldUsers = $allUsers->where('created_at', '<', now()->subMonth())->count() + 1;

        return self::adminView('livewire.admin.users.index', [
            'users' => User::paginate(),
            'userIncreasePercentage' => (($newUsers - $oldUsers) / $oldUsers) * 100,
        ]);
    }

    public function impersonate(User $user)
    {
        $this->redirectRoute('impersonate', $user->id);
    }

    public function delete(string $userId)
    {
        $this->askForConfirmation(function () use ($userId) {
            $user = User::findOrFail($userId);

            if (null === $user || $user->hasRole('admin')) {
                return;
            }

            $user->delete();
        });
    }
}
