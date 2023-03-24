@props([
    'label' => null,
    'icon' => null,
])

<div class="p-4 space-y-2">
    <div class="px-2 font-bold text-sm text-gray-700">
        @if (null !== $icon)
            <x-icon
                :name="$icon"
                class="w-5 h-5 transition text-gray-600 duration-75 group-hover:text-gray-900"
            />
        @endif
        {{ $label }}
    </div>
    {!! $slot !!}
</div>