<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex flex-col md:flex-row justify-between items-center py-6 px-32 shadow-md bg-black text-white">
        <h1 class="text-md md:text-md">✍🏻 My Blog App</h1>
        @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white text-sm font-medium my-auto md:text-sm ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>

                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-blue-500   focus:outline-none focus-visible:ring-[#FF2D20] ">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20] ">
                            Register
                        </a>
                    @endif
                @endauth
                <a href={{route('aboutus')}}
                    class="list-none rounded-md px-3 py-2 text-white text-center text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                    <li>About Us</li>
                </a>
                <a href={{route('contactus')}}
                    class="list-none rounded-md px-3 py-2 text-white text-center  text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-blue-500  focus:outline-none focus-visible:ring-[#FF2D20]">
                    <li>Give your Feedback</li>
                </a>
            </div>
        @endif
    </header>


    <div class="hero-section w-full h-[50vh] lg:h-[50vh] bg-blue-200 gap-6">
        <div class="bg-black w-full h-full bg-opacity-[0.7] flex flex-col justify-center items-center gap-6">
            <h1 class="text-2xl lg:text-5xl text-white font-light">Share your Thoughts with the World!</h1>
            <h2 class="text-md lg:text-2xl text-white font-extralight">Turn your Thoughts into Blogs</h2>
        </div>
    </div>

    <h1 class="text-center text-3xl my-12">User Blogs</h1>

    <!-- <div class="container mx-auto p-4 w-[100%] flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="w-[300px] m-6 rounded overflow-hidden my-4 bg-black text-white">
                <div class="px-6 py-4 text-center">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                            class="h-[200px] w-[90%] mx-auto bg-white my-6 rounded">
                    @else
                        <div class="h-[200px] w-[90%] mx-auto bg-white my-6 rounded"></div>
                    @endif
                    <div class="font-bold text-2xl mb-2 uppercase">{{ $post->title }}</div>
                    <p class="text-gray-200 text-md font-light mb-6">
                        {{ $post->body }}
                    </p>
                    <div>
                        <div class="font-extralight text-[10px]">Posted By: {{ $post->user_id }}</div>
                        <div class="font-extralight text-[10px] mb-2">Posted On: {{ $post->created_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> -->

    <div class="container mx-auto p-4 w-[100%] flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="w-[300px] m-6 rounded overflow-hidden my-4 bg-black text-white">
                <div class="px-6 py-4 text-center">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                            class="h-[150px] w-[100%] mx-automy-6 rounded border border-white mb-6">
                    @else
                        <div class="h-[200px] w-[90%] mx-auto bg-white my-6 rounded"></div>
                    @endif
                    <div class="font-bold text-2xl mb-2 uppercase">{{ $post->title }}</div>
                    <p class="text-gray-200 text-md font-light mb-6">
                        {{ $post->body }}
                    </p>
                    <div>
                        <div class="font-extralight text-[10px]">Posted By: {{ $post->user_id }}</div>
                        <div class="font-extralight text-[10px] mb-2">Posted On: {{ $post->created_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @include('includes/footer');
</body>

</html>