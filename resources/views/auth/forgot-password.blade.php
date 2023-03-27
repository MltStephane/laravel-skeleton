<x-guest-layout>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="space-y-4 sm:space-y-6">
            <div class="space-y-2">
                <h1 class="text-lg">{{ trans('Mot de passe oublié ?') }}</h1>
                <div class="text-sm">{{ trans('Veuillez nous indiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe.') }}</div>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <x-input
                label="{{ trans('Email') }}"
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            >
                <x-slot name="append">
                    <div class="absolute inset-y-0 right-0 flex items-center p-0">
                        <x-button dark class="col-span-1 rounded-l-none" type="submit">
                            {{ trans('Réinitialiser') }}
                        </x-button>
                    </div>
                </x-slot>
            </x-input>

            <hr />

            <div class="grid grid-cols-1 gap-4 sm:gap-6 ">
                <x-button class="col-span-1" href="{{ route('login') }}">
                    {{ trans("Rejoindre la page de connexion") }}
                </x-button>
            </div>
        </div>
    </form>
</x-guest-layout>
