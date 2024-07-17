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
        <div class="mb-4">
            <h1 class="text-3xl font-bold text-center">{{ $post->title }}</h1>
            <p class="text-center text-purple font-bold">Category: {{$post->category}}</p>
        </div>
        @if ($post->user)
            <p class="text-center">Published by {{$post->user->name}}</p>
        @endif
        @if (!$post->user)
            <p class="text-center">Published by Deleted User</p>
        @endif
        <p class="text-center">{{$post->created_at->diffForHumans()}}</p>
        @if($post->image)
            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-[50%] h-auto my-4 mx-auto">
        @endif
        <p class="text-red-500">{!! $post->body !!}</p>
    </div>
</body>

</html>