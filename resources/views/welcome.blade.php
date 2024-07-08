<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body class="bg-main">
    <header class="flex flex-col md:flex-row justify-between items-center py-6 px-32 shadow-md font-bold  text-black">
        <h1 class="text-md md:text-3xl text-purple">✍🏻 My Blog App</h1>
        @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                <a href={{route('aboutus')}}
                    class="list-none rounded-md px-3 py-2 text-black text-center text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20] ">
                    <li>About Us</li>
                </a>
                <a href={{route('contactus')}}
                    class="list-none rounded-md px-3 py-2 text-black text-center  text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20] ">
                    <li>Give your Feedback</li>
                </a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 bg-purple text-white text-black text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-black focus:outline-none focus-visible:ring-[#FF2D20] ">
                        Dashboard
                    </a>

                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-purple rounded-md px-3 py-2 text-white text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-white focus:outline-none focus-visible:ring-[#FF2D20] hover:bg-black">
                            Register
                        </a>
                    @endif
                @endauth

            </div>
        @endif
    </header>


    <div class="hero-section w-full h-[50vh] lg:h-[30vh] bg-blue-200 gap-6">
        <div class="bg-black/60 w-full h-full bg-opacity-[0.7] flex flex-col justify-center items-center gap-6">
            <h1 class="text-8xl text-white">IDEAS <span class="text-purple text-9xl">-></span> REALITY</h1>
        </div>
    </div>

    <h1 class="text-center font-bold text-5xl text-black my-12">LATEST BLOGS</h1>

    <div class="p-4 w-full flex flex-wrap justify-center">
        @foreach ($posts as $post)
            <div class="relative w-[500px] m-6 rounded overflow-hidden bg-black text-white group">
                <div class="text-center">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                            class="h-[300px] w-full rounded border border-white">
                    @else
                        <div class="h-[200px] w-full mx-auto bg-white rounded"></div>
                    @endif
                    <div
                        class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-90 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
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
            </div>
        @endforeach
    </div>



    @include('includes/footer');
</body>

</html>