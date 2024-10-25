<nav x-data="{ open: false }" style="background-color: #10388B;" class="border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo3.png') }}" alt="Logo" class="block h-12 w-auto">
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-auto space-x-4"> <!-- Menambahkan jarak antar item -->
                @auth
                    <x-nav-link :href="Auth::user()->userType == 'admin' ? url('/admin/dashboard') : url('/')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                @else
                    <a href="{{ url('/login') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400">
                        {{ __('Sign In') }}
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ url('/register') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400">
                            {{ __('Sign Up') }}
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black-400 hover:text-black-500 hover:bg-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="Auth::user()->userType == 'admin' ? url('/admin/dashboard') : url('/')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @else
                    <a href="{{ url('/login') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-blue-600">
                        {{ __('Sign In') }}
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ url('/register') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-green-600">
                            {{ __('Sign Up') }}
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>
