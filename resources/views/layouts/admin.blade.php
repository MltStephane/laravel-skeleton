<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @googlefonts
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
        @livewireStyles
    </head>
    <body
        class="font-sans antialiased bg-gray-100"
        x-on:resize.window="sidebarIsOpen = (window.innerWidth < 768) ? false : true"
        x-data="{ sidebarIsOpen: (window.innerWidth < 768) ? false : true }"
    >
        <x-admin.topbar />

        <div class="flex pt-16 overflow-hidden">
            <x-admin.sidebar />

            <div
                class="fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/90"
                x-cloak
                x-show="(window.innerWidth < 768) && sidebarIsOpen"
            ></div>

            <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64">
                <main class="px-4 py-6">
                    {!! $slot !!}
                </main>
            </div>
        </div>

        <x-notifications z-index="z-50" position="bottom-right" />

        @livewire('modal-pro')
        @livewire('slide-over-pro')

        @wireUiScripts
        @livewireScripts

        @vite('resources/js/app.js')
    </body>
</html>
