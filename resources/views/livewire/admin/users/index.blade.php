@push('actions')
    <x-button
        positive
        label="Ajouter un utilisateur"
        icon="user-add"
        onclick="Livewire.emit('slide-over.open', 'admin.users.overlays.create')"
    />
@endpush

<div class="space-y-6">
    <x-admin.card.responsive label="Statistiques">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <x-admin.card.data
                label="Utilisateurs"
                icon="users"
                :data="$users->count()"
                :increase-data="$userIncreasePercentage"
            />
        </div>
    </x-admin.card.responsive>

    <x-admin.table :labels="['Utilisateur', 'Email', 'Roles', 'Date d\'inscription', 'Dernière connexion']">
        @foreach ($users as $user)
            <tr>
                <td class="p-4">
                    {{ $user->name }}
                </td>
                <td class="p-4">
                    {{ $user->email }}
                </td>
                <td class="p-4">
                    {{ $user->role_names }}
                </td>
                <td class="p-4">
                    {{ $user->created_at->diffForHumans() }}
                </td>
                <td class="p-4">
                    {{ $user->last_login_at?->diffForHumans() }}
                </td>
                <td class="p-4 flex gap-2 justify-end">
                    <x-button
                        icon="eye"
                        primary
                        wire:click="$emit('slide-over.open', 'admin.users.overlays.show', { 'user': '{{ $user->id }}'})"
                    />
                    <x-button
                        icon="pencil"
                        secondary
                        wire:click="$emit('slide-over.open', 'admin.users.overlays.edit', { 'user': '{{ $user->id }}'})"
                    />
                    <x-button
                        icon="users"
                        warning
                        wire:click="impersonate('{{ $user->id }}')"
                        :disabled="! $user->canBeImpersonated()"
                        x-tooltip.placement.top.raw="Usurper cet utilisateur"
                    />
                    <x-button
                        icon="trash"
                        red
                        wire:click="delete('{{ $user->id }}')"
                        :disabled="$user->hasRole('admin')"
                    />
                </td>
            </tr>
        @endforeach
    </x-admin.table>
</div>
