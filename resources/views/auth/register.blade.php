<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="space-y-2 md:space-y-6">
            <x-input
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                :label="__('Name')"
            />

            <x-input
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                :label="__('Email')"
            />
            <x-input
                type="password"
                name="password"
                required
                autocomplete="new-password"
                :label="__('Password')"
            />
            <x-input
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                :label="__('Confirm Password')"
            />

            <x-button dark class="w-full" type="submit" label="Connexion" />

            <hr />

            <div class="grid grid-cols-2 gap-4 sm:gap-6 ">
                <x-button
                    class="col-span-2 md:col-span-1"
                    href="{{ route('login') }}"
                    label="Page de connexion"
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
