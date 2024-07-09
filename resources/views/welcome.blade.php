<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body class="bg-main">
    @include('includes/navbar');

    <div class="hero-section w-full h-[50vh] lg:h-[30vh] bg-blue-200 gap-6">
        <div class="bg-black/60 w-full h-full bg-opacity-[0.7] flex flex-col justify-center items-center gap-6">
            <h1 class="text-8xl text-white">IDEAS <span class="text-purple text-9xl">-></span> REALITY</h1>
        </div>
    </div>

    <h1 class="text-center font-bold text-5xl text-black my-12">LATEST BLOGS</h1>

    <div class="p-4 w-full grid grid-cols-3">
        @foreach ($posts as $post)
            <a href={{route('singlePost', $post->id)}}>
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
                            <div class="font-bold text-5xl mb-2 uppercase px-6">{{ $post->title }}</div>
                            <!-- <p class="text-gray-200 text-md font-light mb-6">
                                                                                            {{ $post->body }}
                                                                                        </p> -->
                            <div>
                                <div class="font-extralight text-md">Posted By: {{ $post->user->name }}</div>
                                <div class="font-extralight text-md mb-2">Posted On: {{ $post->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>



    @include('includes/footer');
</body>

</html>