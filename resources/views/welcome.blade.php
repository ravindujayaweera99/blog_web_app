<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog App ✍🏻</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<style>
    .swiper {
        width: 100vw;
        height: 600px;
    }
</style>

<body class="bg-main">
    @include('includes/navbar')

    <div class="hero-section w-full h-[50vh] lg:h-fit bg-blue-200">
        <div
            class="bg-black/80 w-full h-full bg-opacity-[0.8] flex flex-col justify-center items-center px-32 lg:py-12">
            <div>
                <img src="/images/hero.svg" alt="" class="hidden md:block">
            </div>
            <div class="flex flex-col justify-center items-center gap-12 mt-6">
                <h1 class="text-5xl text-white uppercase">Share your Thought with the World</h1>
                <a href="{{ route('register') }}"
                    class="text-white text-md py-4 px-6 bg-purple rounded hover:text-black">Become a Member →</a>
            </div>
        </div>
    </div>


    <h1 class="text-center font-bold text-5xl text-black my-12">LATEST BLOGS</h1>

    <div class="p-4 w-full flex flex-col justify-center items-center">
        <form action="{{ route('welcome') }}" method="GET" class="w-full md:w-1/2">
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <select name="category" class="form-select w-full md:w-1/2">
                    <option value="">All Categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->category }}" {{ $category == $cat->category ? 'selected' : '' }}>
                            {{ $cat->category }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-purple text-white py-2 px-4 rounded">Filter</button>
            </div>
        </form>
    </div>


    <div class="flex flex-col justify-center lg:grid items-center lg:grid-cols-3 m-6">
        @foreach ($posts as $post)
            <a href="{{ route('singlePost', $post->id) }}">
                <div class="relative w-fit text-white group m-3">
                    <div class="text-center">
                        @if ($post->image)
                            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                                class="h-[250px] w-[450px] rounded border border-white">
                        @else
                            <div class="h-[200px]  bg-white rounded"></div>
                        @endif
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-90 opacity-80 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="font-bold text-5xl mb-2 uppercase px-6">{{ $post->title }}</div>
                            <div class="font-bold text-lg uppercase my-2 text-purple">Category: {{ $post->category }}
                            </div>
                            <div>
                                @if ($post->user)
                                    <div class="font-normal text-md text-white">By {{ $post->user->name }}</div>
                                @endif
                                @if (!$post->user)
                                    <div class="font-normal text-md text-white">By Deleted User</div>
                                @endif
                                <div class="font-normal text-sm my-2 text-white">Posted
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>


    <div class="m-4 flex justify-center items-center w-[100%]">
        <a href="{{ route('allposts') }}"
            class="text-white text-md py-4 px-6 bg-purple rounded hover:text-black my-4">View All Blogs</a>
    </div>


    @include('includes/footer')



</body>

</html>