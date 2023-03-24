<?php

namespace App\Http\Livewire\Admin\Users\Overlays;

use App\Http\Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public User|string $user;

    public array $roles = [];

    public function mount()
    {
        $this->user = User::make();

        $this->roles[] = Role::where('name', 'user')->first()?->id;

        $this->setOverlayTitle("Création d'un nouvel utilisateur");

        $this->setSuccessMessage('Création effectuée', "L'utilisateur a été créé avec succès");
        $this->setErrorMessage('Création impossible', "L'utilisateur n'a pas pu être créé");
    }

    public function render(): View
    {
        return view('livewire.admin.users.overlays.create');
    }

    public function getRules(): array
    {
        return $this->user->validationRules();
    }

    public function submit()
    {
        $this->execute(function () {
            $this->user->password = str()->password(length: 12, symbols: false);

            $saved = $this->user->save();

            if ($saved) {
                $this->user->roles()->sync($this->roles);
            }

            return $saved;
        });
    }
}
