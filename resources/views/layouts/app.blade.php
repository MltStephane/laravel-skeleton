<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @googlefonts
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="max-w-7xl w-full mx-auto p-8">
            <div class="fixed items-center max-w-7xl w-full mx-auto">
                <x-card>
                    <div class="h-full flex items-center justify-between w-full">
                        <div class="flex text-xl font-semibold text-gray-600">
                            <a href="{{ route('app.homepage') }}">{{ config('app.name') }}</a>
                        </div>
                        <div class="flex items-center justify-end gap-6">
                            @hasrole('admin')
                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="text-gray-700 hover:text-blue-900 transition font-medium text-lg"
                            >
                                Panel d'administration
                            </a>
                            @endhasrole
                        </div>
                    </div>
                </x-card>
            </div>

            <main class="mt-24">
                {!! $slot !!}
            </main>
        </div>

        @impersonating($guard = null)
        <div class="fixed bottom-4 right-4">
            <x-button warning icon="user-remove" href="{{ route('impersonate.leave') }}" label="Arreter l'usurpation" />
        </div>
        @endImpersonating

        <x-notifications z-index="z-50" position="bottom-right" />

        @livewire('modal-pro')
        @livewire('slide-over-pro')

        @wireUiScripts
        @livewireScripts

        @vite('resources/js/app.js')
    </body>
</html>