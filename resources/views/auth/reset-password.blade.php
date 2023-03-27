<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="space-y-4 sm:space-y-6">
            <div class="text-sm">{{ trans('Veuillez renseigner votre nouveau mot de passe afin de le réinitialiser.') }}</div>

            <x-input
                label="{{ trans('Email') }}"
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
            />

            <x-input
                label="{{ trans('Password') }}"
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <div class="grid grid-cols-1 gap-4 sm:gap-6 ">
                <x-button
                    dark
                    class="col-span-1"
                    type="submit"
                    :label="trans('Reset Password')"
                />

                <x-button
                    class="col-span-1"
                    href="{{ route('login') }}"
                    :label="trans('Rejoindre la page de connexion')"
                />
            </div>
        </div>
    </form>
</x-guest-layout>
