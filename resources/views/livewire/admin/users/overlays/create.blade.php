<x-wire-elements-pro::tailwind.slide-over on-submit="submit">
    <div class="space-y-4">
        <x-input wire:model="user.name" label="Nom d'utilisateur" autofocus />
        <x-input wire:model="user.email" label="Adresse email" />
        <x-select
            wire:model="roles"
            label="Roles"
            multiselect
            :options="\Spatie\Permission\Models\Role::all()"
            option-value="id"
            option-label="name"
        />

        <x-alert>
            L'utilisateur devra suivre la procédure de réinitialisation de mot de passe pour pouvoir se connecter
        </x-alert>
    </div>

    <x-slot:title>{{ $overlayTitle }}</x-slot:title>

    <x-slot:buttons>
        <x-buttons.submit />
        <x-buttons.cancel />
    </x-slot:buttons>
</x-wire-elements-pro::tailwind.slide-over>