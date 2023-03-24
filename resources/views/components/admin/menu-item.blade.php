@props([
    'label' => null,
    'href' => null,
    'icon' => null,
    'activeRoutePattern' => null,
])

<li>
    <a
        href="{{ $href }}"
        @class([
            'flex items-center justify-between gap-2 p-2 text-base hover:bg-gray-200 rounded-lg group',
            'bg-gray-100 font-medium' => request()->routeIs($activeRoutePattern),
        ])
        x-on:click="appMenuIsOpen = ! (window.innerWidth < 768)"
    >
        <span class="text-gray-700 hover:text-gray-900">
            {{ $label }}
        </span>
        @if (null !== $icon)
            <x-icon
                :name="$icon"
                class="w-5 h-5 transition text-gray-600 duration-75 group-hover:text-gray-900"
            />
        @endif
    </a>
</li>
