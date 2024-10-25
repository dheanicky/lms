@extends('layouts.front')

@section('meta')
<meta name="description" content="Learn the Digital World in a Smart Way">
@endsection

@section('title')
<title>Code Verse Learning</title>
@endsection

@section('content')

<!-- Main Content Section -->
<main class="text-center py-20">
    <h1 class="text-3xl md:text-5xl font-bold mb-6">Learn the Digital World in a Smart Way</h1>
    <h5 class="text-lg md:text-xl mb-8">Welcome to the most captivating, finger-flying, addictive way to learn to code</h5>
    <button style="background-color: #FF7C0C;" class="text-white px-8 py-4 rounded mb-6">Start Now</button>
    <p class="text-sm text-gray-600">More than 136,900+ People study at Skilvul</p>

    <!-- Bubble Text Section -->
    <div class="relative">
        <span class="absolute top-12 left-10 bg-white text-black-600 rounded-full px-4 py-2 text-sm">DevOps</span>
        <span class="absolute bottom-12 right-10 bg-white black-gray-600 rounded-full px-4 py-2 text-sm">FrontEnd Developer</span>
        <span class="absolute top-12 right-10 bg-white text-black-600 rounded-full px-4 py-2 text-sm">Others</span>
        <span class="absolute top-36 right-20 bg-white text-black-600 rounded-full px-4 py-2 text-sm">UI / UX</span>
        <span class="absolute bottom-12 left-20 bg-white text-black-600 rounded-full px-4 py-2 text-sm">BackEnd Developer</span>
    </div>
</main>

<!-- Banner/Promo Section -->
<div class="relative py-12 px-5">
    <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-orange-400 text-white rounded-full p-2 z-10" onclick="scrollLeft()" style="pointer-events: auto;">&#10094;</button>
    <div class="overflow-x-scroll whitespace-nowrap scroll-smooth">
        <div class="inline-block w-96 h-60 bg-gray-300 rounded-lg overflow-hidden mr-4">
            <img src="{{asset('img/poster.jpg')}}" alt="Promo 1" class="w-full h-full object-cover">
        </div>
        <div class="inline-block w-96 h-60 bg-gray-300 rounded-lg overflow-hidden mr-4">
            <img src="img/poster2.jpg" alt="Promo 2" class="w-full h-full object-cover">
        </div>
        <div class="inline-block w-96 h-60 bg-gray-300 rounded-lg overflow-hidden mr-4">
            <img src="img/poster3.jpg" alt="Promo 3" class="w-full h-full object-cover">
        </div>
        <div class="inline-block w-96 h-60 bg-gray-300 rounded-lg overflow-hidden mr-4">
            <img src="path-to-your-image4.jpg" alt="Promo 4" class="w-full h-full object-cover">
        </div>
    </div>
    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-orange-400 text-white rounded-full p-2 z-10" onclick="scrollRight()" style="pointer-events: auto;">&#10095;</button>
</div>




{{-- card --}}
<section class="bg-blue-900 py-12">
    <div class="text-center mb-8">
        <h2 class="text-white text-3xl font-bold">Why settle for mediocrity?</h2>
        <p class="text-white mt-4">The only way to become a great developer is to write a lot of code</p>
    </div>

    <!-- Cards container -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
        <!-- Card 1 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <img src="{{asset('img/tutor.jpg')}}" alt="Icon" class="mx-auto w-10 h-10 mb-4">
                <h3 class="text-xl font-bold mb-2">Avoid tutorial hell</h3>
                <p>by writing a ton of code</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <div class="bg-white mx-auto w-10 h-10 mb-4"></div>
                <h3 class="text-xl font-bold mb-2">Stay motivated with</h3>
                <p>dopamine-driven development</p>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <img src="{{asset('img/project3.jpg')}}" alt="Icon" class="mx-auto w-10 h-10 mb-4">
                <h3 class="text-xl font-bold mb-2">Build portfolio projects</h3>
                <p>to prove your skills</p>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <img src="{{asset('img/developer.jpg')}}" alt="Icon" class="mx-auto w-10 h-10 mb-4">
                <h3 class="text-xl font-bold mb-2">Delve deeper</h3>
                <p>into foundational concepts</p>
            </div>
        </div>
        <!-- Card 5 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <img src="{{asset('img/learning.jpg')}}" alt="Icon" class="mx-auto w-10 h-10 mb-4">
                <h3 class="text-xl font-bold mb-2">Learn flexibly online</h3>
                <p>without interrupting your life</p>
            </div>
        </div>
        <!-- Card 6 -->
        <div class="bg-blue-700 text-white p-6 rounded-lg">
            <div class="text-center">
                <div class="bg-white mx-auto w-10 h-10 mb-4"></div>
                <h3 class="text-xl font-bold mb-2">For 1% the price of college</h3>
                <p>to minimize your financial risk</p>
            </div>
        </div>
    </div>
</section>

<!-- Best Seller Course Section -->
<section class="bg-white py-12 mt-2">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <button style="background-color: #FF7C0C;" class="text-white px-8 py-4 rounded-lg mb-6 ">
            Best Seller Course
        </button>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Course 1 -->
            <div class="border rounded-lg p-4 shadow-md relative">
                <div class="h-40 bg-gray-300 mb-4 flex justify-center items-center relative">
                    <img src="{{ asset('img/contoh.png')}}" alt="Course Thumbnail" class="w-full h-full object-cover">
                    <span class="absolute top-2 right-2 bg-blue-500 text-white text-xs py-1 px-2 rounded-md">New</span>
                </div>
                <h3 class="text-lg font-semibold text-left">Laravel: Pemula sampai Mahir</h3>
                <p class="text-gray-500 text-sm mb-3 text-left">(Jumlah Materi)</p>

                <div class="flex items-center gap-3 mb-11">
                    <span class="text-gray-600 mb-3 text-sm">4.0</span>
                    <span class="text-yellow-500 mb-3 text-sm">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    <span class="text-gray-500 mb-3 text-sm">(3490)</span>
                </div>
                <p class="text-gray-600 line-through text-sm text-left">Rp 900.000</p>
                <p class="text-red-500 font-bold text-xl text-left">Rp 453.000</p>
            </div>

            <!-- Course 2 -->
            <div class="border rounded-lg p-4 shadow-md relative">
                <div class="h-40 bg-gray-300 mb-4 flex justify-center items-center relative">
                    <img src="{{ asset('img/contoh.png')}}" alt="Course Thumbnail" class="w-full h-full object-cover">
                    <span class="absolute top-2 right-2 bg-green-500 text-white text-xs py-1 px-2 rounded-md">Best Seller</span>
                </div>
                <h3 class="text-lg font-semibold mb-3 text-left">Pemrograman Go-Lang: Pemula sampai Mahir</h3>
                <p class="text-gray-500 text-sm mb-3 text-left">(Jumlah Materi)</p>

                <div class="flex items-center gap-3 mb-4">
                    <span class="text-black-600 text-sm">4.0</span>
                    <span class="text-yellow-500 text-sm">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    <span class="text-gray-500 text-sm">(3490)</span>
                </div>

                <p class="text-gray-600 line-through text-sm mb-1 text-left">Rp 900.000</p>
                <p class="text-red-500 font-bold text-xl text-left">Rp 453.000</p>
            </div>


            <!-- Course 3 -->
            <div class="border rounded-lg p-4 shadow-md relative">
                <div class="h-40 bg-gray-300 mb-4 flex justify-center items-center relative">
                    <img src="{{ asset('img/contoh.png')}}" alt="Course Thumbnail" class="w-full h-full object-cover">
                    <span class="absolute top-2 right-2 bg-green-500 text-white text-xs py-1 px-2 rounded-md">Best Seller</span>
                </div>
                <h3 class="text-lg font-semibold mb-2 text-left">Pemrograman Go-Lang: Pemula sampai Mahir</h3>
                <p class="text-gray-500 text-sm mb-3 text-left">(Jumlah Materi)</p>
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-gray-600 text-sm">4.0</span>
                    <span class="text-yellow-500 text-sm">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    <span class="text-gray-500 text-sm">(3490)</span>
                </div>
                <p class="text-gray-600 line-through text-sm mb-1 text-left">Rp 900.000</p>
                <p class="text-red-500 font-bold text-xl text-left">Rp 453.000</p>
            </div>

            <!-- Course 4 -->
            <div class="border rounded-lg p-4 shadow-md relative">
                <div class="h-40 bg-gray-300 mb-4 flex justify-center items-center relative">
                    <img src="{{ asset('img/contoh.png')}}" alt="Course Thumbnail" class="w-full h-full object-cover">
                    <span class="absolute top-2 right-2 bg-blue-500 text-white text-xs py-1 px-2 rounded-md">New</span>
                </div>
                <h3 class="text-lg font-semibold text-left">Laravel: Pemula sampai Mahir</h3>
                <p class="text-gray-500 text-sm mb-3 text-left">(Jumlah Materi)</p>

                <div class="flex items-center gap-3 mb-11">
                    <span class="text-gray-600 mb-3 text-sm">4.0</span>
                    <span class="text-yellow-500 mb-3 text-sm">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    <span class="text-gray-500 mb-3 text-sm">(3490)</span>
                </div>
                <p class="text-gray-600 line-through text-sm text-left">Rp 900.000</p>
                <p class="text-red-500 font-bold text-xl text-left">Rp 453.000</p>
            </div>
        </div>
    </div>
</section>

<!-- Frequently Asked Questions Section -->
<section class="bg-blue-900 py-12 text-white">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold">Join over 100,000 students learning modern backend skills</h2>
        <p class="text-white mt-4">The only way to become a great developer is to write a lot of code</p>
    </div>

    <div class="max-w-4xl mx-auto px-4">
        <!-- Testimonial Carousel -->
        <div class="flex justify-center items-center gap-4 mb-12">
            <button class="text-blue-900 bg-white rounded-full p-2">&#10094;</button>
            <div class="flex items-center justify-center bg-white text-black p-6 rounded-lg shadow-lg w-full max-w-md">
                <p class="text-center mb-4">"I've been working as a postdoc, and ever since getting my feet wet with code I have been interested in transitioning into tech. I recently completed the back-end path on Boot.dev and just landed my first professional development job!"</p>
                <div class="flex items-center justify-center gap-2">
                    <img class="w-10 h-10 rounded-full" src="path-to-avatar.jpg" alt="Theo Jordan">
                    <div class="text-left">
                        <p class="font-semibold">Theo Jordan</p>
                        <p class="text-sm text-gray-500">CEO Google</p>
                    </div>
                </div>
            </div>
            <button class="text-blue-900 bg-white rounded-full p-2">&#10095;</button>
        </div>

        <!-- FAQ Section -->
        <h3 class="text-center text-xl font-semibold mb-6">Frequently Asked Questions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- First FAQ -->
            <div class="bg-blue-700 p-4 rounded-lg">
                <details class="bg-blue-800 p-4 rounded-lg text-white">
                    <summary class="font-bold mb-2 cursor-pointer">How long will it take to learn enough to be hired?</summary>
                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </details>
            </div>

            <!-- Second FAQ -->
            <div class="bg-blue-700 p-4 rounded-lg">
                <details class="bg-blue-800 p-4 rounded-lg text-white">
                    <summary class="font-bold mb-2 cursor-pointer">Should I include Boot.dev projects in my resume and portfolio?</summary>
                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </details>
            </div>

            <!-- Third FAQ wrapped in a div -->
            <div class="bg-blue-700 p-4 rounded-lg">
                <details class="bg-blue-800 p-4 rounded-lg text-white">
                    <summary class="font-bold mb-2 cursor-pointer">How long will it take to learn enough to be hired?</summary>
                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </details>
            </div>

            <!-- Fourth FAQ -->
            <div class="bg-blue-700 p-4 rounded-lg">
                <details class="bg-blue-800 p-4 rounded-lg text-white">
                    <summary class="font-bold mb-2 cursor-pointer">Should I include Boot.dev projects in my resume and portfolio?</summary>
                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </details>
            </div>

        </div>

    </div>
</section>




@endsection

@section('script')
<script>
    function scrollLeft() {
    const container = document.querySelector('.overflow-x-scroll');
    container.scrollBy({
        left: -300, // Menggeser ke kiri 300px
        behavior: 'smooth' // Scroll smooth
    });
}

function scrollRight() {
    const container = document.querySelector('.overflow-x-scroll');
    container.scrollBy({
        left: 300, // Menggeser ke kanan 300px
        behavior: 'smooth' // Scroll smooth
    });
}
</script>

<section class="bg-white py-12">
    <div class="text-center mb-8 bg-orange-400 rounded-lg h-10 mx-28">
        <h2 class="text-white text-3xl font-bold">Best Seller Courses</h2>
    </div>
    <div class="mx-auto px-4 mt-12">
        <div class="flex flex-wrap justify-center h-auto">
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4 shadow-lg">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="bg-gray-200 h-24 rounded-lg mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/laravel.png') }}" class="w-3/5 h-auto rounded-lg">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Laravel: Pemula sampai Mahir</h3>
                    <p class="text-red-600 font-bold text-xl">Rp 453.000</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4 shadow-lg">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="bg-gray-200 h-24 rounded-lg mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/laravel.png') }}" class="w-3/5 h-auto rounded-lg">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Laravel: Pemula sampai Mahir</h3>
                    <p class="text-red-600 font-bold text-xl">Rp 453.000</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4 shadow-lg">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="bg-gray-200 h-24 rounded-lg mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/laravel.png') }}" class="w-3/5 h-auto rounded-lg">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Laravel: Pemula sampai Mahir</h3>
                    <p class="text-red-600 font-bold text-xl">Rp 453.000</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4 shadow-lg">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="bg-gray-200 h-24 rounded-lg mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/laravel.png') }}" class="w-3/5 h-auto rounded-lg">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Laravel: Pemula sampai Mahir</h3>
                    <p class="text-red-600 font-bold text-xl">Rp 453.000</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-blue-900 py-32">
    <div>
        <h2 class="text-center font-bold text-3xl text-white mb-3">Frequently asked questions</h2>
    </div>
    <div class="display-flex ">
    <div class="bg-blue-950 py-3 text-center mx-3 mb-4">
        <div class="flex justify-center space-x-6">
            <label class="font-semibold text-white" for="satu">How long will it take to learn enough to be hired</label>
        </div>
    </div>
    <div class="bg-blue-950 py-3 text-center mx-3 mb-4">
        <div class="flex justify-center space-x-6">
            <label class="font-semibold text-white" for="satu">How long will it take to learn enough to be hired</label>
        </div>
    </div>
    <div class="bg-blue-950 py-3 text-center mx-3 mb-4">
        <div class="flex justify-center space-x-6">
            <label class="font-semibold text-white" for="satu">How long will it take to learn enough to be hired</label>
        </div>
    </div>
    </div>
</section>
@endsection


