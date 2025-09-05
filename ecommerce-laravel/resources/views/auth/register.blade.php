<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-pink-100 to-purple-200">
        <div class="bg-pink-400 p-8 rounded-2xl shadow-lg w-full max-w-md">
            <!-- Heading -->
            <h2 class="text-3xl font-bold text-white text-center mb-6">Register with FOODIES</h2>

            <x-validation-errors class="mb-4 text-white" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <x-label for="name" value="{{ __('Name') }}" class="text-white" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms" class="text-white">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2 text-sm text-white">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-yellow-200">Terms of Service</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-yellow-200">Privacy Policy</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-white hover:text-yellow-200" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4 bg-white text-pink-500 hover:bg-pink-100">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
