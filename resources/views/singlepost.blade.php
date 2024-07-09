<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    @include('includes/navbar')

    <div class="container w-[75%] mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $post->title }}</h1>
        @if($post->image)
            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-[50%] h-auto mb-4 mx-auto">
        @endif
        <p class="text-red-500">{!! $post->body !!}</p>
    </div>
</body>

</html>