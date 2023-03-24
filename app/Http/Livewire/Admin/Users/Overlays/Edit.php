<?php

namespace App\Http\Livewire\Admin\Users\Overlays;

use App\Http\Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;

class Edit extends Component
{
    public User|string $user;

    public array $roles;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = $user->roles()->pluck('id')->toArray();

        $this->setOverlayTitle("Modifier l'utilisateur {$this->user->name}");

        $this->setSuccessMessage('Modification effectuée', "L'utilisateur a été modifié avec succès");
        $this->setErrorMessage('Modification impossible', "L'utilisateur n'a pas pu être modifié");
    }

    public function render(): View
    {
        return view('livewire.admin.users.overlays.edit');
    }

    public function getRules(): array
    {
        return $this->user->validationRules();
    }

    public function submit()
    {
        $this->execute(function () {
            $saved = $this->user->save();

            if ($saved) {
                $this->user->roles()->sync($this->roles);
            }

            return $saved;
        });
    }
}
