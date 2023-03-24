<?php

namespace App\Http\Livewire\Admin\Users\Overlays;

use App\Http\Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;

class Show extends Component
{
    public User|string $user;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->setOverlayTitle($this->user->name);
    }

    public function render(): View
    {
        return view('livewire.admin.users.overlays.show');
    }
}
