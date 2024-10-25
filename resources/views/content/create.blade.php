<x-guest-layout>
    <!-- Status Sesi -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.content.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus placeholder="Masukkan Judul" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Deskripsi -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Deskripsi')" />
            <textarea id="description" name="description" rows="4" required class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- URL Video -->
        <div class="mt-4">
            <x-input-label for="url_video" :value="__('URL Video')" />
            <x-text-input id="url_video" class="block mt-1 w-full" type="url" name="url_video" :value="old('url_video')" required placeholder="Masukkan URL Video" />
            <x-input-error :messages="$errors->get('url_video')" class="mt-2" />
        </div>

        <!-- Harga -->
        <div class="mt-4">
            <x-input-label for="price" :value="__('Harga')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" placeholder="Masukkan Harga (Opsional)" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <!-- Gambar -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Gambar')" />
            <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Kategori -->
        <div class="mt-4">
            <x-input-label for="category" :value="__('Kategori')" />
            <select id="category" name="category" required class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih Kategori</option>
                <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>Laravel</option>
                <option value="science" {{ old('category') == 'science' ? 'selected' : '' }}>PHP</option>
                <option value="art" {{ old('category') == 'art' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Tombol Submit -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
