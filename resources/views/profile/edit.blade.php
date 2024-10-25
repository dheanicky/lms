<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Container utama dengan Flexbox -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-6">
            <!-- Sidebar -->
            <div class="w-1/4 bg-white p-4 rounded-lg shadow">
                <div class="text-center">
                    <!-- Avatar -->
                    <div class="bg-gray-200 p-2 rounded-full mb-4 flex justify-center items-center w-24 h-24 mx-auto">
                        <svg class="h-16 w-16 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <!-- Nama User -->
                    <p class="font-semibold text-lg">{{ Auth::user()->name }}</p>
                </div>
                <!-- Navigasi Sidebar -->
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="{{route('profile.update')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">Account Info</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">My Course</a>
                    </li>
                    <li>
                        <a href="{{route('profile.destroy')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-lg">Language</a>
                    </li>
                </ul>
            </div>

            <!-- Form Profil -->
            <div class="w-3/4 bg-white p-4 rounded-lg shadow">
                <div class="max-w-full ">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
