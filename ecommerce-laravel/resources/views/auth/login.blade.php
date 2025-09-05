<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-pink-100 to-purple-200">
        <div class="bg-pink-400 p-8 rounded-2xl shadow-lg w-full max-w-md">
            <!-- Heading -->
            <h2 class="text-3xl font-bold text-white text-center mb-6">Log in with FOODIES</h2>

            <x-validation-errors class="mb-4 text-white" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-white text-center bg-green-500 p-2 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mb-4">
                    <label for="remember_me" class="flex items-center text-white">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white hover:text-yellow-200" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4 bg-white text-pink-500 hover:bg-pink-100">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <!-- Register link -->
            <p class="mt-6 text-center text-white">
                Don't have an account? 
                <a href="{{ route('register') }}" class="underline font-semibold hover:text-yellow-200">Register</a>
            </p>
        </div>
    </div>
</x-guest-layout>
