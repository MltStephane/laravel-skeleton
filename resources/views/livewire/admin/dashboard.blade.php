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
</div>