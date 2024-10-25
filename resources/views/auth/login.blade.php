<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required autofocus autocomplete="username"
                                    placeholder="Enter Your Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"
                          placeholder="Enter Your Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>


        <x-primary-button style="background-color: #FF7C0C;" class="w-full py-3 rounded-full text-white text-center mt-4 flex items-center justify-center">
            {{ __('Log in') }}
        </x-primary-button>
    </form>

    <!-- Social Sign In Buttons -->
    <div class="mt-6">
        <div class="flex flex-col space-y-4">
            <!-- Google Sign Up Button -->
            <a href="{{ route('auth.google') }}" class="flex items-center justify-center bg-white border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-6 h-6 mr-2">
                <span class="ml-2">Sign Up with Google</span>
            </a>

            <!-- GitHub Sign Up Button -->
            <a href="{{ route('auth.github') }}" class="flex items-center justify-center bg-white border border-gray-300 py-2 rounded-md hover:bg-gray-100">
                <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="GitHub Logo" class="w-6 h-6 mr-2">
                <span class="ml-2">Sign Up with GitHub</span>
            </a>
        </div>
    </div>
</x-guest-layout>
