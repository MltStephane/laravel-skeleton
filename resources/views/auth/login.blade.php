<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="space-y-2 md:space-y-6">
            <x-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                :label="__('Email')"
            />

            <x-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                :label="__('Password')"
            />

            <x-checkbox
                id="remember_me"
                name="remember"
                :label="__('Remember me')"
            />

            <x-button dark class="w-full" type="submit" label="Connexion" />

            <hr />

            <div class="grid grid-cols-2 gap-4 sm:gap-6 ">
                <x-button
                    class="col-span-2 md:col-span-1"
                    href="{{ route('register') }}"
                    label="Page d'inscription"
                />
                <x-button
                    class="col-span-2 md:col-span-1"
                    href="{{ route('password.request') }}"
                    label="Mot de passe oublié"
                />
            </div>

            <div class="text-center">
                <a
                    href="{{ route('public.homepage') }}"
                    class="text-sm text-gray-500"
                >
                    Retourner sur le site
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
