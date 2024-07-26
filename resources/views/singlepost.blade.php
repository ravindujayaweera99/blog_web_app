<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $post->title }}</title>
</head>

<body class="bg-gray-50">
    @include('includes/navbar')

    <div class="container mx-auto py-12 lg:w-[75%] w-[90%]">
        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="mb-6 text-center">
                <h1 class="text-4xl font-bold text-gray-900">{{ $post->title }}</h1>
                <p class="text-sm text-purple font-medium">Category: {{ $post->category }}</p>
            </div>
            <div class="text-center mb-4">
                @if ($post->user)
                    <p class="text-gray-600">Published by <span
                            class="text-purple font-semibold">{{ $post->user->name }}</span></p>
                @else
                    <p class="text-gray-600">Published by <span class="font-semibold">Deleted User</span></p>
                @endif
                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            @if($post->image)
                <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-auto my-6 rounded-lg border border-purple-200 shadow-lg">
            @endif
            <div class="text-gray-800 text-lg leading-relaxed mt-4">
                {!! $post->body !!}
            </div>
        </div>

        <div class="mt-10 bg-white shadow-md rounded-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-900">Comments</h2>

            @if ($post->comments->count())
                <div class="mt-6 space-y-4">
                    @foreach ($post->comments as $comment)
                        <div class="p-4 bg-purple/20 rounded-lg shadow">
                            <p class="text-sm text-purple-600 font-bold">{{ $comment->owner->name }} -
                                <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </p>
                            <p class="text-md font-bold text-purple mt-2">{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-purple mt-4">No comments yet.</p>
            @endif

            @auth
                <form action="{{ route('comments.store') }}" method="POST" class="my-8">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-6">
                        <label for="body" class="block text-gray-700 font-bold mb-2">Your Comment</label>
                        <textarea name="body" id="body" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-200"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-purple text-md font-bold py-4 px-4 rounded-lg text-white hover:text-black transition duration-200">Post
                        your Comment</button>
                </form>
            @else
                <p class="my-8 text-lg text-center text-gray-600">Please <a href="{{ route('login') }}"
                        class="text-purple-600 hover:underline">login</a> to comment.</p>
            @endauth
        </div>
    </div>

    @include('includes/footer')
</body>

</html>