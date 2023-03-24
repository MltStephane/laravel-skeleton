<x-wire-elements-pro::tailwind.slide-over>
    <div class="space-y-4 text-gray-600">
        <div>
            <div class="font-bold text-gray-900 text-sm">Nom d'utilisateur</div>
            {{ $user->name }}
        </div>
        <div>
            <div class="font-bold text-gray-900 text-sm">Adresse email</div>
            {{ $user->email }}
        </div>
        <div>
            <div class="font-bold text-gray-900 text-sm">Date d'inscription</div>
            {{ $user->created_at->diffForHumans() }}
        </div>
        <div>
            <div class="font-bold text-gray-900 text-sm">Derniere connexion</div>
            {{ $user->last_login_at->diffForHumans() }}
        </div>
        <div>
            <div class="font-bold text-gray-900 text-sm">Roles</div>
            {{ $user->role_names }}
        </div>
    </div>

    <x-slot:title>{{ $overlayTitle }}</x-slot:title>

    <x-slot:buttons>
        <x-buttons.cancel />
    </x-slot:buttons>
</x-wire-elements-pro::tailwind.slide-over>