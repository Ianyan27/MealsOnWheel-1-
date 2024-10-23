<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="font-semibold text-lg" />
                <x-input id="email" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
            </div>

            <!-- Password Input -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="font-semibold text-lg" />
                <x-input id="password" class="block mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center mt-6">
                <x-button class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-150">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="flex items-center justify-center mt-6">
            <a class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold" href="{{ route('register') }}">
                {{ __('Don’t have an account? Register') }}
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
