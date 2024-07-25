<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    @include('includes/navbar')

    <div class="container lg:w-[75%] w-[90%] mx-auto py-8">
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

    <div class="mt-8">
        <h2 class="text-2xl font-bold text-center">Comments</h2>

        @if ($post->comments->count())
            @foreach ($post->comments as $comment)
                <div class="my-4 mx-4 lg:mx-64 p-4 bg-purple/10 rounded">
                    <p class="text-sm text-purple font-bold"> {{ $comment->owner->name }} -
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                    <p class="text-md">{{ $comment->body }}</p>
                    <p class="text-[11px] text-purple font-bold"></p>
                </div>
            @endforeach
        @else
            <p class="mx-64">No comments yet.</p>
        @endif

        @auth
            <form action="{{ route('comments.store') }}" method="POST" class="my-12 mx-4 lg:mx-64">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-4">
                    <label for="body" class="block text-gray-700 font-bold mb-4">Your Comment</label>
                    <textarea name="body" id="body" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded"></textarea>
                </div>
                <button type="submit"
                    class=" bg-purple text-md font-bold py-4 px-6 rounded text-white hover:text-black">Post your
                    Comment</button>
            </form>
        @else
            <p class="my-8 text-2xl text-center">Please <a href="{{ route('login') }}"
                    class="text-purple hover:font-bold">login</a> to comment.
            </p>
        @endauth
    </div>

    @include('includes/footer')
</body>

</html>