@props([
    'label' => null,
])
<div>
    <div class="hidden md:block">
        {!! $slot !!}
    </div>

    <div class="block md:hidden" x-data="{ showCard: false }" @click.outside="showCard = false">
        <x-card padding="p-0">
            <x-slot:title>
                {{ $label }}
            </x-slot:title>

            <x-slot:action>
                <x-button label="Afficher" icon="plus" dark @click="showCard = !showCard" />
            </x-slot:action>

            <div x-show="showCard" class="px-4 py-5">
                <div>
                    {!! $slot !!}
                </div>
            </div>
        </x-card>
    </div>
</div>
