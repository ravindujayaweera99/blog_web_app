<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex flex-col md:flex-row justify-between items-center py-6 px-32 shadow-md bg-black text-white">
        <h1 class="text-md md:text-2xl">✍🏻 My Blog App</h1>
        @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white text-sm my-auto md:text-xl ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>

                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white text-sm my-auto md:text-xl ring-1 ring-transparent transition hover:text-blue-500   focus:outline-none focus-visible:ring-[#FF2D20] ">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white text-sm my-auto md:text-xl ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20] ">
                            Register
                        </a>
                    @endif
                @endauth
                <a href={{route('aboutus')}}
                    class="list-none rounded-md px-3 py-2 text-white text-center text-sm my-auto md:text-xl ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                    <li>About Us</li>
                </a>
                <a href={{route('contactus')}}
                    class="list-none rounded-md px-3 py-2 text-white text-center  text-sm my-auto md:text-xl ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                    <li>Give your Feedback</li>
                </a>
            </div>
        @endif
    </header>


    <div class="hero-section w-full h-[50vh] lg:h-[90vh] bg-blue-200 gap-6">
        <div class="bg-black w-full h-full bg-opacity-[0.6] flex flex-col justify-center items-center">
            <h1 class="text-2xl lg:text-5xl text-white font-bold">Share your Thoughts with the World!</h1>
            <h2 class="text-md lg:text-2xl text-white">Turn your Thoughts into Blogs</h2>
        </div>
    </div>

    <h1 class="text-center text-3xl my-12">User Blogs</h1>

    <div class="container mx-auto p-4 w-[100%] flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="w-[300px] m-6 rounded overflow-hidden border-2 my-4 bg-blue-100">
                <div class="px-6 py-4 text-center">
                    <div class="h-[200px] w-[90%] mx-auto bg-blue-300 my-6"></div>
                    <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                    <p class="text-gray-700 text-base font-semibold">
                        {{ $post->body }}
                    </p>
                    <div class="font-light text-[12px] mb-2">Posted By: {{ $post->user_id }}</div>
                    <div class="font-light text-[12px] mb-2">Posted On: {{ $post->created_at }}</div>
                </div>
            </div>
        @endforeach
    </div>

    @include('includes/footer');
</body>

</html>