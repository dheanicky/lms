<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Edit Content Form -->
                    <h3 class="text-lg font-medium mb-6">Edit Content</h3>

                    <form action="{{ route('admin.content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $content->title) }}"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $content->description) }}</textarea>
                        </div>

                        <!-- Video URL -->
                        <div class="mb-6">
                            <label for="url_video" class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
                            <input type="text" name="url_video" id="url_video" value="{{ old('url_video', $content->url_video) }}"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $content->price) }}"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" name="image_url" id="image_url" class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @if($content->image_url)
                                <img src="{{ asset('storage/' . $content->image_url) }}" alt="Current Image" class="mt-4 w-32 h-32 object-cover">
                            @endif
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $content->category) }}"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-between items-center">
                            <a href="{{ route('admin.content.index') }}" class="text-gray-700 underline">Cancel</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
