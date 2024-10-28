<section class="bg-gray-100 p-6 flex justify-center">
    <div class="w-1/3">
        <header class="mb-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Account Info') }}
            </h2>
        </header>
    </div>

    <div class="flex items-center justify-center w-2/3 ml-10 mt-10 p-10">
        <div class="w-full max-w-full p-30">
            <form method="post" action="{{ route('profile.update') }}" class="space-y-6 bg-white p-6 rounded-md shadow-md" id="profile-form">
                @csrf
                @method('patch')

                <div class="grid grid-cols-2 gap-6">
                    <!-- Name Field -->
                    <div class="flex flex-col">
                        <x-input-label for="name" :value="('Name')" class="text-gray-600 text-sm" />
                        <div class="flex items-center mt-1">
                            <x-text-input id="name" name="name" type="text" class="w-full text-xl font-semibold text-gray-800"
                                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <button type="button" class="ml-2">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path d="M15.6 5.4l-11.2 11.2c-.1.1-.2.1-.4.1h-3c-.2 0-.4-.2-.4-.4v-3c0-.2 0-.3.1-.4l11.2-11.2c.2-.2.5-.2.7 0l2.8 2.8c.2.2.2.5 0 .7zM13 2c.1 0 .3 0 .4.1l2.5 2.5c.2.2.2.4.1.6-.1.2-.3.3-.4.3h-2.6v-2.6c0-.2 0-.3.1-.4z"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Phone Number Field -->
                    <div class="flex flex-col">
                        <x-input-label for="phone" :value="('Phone Number')" class="text-gray-600 text-sm" />
                        <div class="flex items-center mt-1">
                            <x-text-input id="phone" name="phone_number" type="text" class="w-full text-xl font-semibold text-gray-800"
                                          :value="old('phone', $user->phone_number)" required autocomplete="phone" />
                            <button type="button" class="ml-2">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path d="M15.6 5.4l-11.2 11.2c-.1.1-.2.1-.4.1h-3c-.2 0-.4-.2-.4-.4v-3c0-.2 0-.3.1-.4l11.2-11.2c.2-.2.5-.2.7 0l2.8 2.8c.2.2.2.5 0 .7zM13 2c.1 0 .3 0 .4.1l2.5 2.5c.2.2.2.4.1.6-.1.2-.3.3-.4.3h-2.6v-2.6c0-.2 0-.3.1-.4z"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <!-- Email Field -->
                    <div class="flex flex-col">
                        <x-input-label for="email" :value="('Email')" class="text-gray-600 text-sm" />
                        <div class="flex items-center mt-1">
                            <x-text-input id="email" name="email" type="email" class="w-full text-xl font-semibold text-gray-800"
                                          :value="old('email', $user->email)" required autocomplete="username" />
                            <button type="button" class="ml-2">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path d="M15.6 5.4l-11.2 11.2c-.1.1-.2.1-.4.1h-3c-.2 0-.4-.2-.4-.4v-3c0-.2 0-.3.1-.4l11.2-11.2c.2-.2.5-.2.7 0l2.8 2.8c.2.2.2.5 0 .7zM13 2c.1 0 .3 0 .4.1l2.5 2.5c.2.2.2.4.1.6-.1.2-.3.3-.4.3h-2.6v-2.6c0-.2 0-.3.1-.4z"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Password Field -->
                    <div class="flex flex-col">
                        <x-input-label for="password" :value="('Password')" class="text-gray-600 text-sm" />
                        <div class="flex items-center mt-1">
                            <x-text-input id="password" name="password" type="password" class="w-full text-xl font-semibold text-gray-800"
                                          autocomplete="new-password" />
                            <button type="button" class="ml-2">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path d="M15.6 5.4l-11.2 11.2c-.1.1-.2.1-.4.1h-3c-.2 0-.4-.2-.4-.4v-3c0-.2 0-.3.1-.4l11.2-11.2c.2-.2.5-.2.7 0l2.8 2.8c.2.2.2.5 0 .7zM13 2c.1 0 .3 0 .4.1l2.5 2.5c.2.2.2.4.1.6-.1.2-.3.3-.4.3h-2.6v-2.6c0-.2 0-.3.1-.4z"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>
                </div>

                <!-- Auto Submit Script -->
                <script>
                    document.querySelectorAll('#profile-form input').forEach(input => {
                        input.addEventListener('keydown', function(event) {
                            if (event.key === 'Enter') {
                                event.preventDefault();
                                document.getElementById('profile-form').submit();
                            }
                        });
                    });
                </script>
            </form>
        </div>
    </div>
</section>