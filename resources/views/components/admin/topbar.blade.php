<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 px-4 md:px-6 h-16 flex items-center justify-between">
    <div class="flex items-center gap-2">
        <button
            x-on:click="sidebarIsOpen = ! sidebarIsOpen"
            aria-expanded="true"
            aria-controls="sidebar"
            x-cloak
            x-show="(window.innerWidth < 768)"
            class="p-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        >
            <x-icon
                name="menu"
                x-show="! sidebarIsOpen"
                class="w-6 h-6"
            />
            <x-icon
                name="x"
                x-show="sidebarIsOpen"
                class="w-6 h-6"
            />
        </button>
        <a
            href="{{ route('admin.dashboard') }}"
            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
        >
            {{ config('app.name') }}
        </a>
    </div>

    <div class="flex items-center gap-2">
        <div class="hidden md:inline-block">
            @stack('actions')
        </div>
        <div class="inline-block md:hidden" x-data="{ showActions: false }" @click.outside="showActions = false">
            <x-button icon="dots-horizontal" @click="showActions = ! showActions" />
            <div x-cloak x-show="showActions" class="absolute left-4 top-16 right-4">
                <x-card padding="p-2" class="flex flex-col flex-grow">
                    @stack('actions')
                </x-card>
            </div>
        </div>


        <x-dropdown>
            <x-slot name="trigger">
                <div class="hidden md:inline-block">
                    <x-button label="{{ auth()->user()->name }}" light />
                </div>
                <div class="inline-block md:hidden">
                    <x-button icon="user" light />
                </div>
            </x-slot>

            <x-dropdown.item label="Help Center" />
            <x-dropdown.item separator label="Live Chat" />
            <x-dropdown.item separator label="Logout" />
        </x-dropdown>
    </div>
</nav>